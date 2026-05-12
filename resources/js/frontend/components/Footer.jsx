import { Link } from "react-router-dom";
import { API_BASE_URL,BASE_URL } from "../config";
function Footer({settings}) {

    return (
<footer className="py-4 py-lg-5 pb-0 pb-lg-0">
    <div className="footer-wrapper">
        <div className="container">
            <div className="row">
                <div className="col-md-6">
                    <div className="footer-content py-4">
                        <Link href=""><img src={`${BASE_URL}/${settings?.site_logo}`} alt="We Care" className="w-100" style={{ width: '50px' }}   /></Link>
                        <h4 className="mb-3 text-white">{settings?.footer_heading}</h4>
                        <p className="mb-0 text-white" dangerouslySetInnerHTML={{ __html: settings?.footer_description }}></p>
                    </div>
                </div>
                <div className="col-md-3">
                    <div className="footer-content py-4">
                        <h3 className="mb-3 fw-bold text-white">Quick Links</h3>
                        <ul className="list-unstyleNamed">
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#ourService">Our Service</a></li>
                            <li><a href="#popular">Blog</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                            <li><a href="#privacy">Privacy Policy</a></li>
                            <li><a href="#terms">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div className="col-md-3">
                    <div className="footer-content py-4 ">
                        <h3 className="mb-3 fw-bold text-white">Contact Us</h3>
                        <p className="mb-3 text-white"><i className="fa-solid fa-location-dot"></i>&nbsp;{settings?.address}</p>
                        <p className="mb-3"><a href={`tel:+${settings?.contact_phone}`}><i className="fa-solid fa-phone"></i>&nbsp;+{settings?.contact_phone}</a></p>
                        <p className="mb-0"><a href={`mailto:${settings?.contact_email}`}><i className="fa-solid fa-envelope"></i>&nbsp;{settings?.contact_email}</a></p>
                        <h4 className="mt-4 mb-3 text-white">Social Links</h4>
                        <div className="footer-social">
                            <a href={settings?.facebook_link} className="alink" target="_blank" rel="noopener noreferrer"><i className="fa-brands fa-facebook-f"></i></a>
                            <a href={settings?.twitter_link} className="alink" target="_blank" rel="noopener noreferrer"><i className="fa-brands fa-twitter"></i></a>
                            <a href={settings?.linkedin_link} className="alink" target="_blank" rel="noopener noreferrer"><i className="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <p>&copy; 2026 We Care Export Group. All rights reserved.</p>
</footer>
    
  );
}

export default Footer;
