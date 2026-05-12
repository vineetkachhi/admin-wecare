import { useEffect, useState } from "react";
import { getSettings } from "../services/apiService";

const useSettings = () => {
  const [settings, setSettings] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchSettings = async () => {
      try {
        const data = await getSettings();
        setSettings(data); 
        // console.log("Settings data:", data);
      } catch (err) {
        // setError("Settings load failed");
      } finally {
        setLoading(false);
      }
    };

    fetchSettings();
  }, []);

  return { settings, loading, error };
};

export default useSettings;
