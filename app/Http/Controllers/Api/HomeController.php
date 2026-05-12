<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog_Category;
use App\Mail\ContactFormMail;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function faq()
    {

        $faqs = Faq::where('status', 'active')->get();
        $faq = [];
        foreach ($faqs as $faqItem) {

            $faq[] = [
                'id' => $faqItem->id,
                'question' => $faqItem->name,
                'answer' =>  $faqItem->description,
            ];
        }

        return response()->json($faq);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // echo "Contact form submitted successfully! Name: " . $request->name . ", Email: " . $request->email . ", Message: " . $request->message;
        // die;

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        Mail::to('info@wecareexport.com')->send(new ContactFormMail($contact));
        return response()->json([
            'message' => 'Contact form submitted successfully'
        ]);
    }

    public function categories()
    {
        $categories = Category::where('status', 'active')->get();
        $categoryList[] = [
            'id' => null,
            'category_name' => 'All Type',
            'slug' => 'all',
        ];
        foreach ($categories as $category) {
            $categoryList[] = [
                'id' => $category->id,
                'category_name' => $category->category_name,
                'slug' => $category->slug,
            ];
        }

        return response()->json($categoryList, 200);
    }

    public function blogCategories()
    {
        $categories = Blog_Category::where('status', 'active')->get();
        $categoryList[] = [
            'id' => null,
            'category_name' => 'All Type',
            'slug' => 'all',
        ];
        foreach ($categories as $category) {
            $categoryList[] = [
                'id' => $category->id,
                'category_name' => $category->category_name,
                'slug' => $category->slug,
            ];
        }
        // dd($categoryList);
        return response()->json($categoryList, 200);
    }

    public function services($slug, Request $request)
    {
        $perPage = $request->per_page ?? 10; // default 10
        // dd($slug);
        $query = Product::with('category')
            ->where('status', 'active');

        // category slug filter
        if ($slug && $slug !== 'all') {
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        // pagination
        $services = $query->paginate($perPage);

        // custom response
        $serviceList = $services->getCollection()->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->product_name,
                'slug' => $service->slug,
                'short_description' => $service->short_description,
                'long_description' => $service->long_description,
                'image' => $service->image,
                'category' => $service->category ? $service->category->category_name : null,
            ];
        });

        return response()->json([
            'data' => $serviceList,
            'current_page' => $services->currentPage(),
            'last_page' => $services->lastPage(),
            'per_page' => $services->perPage(),
            'total' => $services->total(),
        ], 200);
    }

    public function serviceDetails($slug)
    {
        $details = Product::with('category')->where('status', 'active')->where('slug', $slug)->first();
        $detail = [];
        if ($details) {
            $detail[] = [
                'id' => $details->id,
                'title' => $details->product_name,
                'slug' =>  $details->slug,
                'short_description' => $details->short_description,
                'long_description' => $details->long_description,
                'image' => $details->image,
                'category' => $details->category ? $details->category->category_name : null,
            ];
        }
        $relatedProducts = Product::where('status', 'active')
            ->where('category_id', $details->category_id)
            ->where('id', '!=', $details->id)
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->product_name,
                    'slug' => $item->slug,
                    'image' => $item->image,
                    'description' => $item->short_description,
                ];
            });
        $nextService = Product::where('status', 'active')
            ->where('id', '>', $details->id)
            ->orderBy('id', 'asc')
            ->first();
        $nextDetails = [];
        if ($nextService) {
            $nextDetails[] = [
                'id' => $nextService->id,
                'title' => $nextService->product_name,
                'slug' => $nextService->slug,
            ];
        }
        $prevService = Product::where('status', 'active')
            ->where('id', '<', $details->id)
            ->orderBy('id', 'desc')
            ->first();
        $prevDetails = [];
        if ($prevService) {
            $prevDetails[] = [
                'id' => $prevService->id,
                'title' => $prevService->product_name,
                'slug' => $prevService->slug,
            ];
        }

        return response()->json(['detail' => $detail, 'related_products' => $relatedProducts, 'next_product' => $nextDetails, 'prev_product' => $prevDetails], 200);
    }

    public function blogDetails($slug)
    {
        $details = \App\Models\Blog::with('blog_category')->where('status', 'active')->where('slug', $slug)->first();
        $detail = [];
        if ($details) {
            $detail[] = [
                'id' => $details->id,
                'title' => $details->title,
                'slug' =>  $details->slug,
                'short_description' => $details->short_description,
                'long_description' => $details->long_description,
                'image' => $details->image,
                'category' => $details->blog_category ? $details->blog_category->category_name : null,
            ];
        }
        $relatedBlogs = \App\Models\Blog::where('status', 'active')
            ->where('blog_category_id', $details->blog_category_id)
            ->where('id', '!=', $details->id)
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'image' => $item->image,
                    'description' => $item->short_description,
                ];
            });

        $nextBlog = \App\Models\Blog::where('status', 'active')
            ->where('id', '>', $details->id)
            ->orderBy('id', 'asc')
            ->first();

        $nextBlogDetail = [];
        if ($nextBlog) {
            $nextBlogDetail[] = [
                'id' => $nextBlog->id,
                'title' => $nextBlog->title,
                'slug' => $nextBlog->slug,
            ];
        }

        $prevBlog = \App\Models\Blog::where('status', 'active')
            ->where('id', '<', $details->id)
            ->orderBy('id', 'desc')
            ->first();

        $prevBlogDetail = [];
        if ($prevBlog) {
            $prevBlogDetail[] = [
                'id' => $prevBlog->id,
                'title' => $prevBlog->title,
                'slug' => $prevBlog->slug,
            ];
        }

        return response()->json(['detail' => $detail, 'related_blogs' => $relatedBlogs, 'next_blog' => $nextBlogDetail, 'prev_blog' => $prevBlogDetail], 200);
    }

    public function blogByCategory($slug, Request $request)
    {

        $perPage = $request->per_page ?? 10; // default 10
        $query = Blog::with('blog_category')
            ->where('status', 'active');

        // category slug filter
        if ($slug && $slug !== 'all') {
            $query->whereHas('blog_category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        // pagination
        $blog = $query->paginate($perPage);

        // custom response
        $blogList = $blog->getCollection()->map(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'short_description' => $blog->short_description,
                'long_description' => $blog->long_description,
                'image' => $blog->image,
                'category' => $blog->blog_category ? $blog->blog_category->category_name : null,
            ];
        });
        return response()->json([
            'data' => $blogList,
            'current_page' => $blog->currentPage(),
            'last_page' => $blog->lastPage(),
            'per_page' => $blog->perPage(),
            'total' => $blog->total(),
        ], 200);
    }

    public function testimonials()
    {
        $testimonials = \App\Models\Testimonial::where('status', 'active')->get();
        $testimonialList = [];
        foreach ($testimonials as $testimonial) {
            $testimonialList[] = [
                'id' => $testimonial->id,
                'client_name' => $testimonial->client_name,
                'client_location' => $testimonial->client_location,
                'message' => $testimonial->message,
                'image' => $testimonial->image,
            ];
        }

        return response()->json($testimonialList, 200);
    }


    public function popularWorks()
    {
        $popularWorks = \App\Models\Popular_Work::where('status', 'active')->get();
        $popularWorkList = [];
        foreach ($popularWorks as $work) {
            $popularWorkList[] = [
                'id' => $work->id,
                'title' => $work->title,
                'description' => $work->description,
            ];
        }

        return response()->json($popularWorkList, 200);
    }

    public function experiences()
    {
        $experiences = \App\Models\Experience::where('status', 'active')->get();
        $experienceList = [];
        foreach ($experiences as $experience) {
            $experienceList[] = [
                'id' => $experience->id,
                'heading' => $experience->heading,
                'description' => $experience->description,
            ];
        }

        return response()->json($experienceList, 200);
    }

    public function searchData($slug, Request $request)
    {
        $query = $slug;
        // dd($query);
        // Search in products
        $products = Product::with('category')
            ->where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('product_name', 'like', "%$query%")
                    ->orWhere('short_description', 'like', "%$query%")
                    ->orWhere('long_description', 'like', "%$query%");
            })
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->product_name,
                    'slug' => $item->slug,
                    'image' => $item->image,
                    'description' => $item->short_description,
                    'type' => 'product',
                    'category' => $item->category ? $item->category->category_name : null,
                ];
            });

        // Search in blogs
        $blogs = Blog::with('blog_category')
            ->where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                    ->orWhere('short_description', 'like', "%$query%")
                    ->orWhere('long_description', 'like', "%$query%");
            })
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'image' => $item->image,
                    'description' => $item->short_description,
                    'type' => 'blog',
                    'category' => $item->blog_category ? $item->blog_category->category_name : null,
                ];
            });

        // Combine results
        $results = array_merge($products->toArray(), $blogs->toArray());

        return response()->json($results, 200);
    }
}
