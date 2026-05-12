
import { useEffect, useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import About from "./pages/About";
import Contact from "./pages/Contact";
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import ServiceDetails from "./pages/ServiceDetails";
import BlogDetails from "./pages/BlogDetails";
import BlogList from "./pages/BlogList";
import ServiceList from "./pages/serviceList";
import SearchPage from "./pages/SearchPage";
import useSettings from "./hooks/useSettings";
import useMenu from "./hooks/useMenu";
function App() {

const { settings, loading: settingsLoading } = useSettings();
const { menu, loading: menuLoading } = useMenu();

 const loaderStyle = {
    height: "100vh",
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
  };

  return (
     <>
{settingsLoading || menuLoading ? (
    <div style={loaderStyle}>
      <div className="spinner-border text-primary" role="status">
        <span className="visually-hidden">Loading...</span>
      </div>
    </div>
  ) : ( 

    <BrowserRouter>

     <Navbar settings={settings} menu={menu} />
      <Routes>
        <Route path="/" element={<Home settings={settings} />} />
        <Route path="/about" element={<About settings={settings} />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/services/:slug" element={<ServiceList />} />
        <Route path="/servicesdetails/:slug" element={<ServiceDetails />} />
        <Route path="/blog-category/:slug" element={<BlogList />} />
        <Route path="/blog/:slug" element={<BlogDetails />} />
        <Route path="/search" element={<SearchPage />} />
      </Routes>
      <Footer settings={settings} />
    </BrowserRouter>
  )}
  </>
  );
}

export default App;
