function SaveProduct(id){

  var name = id;

  //sessionStorage.setItem( name,1);
  if (sessionStorage.getItem(name) != null) {
      sessionStorage.setItem(name, (parseInt(sessionStorage.getItem(name)) + parseInt(1)));
      
    } else {
      sessionStorage.setItem(name, 1);
    }

}