import { useEffect, useState } from "react";
import { getTestimonials } from "../services/apiService";

let cachedTestimonials = null;

const useTestimonials = () => {
  const [testimonials, setTestimonials] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    let cancelled = false;

    const fetchTestimonials = async () => {
      try {
        if (cachedTestimonials) {
          setTestimonials(cachedTestimonials);
          return;
        }

        const data = await getTestimonials();
        if (cancelled) return;
        cachedTestimonials = data;
        setTestimonials(data);
        // console.log("Testimonials data:", data);
      } catch (err) {
        if (cancelled) return;
        setError("Testimonials load failed");
      } finally {
        if (!cancelled) setLoading(false);
      }
    };

    fetchTestimonials();

    return () => {
      cancelled = true;
    };
  }, []);

  return { testimonials, loading, error };
};

export default useTestimonials;
