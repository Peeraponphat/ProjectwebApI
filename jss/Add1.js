var button;
var cart;
var cartTotal;
var newCartTotal;

$(document).ready(function () {
  $(".addtocart").on("click", function () {
    button = $(this);
    cart = $(".cart");
    cartTotal = cart.attr("data-totalitems");
    button.addClass("sendtocart");
    setTimeout(function () {
      button.removeClass("sendtocart");
      cart.addClass("shake").attr("data-totalitems", newCartTotal);
      setTimeout(function () {
        cart.removeClass("shake");
      }, 500);
    }, 1000);
  });
});
