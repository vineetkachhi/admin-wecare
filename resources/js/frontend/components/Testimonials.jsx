import { Link } from "react-router-dom";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import useTestimonials from "../hooks/useTestimonial";
import { BASE_URL } from "../config";

function Testimonials({settings}) {
  const { testimonials, loading, error } = useTestimonials();

  if (loading) {
    return <div className="text-center">Loading testimonials...</div>;
  }

  if (error) {
    return <div className="text-center text-danger">{error}</div>;
  }

  return (
    <section id="customer" className="py-3 py-lg-4">
  <div className="container py-4 py-lg-5">
    <div className="section-header text-center mb-4 mb-lg-5">
                <span className="srv-subtitle highlight mb-4">Customer testimonials</span>
                <h3 className="mb-3 fw-light" dangerouslySetInnerHTML={{ __html: settings?.testimonial_heading }}></h3>
            </div>

    <Swiper
      modules={[Navigation, Pagination, Autoplay]}
      spaceBetween={20}
      slidesPerView={3}
      autoplay={{ delay: 3000 }}
      pagination={{ clickable: true }}
      
      breakpoints={{
        0: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      }}
    >
      {testimonials.map((testimonial) => (
      <SwiperSlide>
        <div className="swiper-slide h-auto mb-4">
                        <div className="rounded-4 p-4 m-3 h-100 border weCare-box">
                            <p className="mb-0" dangerouslySetInnerHTML={{ __html: testimonial.message }}></p>
                            <div className="mt-3 mb-0 d-flex align-items-center gap-2">
                                <img src={`${BASE_URL}/${testimonial.image}`} alt={testimonial.client_name} loading="lazy"  className="rounded-circle object-fit-cover ms-3" width="60" height="60" />
                                <span className="fs-6 fw-light">-{testimonial.client_name} <br/><strong>{testimonial.client_location}</strong></span>
                            </div>
                        </div>
                    </div>
      </SwiperSlide>
      ))}

    </Swiper>
  </div>
</section>

    );
}

export default Testimonials; 