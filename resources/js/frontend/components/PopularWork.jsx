import { Link } from "react-router-dom";
import usePopularWorks from "../hooks/usePopularWorks";

function PopularWork({settings}) {
  const { popularWorks, loading, error } = usePopularWorks();

  if (loading) {
    return <div className="text-center">Loading...</div>;
  }

  if (error) {
    return <div className="text-center text-danger">{error}</div>;
  }

  return (
    <section id="popular" className="py-4 py-lg-5">
        <div className="container py-4 py-lg-5">
            <div className="row g-4 g-lg-5"> 
                <div className="col-md-4">
                    <div className="section-header text-start mb-4 mb-lg-5">
                        <span className="srv-subtitle highlight mb-4">Our Popular Work</span>
                        <h3 className="mb-3 fw-light text-white" ><span  dangerouslySetInnerHTML={{ __html: settings?.popular_heading }} ></span></h3>
                    </div>
                </div>
                <div className="col-md-8">
                    <div className="row row-cols-1 row-cols-md-2 g-4 g-md-5">
                        {popularWorks.map((work) => (
                        <div className="col"  key={work.id}>
                            <div className="weCare-box p-4 h-100 border rounded-5 bg-white">
                                <h5 className="mb-3">{work.title}</h5>
                                <p className="mb-0" dangerouslySetInnerHTML={{ __html: work.description }}></p>
                            </div>
                        </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
     </section>
  );
}

export default PopularWork;
