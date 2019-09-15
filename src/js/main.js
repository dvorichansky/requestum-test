const productData = {
  entities: null,
  totalData: 0,
  totalCurrent: document.querySelectorAll(".product-list-item").length
};

const productRequestData = {
  productPageNumber: 2,
  productQuantity: 4
};

const DOM_PROD = {
  prodLoadMore: document.getElementById("prodLoadMore"),
  productList: document.getElementById("productList")
};

function productGet() {
  if (productData.totalData !== productData.totalCurrent) {
    let link = "/list.php",
      pageNumber = productRequestData.productPageNumber,
      quantity = productRequestData.productQuantity;

    var xhr = new XMLHttpRequest();

    xhr.open("GET", `${link}?page=${pageNumber}&per_page=${quantity}`, true);
    xhr.send();

    xhr.onreadystatechange = function() {
      if (this.readyState != 4) {
        let responseDataObj = JSON.parse(xhr.responseText);
        productData.entities = responseDataObj.entities;
        productData.totalCurrent += productData.entities.length;
        productData.totalData = responseDataObj.total;

        productRequestData.productPageNumber++;

        if (DOM_PROD.prodLoadMore.classList.contains("load")) {
          productDisplay();
          DOM_PROD.prodLoadMore.classList.remove("load");
          DOM_PROD.prodLoadMore.disabled = false;
        }
        return;
      }

      if (this.status != 200) {
        alert(
          "ошибка: " + (this.status ? this.statusText : "запрос не удался")
        );
        return;
      }
    };
  } else {
    DOM_PROD.prodLoadMore.remove();
  }
}

function productDisplay() {
  productData.entities.forEach(e => {
    DOM_PROD.productList.insertAdjacentHTML(
      "beforeEnd",
      `
          <div class="product-list-item product-pre-animation">
            <div class="product-list-item__picture">
              <img src="${e.img}" alt="${e.title}">
              ${
                e.new
                  ? `<div class="product-list-item__sprite-new">NEW</div>`
                  : ""
              }
              ${
                e.discountCost
                  ? `<div class="product-list-item__sprite-discount">SALE</div>`
                  : ""
              }
            </div>
            <div class="product-list-item__delineation">
              <h3 class="product-list-item__title">${e.title}</h3>
              <p class="product-list-item__description">${e.description}</p>
            </div>
            <div class="product-list-item__cost">
              ${
                e.discountCost
                  ? `<div class="product-list-item__cost-discount">$${e.discountCost}</div>`
                  : ""
              }  
              <div class="product-list-item__cost-current">$${
                e.cost
              }</div>                  
            </div>
            <div class="product-list-item__operation">
              <button class="btn btn-bright product-list-item__add">ADD TO CART</button>
              <button class="btn btn-faint product-list-item__view">VIEW</button>
            </div>
          </div>
          `
    );
    setTimeout(function() {
      document.querySelectorAll(".product-list-item").forEach(e => {
        e.classList.remove("product-pre-animation");
      });
    }, 100);
  });

  productData.entities = null;
  productGet();
}

DOM_PROD.prodLoadMore.addEventListener("click", function() {
  if (productData.entities) {
    productDisplay();
  } else {
    DOM_PROD.prodLoadMore.classList.add("load");
    DOM_PROD.prodLoadMore.disabled = true;
  }
});

document.addEventListener("DOMContentLoaded", productGet);
