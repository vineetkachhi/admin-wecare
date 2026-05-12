import { useEffect, useState } from "react";
import { Link,useParams } from "react-router-dom";

import { API_BASE_URL,BASE_URL } from "../config";

function BlogList() {
  const [blogs, setBlogs] = useState([]);
  const [blogcategories, setBlogCategories] = useState([]);
  const { slug } = useParams(); 
  const [currentPage, setCurrentPage] = useState(1);
  const [lastPage, setLastPage] = useState(1);
  const [loading, setLoading] = useState(false);
  useEffect(() => {
    fetch(`${API_BASE_URL}/blogcategories`)
      .then(res => res.json())
      .then(data => {
        setBlogCategories(data);
      })
      .catch(err => console.error(err));
  }, []);

  useEffect(() => {
    setCurrentPage(1);
  }, [slug]);


useEffect(() => {
  let url = `${API_BASE_URL}/blogs`;

  if (slug) {
    url += `/${slug}`;
  } else {
    url += `/all`;
  }

  url += `?page=${currentPage}`;

  fetch(url)
    .then(res => res.json())
    .then(data => {
      if (currentPage === 1) {
        setBlogs(data.data);
      } else {
        setBlogs(prev => [...prev, ...data.data]);
      }

      // ✅ IMPORTANT
      setLastPage(data.last_page);
    });

}, [currentPage, slug]);

  return (
    
    <main>
    <section className="information_banner position-relative mx-2 rounded-4 overflow-hidden h-100 ">
        <img src={`${BASE_URL}/media/global-service-list.jpg`} width="" height="" alt="Information Banner" className="img-fluid w-100 position-absolute h-100" />
        <div className="container py-4 py-lg-5">
            <div className="information_form row g-4 g-lg-5 z-1 position-relative">
                <div className="col-md-12">
                    <div className="info_content d-flex flex-column align-items-center justify-content-center mb-2">
                        
                        <nav aria-label="Breadcrumb" className="d-flex align-items-center justify-content-start list-unstyled p-0 w-100">
                            <ul className="d-flex align-items-center justify-content-center list-unstyled mb-0 p-0">
                                <li><a href="index.html">Home</a></li>
                                <li>Blog</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="section-header text-start mb-4 mb-lg-5">
                        <span className="srv-subtitle highlight mb-4">Our Blog</span>
                        <h3 className="mb-3 fw-light text-white">Blog <span className="fw-bold">We Care India Group</span></h3>
                        <p className="text-white">Ready to experience compassionate care in global trade? Contact We Care India Group today to discuss your import-export needs and discover how we can support your business growth with our reliable services.</p>
                        <div className="d-flex align-items-center mt-4 justify-content-start">
                            <a href="#contact" className="actionBtn">Contact us online</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section className="service-list-block py-4 py-lg-5">
        <div className="container py-4 py-lg-5">
            <div className="row">
                <div className="section-header text-center">
                    <h3 className="mb-3 fw-light">Explore by Expertise</h3>
                    <p>Ready to experience compassionate care in global trade? Contact We Care India Group today to discuss your import-export needs and<span className="d-none d-lg-block"></span>  discover how we can support your business growth with our reliable services.</p>
                </div>
            </div>
            <div className="service-filter pb-4 pb-lg-5">
                <div className="container">
                    <div className="filter-block d-flex align-items-center justify-content-md-center justify-content-start position-relative py-4  py-lg-4 gap-2">
                        
                        {blogcategories.map(category => (
                              <Link
                                key={category.id}
                                to={`/blog-category/${category.slug}`}
                                className={`filter-items ${slug === category.slug ? 'active' : ''}`}
                                style={{ margin: '5px', display: 'inline-block' }}
                            >
                                {category.category_name}
                            </Link>
                        ))}
                    </div>
                </div>
            </div>
            <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
              { blogcategories.length > 0 ? blogs.map(blog => (
                <div className="col" key={blog.id}>
                    <div className="blog-cards border rounded-4 overflow-hidden">
                        <Link to={`/blog/${blog.slug}`} className="d-block position-relative">
                            <img src={`${BASE_URL}/${blog.image}`}  alt="Blog"  className="img-fluid w-100" />
                            <span className="border position-absolute rounded-4 px-2 text-black">Open Bath Slippers</span>
                        </Link>
                        <div className="blogCard-content p-2 p-lg-3">
                            <Link to={`/blog/${blog.slug}`}>
                                <h5 className="fw-semibold">Open Bath Slippers Exporter from India</h5>
                            </Link>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae est odio tenetur hic mollitia assumenda iure voluptas ipsam aut voluptatem?</p>
                            <div className="d-flex align-items-center justify-content-between blog-publishers">
                                <div className="d-flex align-items-center justify-content-start gap-2">
                                    <img src={`${BASE_URL}/media/usa.webp`} alt="Innovator" width="100" height="100" className="img-fluid object-fit-cover rounded-circle" />
                                    <div className="blogPublishers-content">
                                        <label className="fw-bold d-block lh-sm">Admin</label>
                                        <span className="fs-6">{blog.date}</span>
                                    </div>
                                </div>
                                <Link to={`/blog/${blog.slug}`} className="fw-bold">Read more <i className="fa-solid fa-arrow-right"></i></Link>
                            </div>
                        </div>
                    </div>
                </div>
                 )): <p>No results found {slug}</p>}
            </div>
        </div>
        <div id="loadmore-service" className="d-block text-center mb-5">
            {currentPage < lastPage && (
            <span
                id="loadmoreBtn"
                className="rounded-2 d-inline-block"
                onClick={() => setCurrentPage(currentPage + 1)}
                style={{ cursor: "pointer" }}
            >
                {loading ? "Loading..." : "Load More"}
            </span>
            )}
        </div>
    </section>

     <section className="ctabox py-lg-4 py-3">
        <div className="container py-4 py-lg-5">
            <div className="row">
                <div className="col-lg-10 mx-auto text-white text-center">
                    <h3 className="mb-3 fw-light">Reliable Export Solutions Tailored to Your<span className="d-none d-lg-block"></span> Needs – <span className="fw-bold">Quality You Can Trust.</span></h3>
                    <p>Get in touch with us today to learn more about how we can help your business grow globally.</p>
                    <div className="d-flex align-items-center mt-5 justify-content-center flex-wrap gap-3">
                        <a href="#contact" className="actionBtn">Contact us online</a>
                        <a href="#contact" className="actionBtn blankBtn">Request a call back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
  );
}

export default BlogList;
