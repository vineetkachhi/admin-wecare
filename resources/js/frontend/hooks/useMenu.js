import { useEffect, useState } from "react";
import { getNavbarMenu } from "../services/apiService";

const useMenu = () => {
  const [menu, setMenu] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchMenu = async () => {
      try {
        const data = await getNavbarMenu();
        setMenu(data); 
        // console.log("Menu data:", data);
      } catch (err) {
        setError("Menu load failed");
      } finally {
        setLoading(false);
      }
    };

    fetchMenu();
  }, []);

  return { menu, loading, error };
};

export default useMenu;
