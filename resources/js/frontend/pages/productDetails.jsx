import { useEffect, useState } from "react";
import { Link,useParams  } from "react-router-dom";


import { API_BASE_URL,BASE_URL } from "../config";

function ProductDetails() {
  const [details, setDetails] = useState([]);
const { slug } = useParams(); 
  useEffect(() => {
    fetch(`${API_BASE_URL}/productDetails/${slug}`)
      .then(res => res.json())
      .then(data => setDetails(data));
  }, [slug]);

  return (
    <main>
      <h2>All Product Details</h2>

      {details.map(detail => (
        <div key={detail.id}>
          <h3>
            <Link to={`/productdetails/${detail.slug}`}>
              {detail.title}
            </Link>
          </h3>
          <p>{detail.short_description}</p>
          <p   dangerouslySetInnerHTML={{ __html: detail.long_description }}></p>
          <img src={`${BASE_URL}/${detail.image}`} alt={detail.title} width="200" />
        </div>
      ))}
    </main>
  );
}

export default ProductDetails;
