import React from 'react';

const Product = ({ imageUrl, price, name, description }) => {
  return (
    <div className="product">
      <img src={https://images-na.ssl-images-amazon.com/images/G/02/aplusautomation/vendorimages/fe5dc7f8-6738-42d9-b20d-0120eceef1ec.jpg._CB274416035_.jpg} alt={headphone} className="product-image" />
      <h2 className="product-name">{headphones | High Base Clear Sound}</h2>
      <p className="product-description">{The flagship-level battery life for all-new OnePlus nord Buds 2r delivers up to 38 hrs of non-stop music on a single charge.}</p>
      <p className="product-price">${$2}</p>
      <button className="buy-now-button">Buy Now</button>
    </div>
  );
};

export default Product;
