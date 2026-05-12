
import { useEffect, useState } from "react";
import { Link,useParams  } from "react-router-dom";


import { API_BASE_URL,BASE_URL } from "../config";
function ServiceList() {
  const [categories, setCategories] = useState([]);
  const [services, setServices] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [lastPage, setLastPage] = useState(1);
const [loading, setLoading] = useState(false);
  const { slug } = useParams();

  // ✅ Categories load
  useEffect(() => {
    fetch(`${API_BASE_URL}/categories`)
      .then(res => res.json())
      .then(data => {
        setCategories(data);
      })
      .catch(err => console.error(err));
  }, []);

  // ✅ slug change hone pe page reset
  useEffect(() => {
    setCurrentPage(1);
  }, [slug]);

useEffect(() => {
  let url = `${API_BASE_URL}/services`;

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
        setServices(data.data);
      } else {
        setServices(prev => [...prev, ...data.data]);
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
                                <li><a href="/">Home</a></li>
                                <li>Service List</li>
                                <li>{slug}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="section-header text-start mb-4 mb-lg-5">
                        <span className="srv-subtitle highlight mb-4">Our Services List</span>
                        <h3 className="mb-3 fw-light text-white">Service List <span className="fw-bold">We Care India Group</span></h3>
                        <p className="text-white">Ready to experience compassionate care in global trade? Contact We Care India Group today to discuss your import-export needs and discover how we can support your business growth with our reliable services.</p>
                        <div className="d-flex align-items-center mt-4 justify-content-start">
                            <a href="#contact" className="actionBtn">Contact us online</a>
                            <a href="#contact" className="actionBtn blankBtn">Request a call back</a> 
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
                    <span className="srv-subtitle highlight mb-4">Services List</span>
                    <h3 className="mb-3 fw-light">Service List <span className="fw-bold">We Care India Group</span></h3>
                    <p>Ready to experience compassionate care in global trade? Contact We Care India Group today to discuss your import-export needs and<span className="d-none d-lg-block"></span>  discover how we can support your business growth with our reliable services.</p>
                </div>
            </div>
            <div className="service-filter pb-4 pb-lg-5">
                <div className="container">
                    <div className="filter-block d-flex align-items-center justify-content-md-center justify-content-start position-relative py-4  py-lg-4 gap-2">
                       
                        {categories.map(category => (
                          <Link
                            key={category.id}
                            to={`/services/${category.slug}`}
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
              
                { services.length > 0 ?services.map(service => (
                <div className="col" key={service.id}>
                    <div className="box border rounded-4 p-3">
                        <span>{service.category}</span>
                        <img src={`${BASE_URL}/${service.image}`} className="w-100 img-fluid" alt="Service List" />
                        <div className="d-flex align-items-start justify-content-between">
                            <h4>{service.title}</h4>
                           <Link to={`/servicesdetails/${service.slug}`} className="fs-6"> <i className="fa-regular fa-paper-plane"></i></Link>
                        </div>
                        <p className="fs-6 lh-md mb-0">{service.short_description}</p>
                    </div>
                </div>
                )) : <p>No results found {slug}</p>}
            </div>
        </div>
    </section>
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

export default ServiceList;
 