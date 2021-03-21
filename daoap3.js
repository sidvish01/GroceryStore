function SaveProduct(id){

    var name = id;
    var num = parseInt(document.getElementById("quan").innerHTML)

    sessionStorage.setItem( name,num);

}
function more_description(){
    var tripd= document.getElementById("tripd");
    var moredesc= document.getElementById("moredesc");
    var btn= document.getElementById("btn");
    if(tripd.style.display ==="none"){
        tripd.style.display = "inline";
        moredesc.style.display = "none";
        btn.style.innerHTML = " more description";
    }
    else{
        tripd.style.display = "none";
        moredesc.style.display = "inline";
        btn.style.innerHTML = " less description";

    }
}
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