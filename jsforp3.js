
var products = [
  {name:"Edamame", price:"$2.99", img: "pictures/adameme.jpg"},
  {name:"Chocolate Waffels", price:"$4.99", img: "pictures/chocolatewaffels.jpg"},
  {name:"Cookies Cream Ice-cream", price:"$3.99", img: "pictures/cookiedcreamicecream.jpg"},
  {name:"Falafel", price:"$4.99", img: "pictures/falafel.jpg"},
  {name:"Creamy Spinach Tomato", price:"$3.99", img: "pictures/creamyspinach.jpg"},
  {name:"Frozen Pizza", price:"$9.49", img: "pictures/frozenpizza.jpg"},
];

              function increment(){
                var value = parseInt(document.getElementById("quan").innerHTML) + 1;
                document.getElementById("quan").innerHTML = value;
                
              }
              
              function Decrement() {
                  if (document.getElementById("quan").innerHTML==1){
                    document.getElementById("quan").innerHTML = 1;
                  }
                  else{
                    var value = parseInt(document.getElementById("quan").innerHTML) - 1;
                    document.getElementById("quan").innerHTML = value;
                  }
              }

function moreInfo() {
  var showDot = document.getElementById("showDots");
  var hidenText = document.getElementById("hiddenText");
  var btnText = document.getElementById("more-Info");
  var arrow = document.getElementsByClassName("more-info");

  if (showDot.style.display === "none") {
    showDot.style.display = "inline";
    btnText.innerHTML = "More Description"; 
    hidenText.style.display = "none";
  } else {
    showDot.style.display = "none";
    btnText.innerHTML = "Less Description"; 
    hidenText.style.display = "inline";
  }
}

function addToCartButton() {
    var key = document.getElementsByClassName("namep").innerHTML;
    if (document.getElementById("cart-tab").innerHTML == "Shopping Cart") {
      var addItems = parseInt(document.getElementById("quan").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + addItems + ")";
      document.getElementById("quan").innerHTML = 1;
      addToSessionStorage(key, addItems);
    } else {
      if (document.getElementById("cart-tab").innerHTML.length == 17) {
        var noOfItems = parseInt(
          document.getElementById("cart-tab").innerHTML.substring(15, 16)
        );
        var addItems = parseInt(document.getElementById("quan").innerHTML);
        document.getElementById("cart-tab").innerHTML =
          "Shopping Cart (" + (noOfItems + addItems) + ")";
        document.getElementById("quan").innerHTML = 1;
        addToSessionStorage(key, noOfItems + addItems);
      } else if (document.getElementById("cart-tab").innerHTML.length == 18) {
        var noOfItems = parseInt(
          document.getElementById("cart-tab").innerHTML.substring(15, 17)
        );
        var addItems = parseInt(document.getElementById("quan").innerHTML);
        document.getElementById("cart-tab").innerHTML =
          "Shopping Cart (" + (noOfItems + addItems) + ")";
        document.getElementById("quan").innerHTML = 1;
        addToSessionStorage(key, noOfItems + addItems);
      } else {
        var noOfItems = parseInt(
          document.getElementById("cart-tab").innerHTML.substring(15, 18)
        );
        var addItems = parseInt(document.getElementById("quan").innerHTML);
        document.getElementById("cart-tab").innerHTML =
          "Shopping Cart (" + (noOfItems + addItems) + ")";
        document.getElementById("quan").innerHTML = 1;
        addToSessionStorage(key, noOfItems + addItems);
      }
    }
  }





//checkEmptyCart()

  //var cartRow = document.createElement('tr')
  var something = ``;
  var firstthing = `<table class="cart">
  <tr class="cart-fields">
      <th>Item</th>
      <th>Quantity</th>
      <th>Price</th>
  </tr>`;
  var nextthing = ``;
  var lastthing = `</table>`;
  for (var i = 0; i < sessionStorage.length; i++) {
    for (var p = 0; p < products.length; p++) {
      if (
        products[p].name == sessionStorage.key(i) &&
        sessionStorage.getItem(products[p].name) != 0
      ) {
        nextthing =
          nextthing +
          `<tr class="cart-item">
      <td class="item-name"><img src="${
        products[p].img
      }" alt="Edamame" width="150"
              height="150"><br><span id = "productname">${products[p].name}</span>
      </td>
      <td>
          <button class="button-cart-remove" type="button">-</button> <span class="item-quantity">${sessionStorage.getItem(
            products[p].name
          )}</span>
          <button class="button-cart-add" type="button">+</button>
      </td>
      <td class="item-price">${products[p].price}</td>
  </tr>`;
      }
    }
  }
  something = firstthing + nextthing + lastthing;
  
  var cart = document.getElementsByClassName("try")[0]; /*sids js for page 4*/
  var cartRow = document.createElement("div"); /*sids js for page 4*/
  var cartRowContent = something; /*sids js for page 4*/
  cartRow.innerHTML = cartRowContent; /*sids js for page 4*/
  cart.prepend(cartRow); /*sids js for page 4*/
  
  /*sids js for page 4*/
  var removeQuantityButton = document.getElementsByClassName(
    "button-cart-remove"
  );
  /*sids js for page 4*/
  var addQuantityButton = document.getElementsByClassName("button-cart-add");
  /*sids js for page 4*/
  var itemQuantity = document.getElementsByClassName("item-quantity");
  updateCartTotal();
  
  /*sids js for page 4*/
  //console.log(document.getElementsByClassName("item-quantity")[0].innerHTML)
  for (var i = 0; i < removeQuantityButton.length; i++) {
    var button = removeQuantityButton[i];
    if (itemQuantity[i].innerHTML == 1) {
      //console.log(itemQuantity[i].innerHTML);
      button.addEventListener("click", function (event) {
        var removePrompt = confirm("Do you want to remove this item from cart?");
        if (removePrompt == true) {
          console.log(buttonClicked.parentNode.children[0].children[2].innerText, 0)
          sessionStorage.setItem(
            buttonClicked.parentNode.children[0].children[2].innerText,
            0
          );
          var buttonClicked = event.target;
          buttonClicked.parentNode.parentNode.remove();
          updateCartTab(-1);
          updateCartTotal();
          checkEmptyCart();
        }
      });
    } else {
      button.addEventListener("click", function (event) {
        var buttonClicked = event.target.parentNode;
        if (buttonClicked.children[1].innerHTML == 1) {
          var removePrompt = confirm(
            "Do you want to remove this item from cart?"
          );
          if (removePrompt == true) {
            sessionStorage.setItem(
              buttonClicked.parentNode.children[0].children[2].innerText,
              0
            );
            buttonClicked.parentNode.remove();
            updateCartTab(-1);
            updateCartTotal();
            checkEmptyCart();
          }
        } else {
          sessionStorage.setItem(
            buttonClicked.parentNode.children[0].children[2].innerText,
            buttonClicked.children[1].innerHTML - 1
          );
          buttonClicked.children[1].innerHTML -= 1;
          updateCartTab(-1);
          updateCartTotal();
          checkEmptyCart();
        }
      });
    }
  }
  /*sids js for page 4*/
  for (var i = 0; i < addQuantityButton.length; i++) {
    var button = addQuantityButton[i];
    button.addEventListener("click", function (event) {
      var buttonClicked = event.target.parentNode;
      sessionStorage.setItem(
        buttonClicked.parentNode.children[0].children[2].innerText,
        parseInt(buttonClicked.children[1].innerHTML) + 1
      );
      buttonClicked.children[1].innerHTML =
        parseInt(buttonClicked.children[1].innerHTML) + 1;
        updateCartTab(1);
      updateCartTotal();
      checkEmptyCart();
    });
  }
  /*sids js for page 4*/
  function updateCartTotal() {
    var cartItem = document.getElementsByClassName("cart-item");
    var total = 0;
    for (var i = 0; i < cartItem.length; i++) {
      var price = parseFloat(
        cartItem[i]
          .getElementsByClassName("item-price")[0]
          .innerText.replace("$", "")
      );
      var quantity = parseInt(
        cartItem[i].getElementsByClassName("item-quantity")[0].innerText
      );
      total = total + price * quantity;
    }
    document.getElementsByClassName("subtotal")[0].innerText = total.toFixed(2);
    document.getElementsByClassName("qst")[0].innerText = (
      0.09975 * total
    ).toFixed(2);
    document.getElementsByClassName("gst")[0].innerText = (0.05 * total).toFixed(
      2
    );
    document.getElementsByClassName("total")[0].innerText = (
      parseFloat(document.getElementsByClassName("subtotal")[0].innerText) +
      parseFloat(document.getElementsByClassName("qst")[0].innerText) +
      parseFloat(document.getElementsByClassName("gst")[0].innerText)
    ).toFixed(2);
  }
  
  /*sids js for page 4*/
  function checkEmptyCart() {
    var cartItem = document.getElementsByClassName("cart-item");
    if (cartItem.length == 0) {
      alert(
        "Your cart is empty, let's take you to homepage and add some items!!"
      );
      location.replace("index.html");
    }
  }
    
  function addToCartAisle(name){
    var itemName = ""+name
    console.log(itemName)
    addToSessionStorage(name, 1)
    updateCartTab(1)

  
    
  }
  
  
  /*sids js for page 4*/
  function addToSessionStorage(itemName, itemQuantity) {
      if (sessionStorage.getItem(itemName) != null) {
        sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem(itemName)) + parseInt(itemQuantity)));
        
      } else {
        sessionStorage.setItem(itemName, itemQuantity);
      }
      //showShowCartTab();
    }
    
    //sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem("itemName")) + parseInt(itemQuantity)));
  /*sids js for page 4*/
  function updateCartTab(value) {
    if (sessionStorage.getItem("itemTotal") != null) {
      sessionStorage.setItem(
        "itemTotal",
        parseInt(sessionStorage.getItem("itemTotal")) + parseInt(value)
      );
    } else {
      sessionStorage.setItem("itemTotal", value);
    }
    showShowCartTab();
  }
  
  function showShowCartTab() {
      //console.log(sessionStorage.getItem("itemTotal"))
    document.getElementById("cart-tab").innerHTML =
      "Shopping Cart (" + sessionStorage.getItem("itemTotal") + ")";
  }