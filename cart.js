//checkEmptyCart()
var products = [
  {
    name: "Hellman's Mayonnaise",
    price: "$19.49",
    img: "mayonnaise.png",
  },
  {
    name: "Diced Tomatoes",
    price: "$12.99",
    img: "dtomatoes.png",
  },
  {
    name: "Solid Light Tuna",
    price: "$14.99",
    img: "tuna.png",
  },
  {
    name:"Plain Balkan Yogurt",
    price:"$3.99",
    img:"d1.jpg",
  },
  {
    name:"Lactina Partly Skimmed Milk 2%",
    price:"$5.19",
    img:"d2.jpg",
  },
  {
    name:"Quebon Bagged Milk 2%",
    price:"$6.99",
    img:"d3.jpg",
  },
  {
    name:"1 Year Old Organic Cheddar",
    price:"$9.79",
    img:"d4.jpg",
  },
  {
    name:"Strawberry Cherry Yogurt Tubes",
    price:"$3.99",
    img:"d5.jpg",
  },
  {
    name:"Yop Drinkable Yogurt",
    price:"$9.99",
    img:"d7.jpg",
  },
];
updateCartTab(0);
//var cartRow = document.createElement('tr')

// code to dynamically create the cart on every pageload-------------------------------------------------
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
    }" alt="Mayonnaise Container" width="150"
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

var cart = document.getElementsByClassName("try")[0];
var cartRow = document.createElement("div");
var cartRowContent = something;
cartRow.innerHTML = cartRowContent;
cart.prepend(cartRow);

//--------------------------------------------------------------------------------------------------



//code to parse details from shopping cart and update cart quaantities or remove item from-------------------------
var removeQuantityButton = document.getElementsByClassName(
  "button-cart-remove"
);
var addQuantityButton = document.getElementsByClassName("button-cart-add");
var itemQuantity = document.getElementsByClassName("item-quantity");
updateCartTotal();

//console.log(document.getElementsByClassName("item-quantity")[0].innerHTML)

// test cases for the '-' button ----
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

// test case for '+' button

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
//---------------------------------------------------------------------------------------------


// function that parses values from cart and updates cart total------------------------------------
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

function checkEmptyCart() {
  var cartItem = document.getElementsByClassName("cart-item");
  if (cartItem.length == 0) {
    alert(
      "Your cart is empty, let's take you to homepage to add some items!!"
    );
    location.replace("index.html");
  }
}
//-------------------------------------------------------------------------------------------------------

//function to use add to cart button on the product page-------------------------------------------------
function addtocartbutton() {
  var key = document.getElementById("name").innerHTML;
  var addItems = parseInt(document.getElementById("qty").innerHTML);
  updateCartTab(addItems);
  addToSessionStorage(key, addItems);
  document.getElementById("qty").innerHTML = 1;
  
  /* if (document.getElementById("cart-tab").innerHTML == "Shopping Cart") {
    var addItems = parseInt(document.getElementById("qty").innerHTML);
    //document.getElementById("cart-tab").innerHTML =
      //"Shopping Cart (" + addItems + ")";
    updateCartTab(addItems)
    document.getElementById("qty").innerHTML = 1;
    addToSessionStorage(key, addItems);
  } else {
    if (document.getElementById("cart-tab").innerHTML.length == 17) {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 16)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      //document.getElementById("cart-tab").innerHTML =
        //"Shopping Cart (" + (noOfItems + addItems) + ")";
     updateCartTab(noOfItems + addItems)
      document.getElementById("qty").innerHTML = 1;
      addToSessionStorage(key, noOfItems + addItems);
    } else if (document.getElementById("cart-tab").innerHTML.length == 18) {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 17)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      //document.getElementById("cart-tab").innerHTML =
        //"Shopping Cart (" + (noOfItems + addItems) + ")";
        updateCartTab(noOfItems + addItems)
      document.getElementById("qty").innerHTML = 1;
      addToSessionStorage(key, noOfItems + addItems);
    } else {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 18)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      //document.getElementById("cart-tab").innerHTML =
        //"Shopping Cart (" + (noOfItems + addItems) + ")";
        updateCartTab(noOfItems + addItems)
      document.getElementById("qty").innerHTML = 1;
      addToSessionStorage(key, noOfItems + addItems);
    }
  }*/
}
//----------------------------------------------------------------------------------------------------


// functions for '+' & '-' button on product page------------------------------------------------------
function increaseQuantity() {
  document.getElementById("qty").innerHTML =
    parseInt(document.getElementById("qty").innerHTML) + 1;
}
function decreaseQuantity() {
  if (parseInt(document.getElementById("qty").innerHTML) > 1)
    document.getElementById("qty").innerHTML =
      parseInt(document.getElementById("qty").innerHTML) - 1;
}


function addToCartAisle(name){
  var itemName = ""+name
  console.log(itemName)
  addToSessionStorage(name, 1)
  updateCartTab(1)
  
}
//-----------------------------------------------------------------------------------------------------



function moreDescription() {
  if (
    document.getElementById("more-info").children[0].innerHTML ==
    "More Description"
  ) {
    document.getElementById("dots").style.display = "none";
    document.getElementById("more").style.display = "inline";
    document.getElementById("more-info").children[0].innerHTML =
      "Less Description";
  } else {
    document.getElementById("dots").style.display = "inline";
    document.getElementById("more").style.display = "none";
    document.getElementById("more-info").children[0].innerHTML =
      "More Description";
  }
}


//function that ads products to session storage using parameters passed-----------------------------------
function addToSessionStorage(itemName, itemQuantity) {
    if (sessionStorage.getItem(itemName) != null) {
      sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem(itemName)) + parseInt(itemQuantity)));
      
    } else {
      sessionStorage.setItem(itemName, itemQuantity);
    }
    //showShowCartTab();
  }
  
  //sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem("itemName")) + parseInt(itemQuantity)));
//---------------------------------------------------------------------------------------------------------


//Function that updates amount of products in shopping cart in the sessionStorage---------------------------
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
//--------------------------------------------------------------------------------------------------------



// function to show total items on the shopping cart tab at navbar--------
function showShowCartTab() {
    //console.log(sessionStorage.getItem("itemTotal"))
  document.getElementById("cart-tab").innerHTML =
    "Shopping Cart (" + sessionStorage.getItem("itemTotal") + ")";
}
//----------------------------------