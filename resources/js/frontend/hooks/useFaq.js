import { useEffect, useState } from "react";
import { getFaq } from "../services/apiService";

const useFaq = () => {
  const [faq, setFaq] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchFaq = async () => {
      try {
        const data = await getFaq();
        setFaq(data); 
        // console.log("FAQ data:", data);
      } catch (err) {
        setError("FAQ load failed");
      } finally {
        setLoading(false);
      }
    };

    fetchFaq();
  }, []);

  return { faq, loading, error };
};

export default useFaq;
