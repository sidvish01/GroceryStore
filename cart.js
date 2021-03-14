
var removeQuantityButton = document.getElementsByClassName('button-cart-remove')
var addQuantityButton = document.getElementsByClassName('button-cart-add')
var itemQuantity = document.getElementsByClassName('item-quantity')

//console.log(document.getElementsByClassName("item-quantity")[0].innerHTML)
for (var i = 0; i < removeQuantityButton.length; i++) {
    var button = removeQuantityButton[i]
    if (itemQuantity[i].innerHTML == 1) {
        button.addEventListener('click', function (event) {
            var buttonClicked = event.target
            buttonClicked.parentNode.parentNode.remove()
            updateCartTotal()
        })
    }
    else {
        button.addEventListener('click', function (event) {
            var buttonClicked = (event.target).parentNode
            if (buttonClicked.children[1].innerHTML == 1) {
                buttonClicked.parentNode.remove()
                updateCartTotal()
            }
            else {
                buttonClicked.children[1].innerHTML -= 1
                updateCartTotal()
            }
        })
    }

}

for (var i = 0; i < addQuantityButton.length; i++) {
    var button = addQuantityButton[i]
    button.addEventListener('click', function (event) {
        var buttonClicked = (event.target).parentNode
        buttonClicked.children[1].innerHTML = parseInt(buttonClicked.children[1].innerHTML) + 1
        updateCartTotal()
    })
}


function updateCartTotal() {
    var cartItem = document.getElementsByClassName('cart-item')
    var total = 0
    for (var i = 0; i < cartItem.length; i++) {
        var price = parseFloat(cartItem[i].getElementsByClassName('item-price')[0].innerText.replace('$', ''))
        var quantity = parseInt(cartItem[i].getElementsByClassName('item-quantity')[0].innerText)
        total = total + (price * quantity)
        //console.log(price, quantity)
    }
    document.getElementsByClassName('subtotal')[0].innerText = total.toFixed(2)
    document.getElementsByClassName('qst')[0].innerText = (.09975 * total).toFixed(2)
    document.getElementsByClassName('gst')[0].innerText = (0.05 * total).toFixed(2)
    document.getElementsByClassName('total')[0].innerText = (parseFloat(document.getElementsByClassName('subtotal')[0].innerText) +
        parseFloat(document.getElementsByClassName('qst')[0].innerText) + parseFloat(document.getElementsByClassName('gst')[0].innerText)).toFixed(2)

}
console.log(document.getElementsByClassName('subtotal')[0].innerText)

