var products = [
	{
	    name: "Apple",
	    price: 3.99,
	    img: 'images/apples.jpg'
	},
	{
		name:'banana',
		price:0.99,
		img:"images/bananas.jpg",
	},
	{
		name:'grapes',
		price:2.99,
		img:"images/Grapes.jpg",
	},
	{
		name:'carrots',
		price:1.99,
		img:"images/carrots.jpg",
	},
	{
		name:'potato',
		price:4.99,
		img:"images/potato.jpg",
	},
	{
		name:'onion',
		price:1.99,
		img:"images/onion.jpg",
	},
    ];

  updateCartTab(0);
var removeQuantityButton = document.getElementById("substact");
var addQuantityButton = document.getElementById("addProduct");
var itemQuantity = document.getElementById("qty");





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
  	if (sessionStorage.getItem(itemName) != null) {
      sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem(itemName)) + parseInt(itemQuantity)));
      
    } else {
      sessionStorage.setItem(itemName, itemQuantity);
    }
}

function SaveProduct(key){
    var name = key;
    var addItems = 1;
  	updateCartTab(addItems);
  	addToSessionStorage(key, addItems);

}
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