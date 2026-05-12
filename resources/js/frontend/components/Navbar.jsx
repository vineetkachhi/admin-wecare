import { Link,useNavigate  } from "react-router-dom";
import { useState, useRef, useEffect } from "react";
import { BASE_URL } from "../config";
function Navbar({settings,menu}) {
const [active, setActive] = useState(false);
  const formRef = useRef(null);
  const buttonRef = useRef(null);
    const [search, setSearch] = useState("");
  const navigate = useNavigate();

      useEffect(() => {
    function handleClickOutside(event) {
      if (
        formRef.current &&
        !formRef.current.contains(event.target) &&
        buttonRef.current &&
        !buttonRef.current.contains(event.target)
      ) {
        setActive(false);
      }
    }

    document.addEventListener("click", handleClickOutside);
    return () => {
      document.removeEventListener("click", handleClickOutside);
    };
  }, []);


  const handleSearch = (e) => {
    console.log("Search query:", search);
    e.preventDefault();
    if (search.trim() !== "") {
       console.log("Search query redirect:", search);
      navigate(`/search?query=${search}`);
    }
  };
  return (
 <div> 
    <div id="ticker">
    <div className="container">
        <div className="ticker-block">
            <div className="ticker_left text-center text-md-start">
                <a href={`tel:+${settings?.site_phone}`} className="alink"><i className="fa fa-phone pe-md-2"></i><span>+{settings?.contact_phone}</span></a>
                <a href={`mailto:${settings?.site_email}`} className="alink"><i className="fa fa-envelope pe-md-2"></i><span>{settings?.contact_email}</span></a>
            </div>
            <div className="ticker_right d-none d-md-block"> 
                <a href="#" className="alink"><i className="fa-brands fa-facebook-f"></i></a>
                <a href="#" className="alink"><i className="fa-brands fa-twitter"></i></a>
                <a href="#" className="alink"><i className="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</div>  
    <header>
    <div className="container">
        <div className="header-wrapper">
            {settings ? <div className="main-logo">
                <Link to="/"><img src={`${BASE_URL}/${settings?.site_logo}`} alt="We Care" width="" height="" loading="lazy"  /> </Link>
            </div>:'Loading...'}
            <div className="header-navbar">
                <div className="menubar">
                    <ul className="navbar-block">
                        <li className="mobile_menu_bar"><svg height="50" width="50" className="svg-inline--fa fa-xmark" data-prefix="fas" data-icon="xmark" role="img" viewBox="0 0 384 512" aria-hidden="true" data-fa-i2svg=""><path fill="currentColor" d="M55.1 73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L147.2 256 9.9 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192.5 301.3 329.9 438.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.8 256 375.1 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192.5 210.7 55.1 73.4z"></path></svg></li>
                        <li><Link to="/">Home</Link></li>
                        <li><Link to="/about">About Us</Link></li>
                        

                        <li className="dropdown-list">
                            <a href="/services/all">Services</a>
                            <i className="drop-plus" hidden=""></i>
                            <ul className="sublist">
                              {menu?.categories?.length > 0 &&
                                menu.categories.map((item) => (
                                  <li className="dropdown-list"  key={item.id}><Link style={{ margin:'5px' }} key={item.id} to={`/services/${item.slug}`}>{item.name}</Link>
                                     {item.products && item.products.length > 0 && (
                                      <>
                                      <i className="drop-plus" hidden=""></i>
                                      <ul className="sublist">
                                    {item.products && item.products.map((prod) => (
                                        <li key={prod.id}><Link to={`/servicesdetails/${prod.slug}`}>{prod.name}</Link></li>
                                    ))}
                                    </ul>
                                    </>
                                      )}
                                </li>
                              ))}
                            </ul>
                        </li>
                        <li className="dropdown-list"><a href="/blog-category/all">Blog</a>
                            <i className="drop-plus" hidden=""></i>
                            <ul className="sublist">
                                {menu?.blog_categories?.length > 0 &&menu.blog_categories.map((item) => (
                                    <li  key={item.id}><Link to={`/blog-category/${item.slug}`}>{item.name}</Link></li>
                                ))}
                            </ul>
                        </li>
                        <li><Link to="/contact" className="actionBtn">Contact Us</Link></li>
                        <li
                          className="actionBtn searchBtn"
                          onClick={() => setActive(!active)}
                          ref={buttonRef}>
                          <i className="fa-solid fa-magnifying-glass"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     <form
        className={`${active ? "active" : "d-none"}`}
        id="searchform"
        ref={formRef} onSubmit={handleSearch}
      >
        <div className="container">
          <div className="form-group d-flex align-items-center justify-content-center position-relative">
            <input type="text" className="form-control" value={search}
        onChange={(e) => setSearch(e.target.value)} />
            <button type="submit" className="actionBtn">
              Search
            </button>
          </div>
        </div>
      </form>

</header>
</div>
  );
}

export default Navbar;
