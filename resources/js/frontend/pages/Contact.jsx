import { Link } from "react-router-dom";
import Contacts from "../components/Contact";

function Contact() {
  return (<main>
    <section className="information_banner position-relative mx-2 rounded-4 overflow-hidden">
        <img src="./media/cta-banner.jpg" width="" height="" alt="Information Banner" className="img-fluid w-100 position-absolute h-100" />
        <div className="container">
            <div className="info_content d-flex flex-column align-items-center justify-content-center position-absolute z-1">
                <h1 className="text-center">Contact Us</h1>
                <nav aria-label="Breadcrumb" className="d-flex align-items-center justify-content-center list-unstyled p-0 w-100">
                    <ul className="d-flex align-items-center justify-content-center list-unstyled mb-0 p-0">
                        <li><Link to="/">Home</Link></li>
                        <li>Contact Us</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <Contacts />
     <section id="popular" className="py-4 py-lg-5">
        <div className="container py-4 py-lg-5">
            <div className="row row-cols-1 row-cols-md-3 g-4 g-md-5">
                <div className="col">
                    <div className="weCare-box p-4 h-100 border rounded-5 bg-white">
                        <span className="weCare_icon"><i className="fa-regular fa-headphones"></i></span>
                        <h5 className="mb-3">+91 97160 39639</h5>
                        <p className="mb-0">Call us: Mon - Fri 9:00 - 19:00</p>
                    </div>
                </div>
                <div className="col">
                    <div className="weCare-box p-4 h-100 border rounded-5 bg-white">
                        <span className="weCare_icon"><i className="fa-solid fa-location-crosshairs"></i></span>
                        <h5 className="mb-3">India</h5>
                        <p className="mb-0">India, Delhi, Mumbai Address as per GST -XXXXXF1Z9</p>
                    </div>
                </div>
                <div className="col">
                    <div className="weCare-box p-4 h-100 border rounded-5 bg-white">
                        <span className="weCare_icon"><i className="fa-solid fa-at"></i></span>
                        <h5 className="mb-3">info@wecareindia.in</h5>
                        <p className="mb-0">Drop us a line anytime!</p>
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
</main>
);
}

export default Contact;
 