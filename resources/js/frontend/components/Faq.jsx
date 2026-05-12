import { Link } from "react-router-dom";
import useFaq from "../hooks/useFaq";
function Faq() {

      const { faq, loading, error } = useFaq();

  if (loading) return <p>Loading faq...</p>;
  if (error) return <p>{error}</p>;
  return (
 
    <section className="py-3 py-lg-4 bg-light" id="faqs">
        <div className="container py-4 py-lg-5">
            <div className="section-header text-start mb-4 mb-lg-5">
                <span className="srv-subtitle highlight mb-4">FAQs</span>
                <h3 className="mb-3 fw-light">Find Out <span className="fw-bold">Answers Here</span></h3>
            </div>
            <div className="accordion" id="faqAccordion">
                {faq.map((item, index) => (
    <div className="accordion-item" key={item.id}>
        <h2 className="accordion-header" id={`faqHeading${item.id}`}>
            <button
                className={`accordion-button ${index !== 0 ? "collapsed" : ""}`}
                type="button"
                data-bs-toggle="collapse"
                data-bs-target={`#faqCollapse${item.id}`}
                aria-expanded={index === 0 ? "true" : "false"}
                aria-controls={`faqCollapse${item.id}`}
            >
                {item.question}
            </button>
        </h2>

        <div
            id={`faqCollapse${item.id}`}
            className={`accordion-collapse collapse ${index === 0 ? "show" : ""}`}
            aria-labelledby={`faqHeading${item.id}`}
            data-bs-parent="#faqAccordion"
        >
            <div className="accordion-body" dangerouslySetInnerHTML={{ __html: item.answer }}>
              
            </div>
        </div>
    </div>
))}

            </div>
        </div>
    </section>
  );
}

export default Faq;
