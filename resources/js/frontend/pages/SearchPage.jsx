import { useLocation,Link } from "react-router-dom";
import { useEffect, useState } from "react";
import { API_BASE_URL,BASE_URL } from "../config";
function SearchPage() {
  const location = useLocation();
  const [searchQuery, setSearchQuery] = useState("");
const [relatedBlogs, setRelatedBlogs] = useState([]);
//   useEffect(() => {
//     const params = new URLSearchParams(location.search);
//     setSearchQuery(params.get("query") || "");
//   }, [location.search]);
useEffect(() => {
  const params = new URLSearchParams(location.search);
  const q = params.get("query") || "";
  setSearchQuery(q);
}, [location.search]);

useEffect(() => {
    
  if (searchQuery.trim() !== "") {
    fetch(`${API_BASE_URL}/searchData/${searchQuery}`)
      .then(res => res.json())
      .then(data => {
        console.log("Search results:", data);
        setRelatedBlogs(data);
      });
  }
}, [searchQuery]);

const handleSearch = (e) => {
  const value = e.target.value;
  setSearchQuery(value);
};

  return (

<main>
    <section className="information_banner position-relative mx-2 rounded-4 overflow-hidden h-100 ">
        <img src="./media/global-service-list.jpg" width="" height="" alt="Information Banner" className="img-fluid w-100 position-absolute h-100" />
        <div className="container py-4 py-lg-5">
            <div className="information_form row g-4 g-lg-5 z-1 position-relative">
                <div className="col-md-12">
                    <div className="info_content d-flex flex-column align-items-center justify-content-center mb-2">
                        
                        <form  method="" id="searchform" className="search-page">
                            <div className="container">
                                <div className="form-group d-flex align-items-center justify-content-center position-relative">
                                    <input type="text" width="" height="" value={searchQuery} className="form-control" onChange={handleSearch} placeholder="Search" />
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section className="service-list-block py-4 py-lg-5">
        <div className="container py-4 py-lg-5">
            <div className="row">
                <div className="section-header text-center mb-4">
                    <h3 className="mb-3 fw-light">Explore by Expertise Search</h3>
                    <p>Ready to experience compassionate care in global trade? Contact We Care India Group today to discuss your import-export needs and<span className="d-none d-lg-block"></span>  discover how we can support your business growth with our reliable services.</p>
                </div>
            </div>
            <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                {relatedBlogs.length > 0 ? relatedBlogs.map((blog) => (
                    <div key={blog.id} >
                        {blog.type === "blog" ? (
                <div className="col">
                    <div className="blog-cards border rounded-4 overflow-hidden  h-100">
                        <a href="http://127.0.0.1:8000/blog-details" className="d-block position-relative">
                            <img src={`${BASE_URL}/${blog.image}`} alt="Blog" height="" width="" className="img-fluid w-100" />
                            <span className="border position-absolute rounded-4 px-2 text-black">{blog.category}</span>
                        </a>
                        <div className="blogCard-content p-2 p-lg-3">
                            <a href="http://127.0.0.1:8000/blog-details"><h5 className="fw-semibold">{blog.title}</h5></a>
                            <p>{blog.description}</p>
                            <div className="d-flex align-items-center justify-content-between blog-publishers">
                                <div className="d-flex align-items-center justify-content-start gap-2">
                                    <img src="media/usa.webp" alt="Innovator" width="100" height="100" className="img-fluid object-fit-cover rounded-circle" />
                                    <div className="blogPublishers-content">
                                        <label className="fw-bold d-block lh-sm">Admin</label>
                                        <span className="fs-6">December 11, 2025</span>
                                    </div>
                                </div>
                                <Link to={`/blog/${blog.slug}`} className="fw-bold">Read more <i className="fa-solid fa-arrow-right"></i></Link>
                            </div>
                        </div>
                    </div>
                </div>
) : blog.type === "product" ? (
                <div className="col">
                    <div className="box border rounded-4 p-3 h-100">
                        <span>{blog.category}</span>
                        <img src={`${BASE_URL}/${blog.image}`} className="w-100 img-fluid" alt="Service List" />
                        <div className="d-flex align-items-start justify-content-between">
                            <h4>{blog.title}</h4>
                            <Link to={`/product/${blog.slug}`} className="fs-6"><svg className="svg-inline--fa fa-paper-plane" data-prefix="far" data-icon="paper-plane" role="img" viewBox="0 0 576 512" aria-hidden="true" data-fa-i2svg=""><path fill="currentColor" d="M290.5 287.7L491.4 86.9 359 456.3 290.5 287.7zM457.4 53L256.6 253.8 88 185.3 457.4 53zM38.1 216.8l205.8 83.6 83.6 205.8c5.3 13.1 18.1 21.7 32.3 21.7 14.7 0 27.8-9.2 32.8-23.1L570.6 8c3.5-9.8 1-20.6-6.3-28s-18.2-9.8-28-6.3L39.4 151.7c-13.9 5-23.1 18.1-23.1 32.8 0 14.2 8.6 27 21.7 32.3z"></path></svg></Link>
                        </div>
                        <p className="fs-6 lh-md mb-0">{blog.description}</p>
                    </div>
                </div>
 ) : null}

</div>
                )) : <p>No results found {searchQuery}</p>}
                
            </div>
        </div>
        
    </section>
</main>

    );
}

export default SearchPage;
 