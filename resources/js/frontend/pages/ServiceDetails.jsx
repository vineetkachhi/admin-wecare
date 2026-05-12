import { useEffect, useState } from "react";
import { Link,useParams  } from "react-router-dom";


import { API_BASE_URL,BASE_URL } from "../config";

import Contact_details from "../components/Contact_details";
function ProductDetails() {
  const [details, setDetails] = useState([]);
  const [relatedProducts, setRelatedProducts] = useState([]);
  const [nextProduct, setNextProduct] = useState(null);
  const [prevProduct, setPrevProduct] = useState(null);   

const { slug } = useParams(); 
  useEffect(() => {
    fetch(`${API_BASE_URL}/productDetails/${slug}`)
      .then(res => res.json())
      .then(data => {
        setDetails(data.detail);
        setRelatedProducts(data.related_products);
        setNextProduct(data.next_product[0] || null);
        setPrevProduct(data.prev_product[0] || null);

      });
      console.log(details);
  }, [slug]);

  return (
    <main>
 {details.map(detail => (
  <div>
    <section className="information_banner position-relative mx-2 rounded-4 overflow-hidden h-100 ">
        <img src="/media/global-service-list.jpg" width="" height="" alt="Information Banner" className="img-fluid w-100 position-absolute h-100" />
        <div className="container py-4 py-lg-5">
            <div className="information_form row g-4 g-lg-5 z-1 position-relative">
                <div className="col-md-12">
                    <div className="info_content d-flex flex-column align-items-center justify-content-center mb-2">
                        
                        <nav aria-label="Breadcrumb" className="d-flex align-items-center justify-content-start list-unstyled p-0 w-100">
                            <ul className="d-flex align-items-center justify-content-center list-unstyled mb-0 p-0">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="service-list.html">{detail.category}</a></li>
                                <li> {detail.title}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="section-header text-start mb-4 mb-lg-5">
                        <span className="srv-subtitle highlight mb-4">{detail.category}</span>
                        <h3 className="mb-3 fw-light text-white"> {detail.title}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section className="service-list-block py-4 py-lg-5">
        <div className="container py-4 py-lg-5">
            <div className="row">
                <div className="col-md-8">
                    <div className="listing-contact">
                        {/* <p>{detail.short_description} </p> */}
                        <p   dangerouslySetInnerHTML={{ __html: detail.long_description }}></p>
                        <img src={`${BASE_URL}/${detail.image}`} alt={detail.title}  />
                    </div>

                    <div className="page-navigation pt-4 pb-4">
                        <div className="d-flex justify-content-between align-items-center gap-2">
                           {prevProduct ? <div className="page-prev"><i className="fa-solid fa-arrow-left"></i> <span className="page-title"> <Link to={`/servicesdetails/${prevProduct?.slug}`}>{prevProduct?.title}</Link></span></div> : null}
                          {nextProduct ? <div className="page-next"><span className="page-title"> <Link to={`/servicesdetails/${nextProduct?.slug}`}>{nextProduct?.title}</Link></span> <i className="fa-solid fa-arrow-right"></i></div> : null}
                        </div>
                    </div>
                </div>
                <div className="col-md-4">
                    <Contact_details />
<div className="service-recent pt-4 pt-lg-5">
                        <div className="section-header text-start">
                            <span className="srv-subtitle highlight mb-3">Our Service</span>
                            <h3 className="mb-3 fw-light">Service <span className="fw-bold">We Care India Group</span></h3>
                        </div>
                        <div className="list-block position-sticky">
                            <ul className="p-0 m-0">
                                {relatedProducts.map(product => (
                                <li className="list-unstyled border rounded-2 mb-3" key={product.id}>
                                    <a href="#" className="p-2 list-block d-flex align-items-start justify-content-start gap-2">
                                        <img src={`${BASE_URL}/${product.image}`} alt="image" width=" 100" height="100" className="img-fluid object-cover" />
                                        <div className="list-block-content">
                                            <h4 className="m-0 h6 text-black mb-1 fw-medium">{product.title}</h4>
                                            <p className="fs-6">{product.description}</p>
                                        </div>
                                    </a>
                                </li>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>

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
    </div>
     ))}
</main>
  );
}

export default ProductDetails;
