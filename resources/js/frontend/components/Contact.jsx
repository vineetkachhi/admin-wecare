import { useState } from "react";
import { API_BASE_URL } from "../config";

function Contact() {

  const [formData, setFormData] = useState({
    name: "",
    email: "",
    message: ""
  });
  const [loading, setLoading] = useState(false);

  const [success, setSuccess] = useState("");

  // Handle input change
  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  // Handle form submit
  const handleSubmit = async (e) => {
    e.preventDefault(); // page reload stop
setLoading(true);
    try {
      const response = await fetch(`${API_BASE_URL}/contact`, {
        method: "POST",
        headers: { 
          "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
      });

      const data = await response.json();

      if (response.ok) {
        setSuccess("Message sent successfully!");
        setFormData({ name: "", email: "", phone: "", message: "" });
      }

    } catch (error) {
      console.error("Error:", error);
    }finally {
    setLoading(false); // button enable again
  }
  };

  return (
 <section id="contact" className="py-3 py-lg-4">
        <div className="container py-4 py-lg-5">
            <div className="section-header text-start mb-4 mb-lg-5">
                <span className="srv-subtitle highlight mb-4">Get in Touch</span>
                <h3 className="mb-3 fw-light">Contact <span className="fw-bold">We Care India Group</span></h3>
                <p>Ready to experience compassionate care in global trade? Contact We Care India Group today to discuss your import-export needs and discover how we can support your business growth with our reliable services.</p>
            </div>
            <div className="contactBox rounded-4 p-4">
                <div className="row g-4 g-lg-5 align-items-center">
                <div className="col-lg-6">
                    {success && <div className="alert alert-success">{success}</div>}
                    <form action="#" method="post" className="contact-form rounded-4 bg-white p-4" onSubmit={handleSubmit}>
                        <div className="mb-3 form-group">
                            <input type="text" className="form-control" id="name" name="name"
                  value={formData.name}
                  onChange={handleChange} required />
                            <label htmlFor="name" className="form-label" >Name</label>
                        </div>
                        <div className="mb-3 form-group">
                            <input type="email" className="form-control" id="email" name="email"
                  value={formData.email}
                  onChange={handleChange} required />
                            <label htmlFor="email" className="form-label">Email</label>
                        </div>
                        <div className="mb-3 form-group">
                                <input type="tel" className="form-control" id="phone" onChange={handleChange} value={formData.phone} name="phone" required />
                                <label htmlFor="phone" className="form-label">Mobile No.</label>
                            </div>
                        <div className="mb-3 form-group">
                            <textarea className="form-control" id="message" name="message"
                  rows="5" 
                  value={formData.message}
                  onChange={handleChange} required></textarea>
                            <label htmlFor="message" className="form-label">Message</label>
                        </div>
                        <button type="submit" className="btn btn-primary" disabled={loading}>{loading ? "Please wait..." : "Submit"}</button>
                    </form>
                </div>
                <div className="col-lg-6">
                    <div className="contact-info text-white">
                        <h3 className="mb-4 fw-light">Achieve Operational Excellence with <strong className="fw-bold">We Care India Group</strong></h3>
                        <ul>
                            <li><i className="fa-regular fa-paper-plane"></i>&nbsp;Project initiation within 48 hours</li>
                            <li><i className="fa-regular fa-clock"></i>&nbsp;Round-the-Clock Support</li>
                            <li><i className="fa-solid fa-shield-halved"></i>&nbsp;Strict NDAs for data security</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
  );
}

export default Contact;
