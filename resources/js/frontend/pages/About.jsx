import { Link } from "react-router-dom";
import Testimonials from "../components/Testimonials";
function About({ settings }) {
  return (
  <main>
    <section className="information_banner position-relative mx-2 rounded-4 overflow-hidden">
        <img src="./media/cta-banner.jpg" width="" height="" alt="Information Banner" className="img-fluid w-100 position-absolute h-100" />
        <div className="container">
            <div className="info_content d-flex flex-column align-items-center justify-content-center position-absolute z-1">
                <h1 className="text-center">About Us</h1>
                <nav aria-label="Breadcrumb" className="d-flex align-items-center justify-content-center list-unstyled p-0 w-100">
                    <ul className="d-flex align-items-center justify-content-center list-unstyled mb-0 p-0">
                        <li><Link to="/">Home</Link></li>
                        <li>About Us</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section className="main-content py-4 py-lg-5">
        <div className="container">
            <h2>About, We care export <span>India</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ducimus inventore vel dolores! Totam enim optio autem voluptate ducimus voluptatum ex animi sequi soluta dignissimos! Quaerat nemo autem laboriosam labore.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nihil, ducimus sequi libero excepturi accusantium ipsa impedit mollitia dolor repellat alias magnam placeat similique illum esse assumenda possimus odio fuga corporis dolorum nesciunt doloremque odit sapiente ut. Modi obcaecati aspernatur eligendi itaque fuga alias, consectetur quas quo velit voluptatum suscipit quibusdam nam distinctio necessitatibus earum illo consequatur adipisci animi voluptatem! Sit nesciunt corporis excepturi rem incidunt eos ratione eius voluptates corrupti animi, itaque autem sint fuga, doloremque pariatur eveniet asperiores. Earum dolorem nobis asperiores. Hic sed nemo illum omnis iste sint architecto, possimus culpa eum sequi voluptates sapiente quidem ratione.</p>
        </div>
    </section>
    <section id="experience" className="py-lg-4 py-3">
        <div className="container py-4 py-lg-5">
            <div className="section-header text-start mb-4 mb-lg-5 text-white">
                <span className="srv-subtitle highlight mb-4">Our Experience</span>
                <h3 className="mb-3 fw-light">Experience Compassionate Care in <span className="fw-bold">Global Trade</span></h3>
                <p>We Care India is dedicated to transforming global trade with a unique blend of professionalism and compassion. Specializing in import and export services, we ensure seamless logistics, high-quality products, and customer satisfaction. Our commitment to excellence and ethical practices positions us as a trusted partner in international trade. With We Care India, you experience not just business but care that goes beyond borders.</p>
            </div>
            <div className="row g-4 g-lg-5">
                <div className="col-lg-4 col-md-6 order-0 order-md-1">
                    <img src="media/We-Care-India-Group.webp" alt="Experience Image" className="img-fluid rounded-3 w-100 h-100 object-fit-cover" />
                </div>
                <div className="col-lg-8 col-md-6">
                    <div className="experience-box px-4 pb-4 mb-3 ms-4 text-white">
                        <h5 className="mb-3">Reliable Import-Export Services Connecting Businesses Globally:</h5>
                        <p className="mb-0">At We Care India, we specialize in providing dependable import-export solutions, ensuring businesses around the world can access high-quality products and services. Our robust network and expertise make global trade smooth and efficient.</p>
                    </div>
                    <div className="experience-box px-4 pb-4 mb-3 ms-4 text-white">
                        <h5 className="mb-3">Commitment to Quality and Timely Deliveries:</h5>
                        <p className="mb-0">We prioritize delivering the best. With stringent quality checks and a focus on punctuality, We Care India ensures that every shipment meets client expectations and arrives on time, every time.</p>
                    </div>
                    <div className="experience-box px-4 pb-4 mb-3 ms-4 text-white">
                        <h5 className="mb-3">Focused on Building Long-Term Relationships with Clients:</h5>
                        <p className="mb-0">More than just a business, We Care India aims to build lasting partnerships. By understanding client needs and exceeding expectations, we become a trusted ally in their growth journey.</p>
                    </div>
                    <div className="experience-box px-4 pb-4 mb-3 ms-4 text-white">
                        <h5 className="mb-3">Focused on Building Long-Term Relationships with Clients:</h5>
                        <p className="mb-0">More than just a business, We Care India aims to build lasting partnerships. By understanding client needs and exceeding expectations, we become a trusted ally in their growth journey.</p>
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
        {/* Testimonial */}
    <Testimonials settings={settings} />
    {/* Testimonial end */}

</main>
  );
}

export default About;
 