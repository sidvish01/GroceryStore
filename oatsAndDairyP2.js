function SaveProduct(name){
    var itemName = ""+name
    console.log(itemName)
    addToSessionStorage(name, 1)
}

function addToSessionStorage(itemName, itemQuantity) {
    if (sessionStorage.getItem(itemName) != null) {
      sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem(itemName)) + parseInt(itemQuantity)));
      
    } else {
      sessionStorage.setItem(itemName, itemQuantity);
    }
    //showShowCartTab();
  }