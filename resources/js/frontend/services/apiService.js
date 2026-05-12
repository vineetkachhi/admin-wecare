import axios from "axios";
import { API_BASE_URL } from "../config";
const API_URL = API_BASE_URL;

// settings api call start

export const getSettings = async () => {
  const response = await axios.get(API_URL + "/settings");
  return response.data;
};
// menu api call start
export const getNavbarMenu = async () => {
  const response = await axios.get(API_URL + "/menu");
  return response.data;
};


// faq api call start 

  export const getFaq = async () => {
    const response = await axios.get(API_URL + "/faq");
    return response.data;
  };

  
// testimonials api call start
export const getTestimonials = async () => {
  const response = await axios.get(API_URL + "/testimonials");
  return response.data;
};

// popular works api call start
export const getPopularWorks = async () => {
  const response = await axios.get(API_URL + "/popularWorks");
  return response.data;
};

// experience api call start
export const getExperience = async () => {
  const response = await axios.get(API_URL + "/experiences");
  return response.data;
};