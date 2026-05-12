
import { useState } from "react";
import { API_BASE_URL } from "../config";
function Contact_details(){
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

    return(
        
             
                    <div className="service-list-right p-3 rounded-4 position-sticky">
                        <div className="section-header text-start">
                            <span className="srv-subtitle highlight mb-3">Get in Touch</span>
                            <h3 className="mb-3 fw-light">Contact <span className="fw-bold">We Care India Group</span></h3>
                        </div>
                        <div className="contactBox rounded-4">
                             {success && <div className="alert alert-success">{success}</div>}
                            <form action="#" method="post" className="contact-form rounded-4" onSubmit={handleSubmit}>
                                <div className="mb-3 form-group">
                                    <input type="text" className="form-control" id="name" value={formData.name}
                  onChange={handleChange} name="name" required />
                                    <label for="name" className="form-label">Name</label>
                                </div>
                                <div className="mb-3 form-group">
                                    <input type="email" className="form-control" id="email" value={formData.email}
                  onChange={handleChange} name="email" required />
                                    <label for="email" className="form-label">Email</label>
                                </div>
                                <div className="mb-3 form-group">
                                    <input type="tel" className="form-control" id="phone" onChange={handleChange} value={formData.phone} name="phone" required />
                                    <label for="phone" className="form-label">Mobile No.</label>
                                </div>
                                <div className="mb-3 form-group">
                                    <textarea className="form-control" id="message" value={formData.message}
                  onChange={handleChange} name="message" rows="3" required></textarea>
                                    <label for="message" className="form-label">Message</label>
                                </div>
                                <button type="submit" className="btn btn-primary" disabled={loading}>{loading ? "Please wait..." : "Submit"}</button>
                            </form>
                        </div>
                    </div>

    );
}
export default Contact_details;