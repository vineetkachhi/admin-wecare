import { useEffect, useState } from "react";
import { getPopularWorks } from "../services/apiService";

const usePopularWorks = () => {
  const [popularWorks, setPopularWorks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchPopularWorks = async () => {
      try {
        const data = await getPopularWorks();
        setPopularWorks(data); 
        // console.log("Popular Works data:", data);
      } catch (err) {
        setError("Popular Works load failed");
      } finally {
        setLoading(false);
      }
    };

    fetchPopularWorks();
  }, []);

  return { popularWorks, loading, error };
};

export default usePopularWorks;
