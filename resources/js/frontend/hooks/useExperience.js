import { useEffect, useState } from "react";
import { getExperience } from "../services/apiService";

const useExperience = () => {
  const [experience, setExperience] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchExperience = async () => {
      try {
        const data = await getExperience();
        setExperience(data); 
        // console.log("Experience data:", data);
      } catch (err) {
        setError("Experience load failed");
      } finally {
        setLoading(false);
      }
    };

    fetchExperience();
  }, []);

  return { experience, loading, error };
};

export default useExperience;
