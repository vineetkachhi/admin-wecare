import { Link } from "react-router-dom";
import useExperience from "../hooks/useExperience";
import { BASE_URL } from "../config";
function Experience({settings}) {

    const { experience } = useExperience();
    return (
         <section
  id="experience"
  className="py-lg-4 py-3"
  style={{ background: "#2a2662" }}
>
  <div className="container py-4 py-lg-5">

    <div className="section-header text-start mb-4 mb-lg-5 text-white">
      <span className="srv-subtitle highlight mb-4 d-block">
        Our Experience
      </span>

      <h2 className="mb-3 fw-light" dangerouslySetInnerHTML={{ __html: settings?.experience_heading }}>
        
      </h2>

      <p  dangerouslySetInnerHTML={{ __html: settings?.experience_description }}>
      </p>
    </div>

    <div className="row g-4 g-lg-5">
      <div className="col-lg-4 col-md-6 order-0 order-md-1">
        <img loading="lazy" 
          src={BASE_URL + "/" + settings?.experience_image}
          alt="We Care India import export global trade experience"
          className="img-fluid rounded-3 w-100 h-100 object-fit-cover"
        />
      </div>

      <div className="col-lg-8 col-md-6">
        {experience?.length > 0
         && experience.map((item) => (
        <div className="experience-box px-4 pb-4 mb-3 ms-4 text-white" key={item.id}>
          <h5 className="mb-3">
            {item.heading}
          </h5>
          <p className="mb-0" dangerouslySetInnerHTML={{__html: item.description}}>
          </p>
        </div>
        )) }

      </div>
    </div>

  </div>
</section>
    );
}
export default Experience;