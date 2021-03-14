var removeQuantityButton = document.getElementsByClassName(
  "button-cart-remove"
);
var addQuantityButton = document.getElementsByClassName("button-cart-add");
var itemQuantity = document.getElementsByClassName("item-quantity");

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
          checkEmptyCart();
        }
      } else {
        buttonClicked.children[1].innerHTML -= 1;
        updateCartTotal();
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

//var addtocartbutton = document.getElementById('add-to-cart')
//addtocartbutton.addEventListener("click", function (event) {
//var buttonClicked = event.target
function addtocartbutton() {
  if (document.getElementById("cart-tab").innerHTML == "Shopping Cart") {
    var addItems = parseInt(document.getElementById("qty").innerHTML);
    document.getElementById("cart-tab").innerHTML =
      "Shopping Cart (" + addItems + ")";
    document.getElementById("qty").innerHTML = 1;
  } else {
    if (document.getElementById("cart-tab").innerHTML.length == 17) {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 16)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + (noOfItems + addItems) + ")";
      document.getElementById("qty").innerHTML = 1;
    } else if (document.getElementById("cart-tab").innerHTML.length == 18) {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 17)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + (noOfItems + addItems) + ")";
      document.getElementById("qty").innerHTML = 1;
    } else {
      var noOfItems = parseInt(
        document.getElementById("cart-tab").innerHTML.substring(15, 18)
      );
      var addItems = parseInt(document.getElementById("qty").innerHTML);
      document.getElementById("cart-tab").innerHTML =
        "Shopping Cart (" + (noOfItems + addItems) + ")";
      document.getElementById("qty").innerHTML = 1;
    }
  }
}

function increaseQuantity() {
  document.getElementById("qty").innerHTML =
    parseInt(document.getElementById("qty").innerHTML) + 1;
}
function decreaseQuantity() {
  document.getElementById("qty").innerHTML =
    parseInt(document.getElementById("qty").innerHTML) - 1;
}

console.log(document.getElementById("cart-tab").innerHTML.length);
//})
