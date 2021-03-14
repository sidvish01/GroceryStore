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
];

//var cartRow = document.createElement('tr')

var cart = document.getElementsByClassName("try")[0];
var cartRow = document.createElement('div')
var cartRowContent = `
<table class="cart">
<tr class="cart-fields">
    <th>Item</th>
    <th>Quantity</th>
    <th>Price</th>
</tr>
<tr class="cart-item">
    <td class="item-name"><img src="${products[0].img}" alt="Mayonnaise Container" width="150"
            height="150"><br>Hellman's
        Mayonnaise
    </td>
    <td>
        <button class="button-cart-remove" type="button">-</button> <span class="item-quantity">${sessionStorage.getItem(products[0].name)}</span>
        <button class="button-cart-add" type="button">+</button>
    </td>
    <td class="item-price">${products[0].price}</td>
</tr></table>`;
cartRow.innerHTML = cartRowContent
cart.prepend(cartRow)


var removeQuantityButton = document.getElementsByClassName(
  "button-cart-remove"
);
var addQuantityButton = document.getElementsByClassName("button-cart-add");
var itemQuantity = document.getElementsByClassName("item-quantity");
updateCartTotal()

//console.log(document.getElementsByClassName("item-quantity")[0].innerHTML)
for (var i = 0; i < removeQuantityButton.length; i++) {
  var button = removeQuantityButton[i];
  if (itemQuantity[i].innerHTML == 1) {
    console.log(itemQuantity[i].innerHTML);
    button.addEventListener("click", function (event) {
      var removePrompt = confirm("Do you want to remove this item from cart?");
      if (removePrompt == true) {
        var buttonClicked = event.target;
        buttonClicked.parentNode.parentNode.remove();
        updateCartTotal();
        sessionStorage.setItem("Hellman's Mayonnaise", 0);
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
          buttonClicked.parentNode.remove();
          updateCartTotal();
          sessionStorage.setItem("Hellman's Mayonnaise", 0);
          checkEmptyCart();
        }
      } else {
        buttonClicked.children[1].innerHTML -= 1;
        updateCartTotal();
        sessionStorage.setItem("Hellman's Mayonnaise", buttonClicked.children[1].innerHTML);
        checkEmptyCart();
      }
    });
  }
}

for (var i = 0; i < addQuantityButton.length; i++) {
  var button = addQuantityButton[i];
  button.addEventListener("click", function (event) {
    var buttonClicked = event.target.parentNode;
    buttonClicked.children[1].innerHTML =
      parseInt(buttonClicked.children[1].innerHTML) + 1;
    updateCartTotal();
    sessionStorage.setItem("Hellman's Mayonnaise", buttonClicked.children[1].innerHTML);
    checkEmptyCart();
  });
}

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
      "Your cart is empty, let's take you to homepage and add some items!!"
    );
    location.replace("index.html");
  }
}

function addtocartbutton() {
  var key = document.getElementById("name").innerHTML;
  if (document.getElementById("cart-tab").innerHTML == "Shopping Cart") {
    var addItems = parseInt(document.getElementById("qty").innerHTML);
    document.getElementById("cart-tab").innerHTML =
      "Shopping Cart (" + addItems + ")";
    document.getElementById("qty").innerHTML = 1;
    addToSessionStorage(key, addItems);
  } else {
    if (document.getElementById("cart-tab").innerHTML.length == 17) {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 16)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + (noOfItems + addItems) + ")";
      document.getElementById("qty").innerHTML = 1;
      addToSessionStorage(key, noOfItems + addItems);
      console.log(sessionStorage);
    } else if (document.getElementById("cart-tab").innerHTML.length == 18) {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 17)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + (noOfItems + addItems) + ")";
      document.getElementById("qty").innerHTML = 1;
      addToSessionStorage(key, noOfItems + addItems);
      console.log(sessionStorage);
    } else {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 18)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + (noOfItems + addItems) + ")";
      document.getElementById("qty").innerHTML = 1;
      addToSessionStorage(key, noOfItems + addItems);
      console.log(sessionStorage);
    }
  }
}

function increaseQuantity() {
  document.getElementById("qty").innerHTML =
    parseInt(document.getElementById("qty").innerHTML) + 1;
}
function decreaseQuantity() {
  if (parseInt(document.getElementById("qty").innerHTML) > 1)
    document.getElementById("qty").innerHTML =
      parseInt(document.getElementById("qty").innerHTML) - 1;
}

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

function addToSessionStorage(itemName, itemQuantity) {
  sessionStorage.setItem(itemName, itemQuantity);
}

//})

for (var i = 0; i<sessionStorage.length-1; i++){
    var slimContent = slimContent+`<tr class="cart-item">
    <td class="item-name"><img src="${products[i].img}" alt="Mayonnaise Container" width="150"
            height="150"><br>Hellman's
        Mayonnaise
    </td>
    <td>
        <button class="button-cart-remove" type="button">-</button> <span class="item-quantity">${sessionStorage.getItem(products[i].name)}</span>
        <button class="button-cart-add" type="button">+</button>
    </td>
    <td class="item-price">${products[i].price}</td>
</tr>`
}
console.log(slimContent)