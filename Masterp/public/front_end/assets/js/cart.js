// let minus = document.getElementsByClassName("minus")[0];

// let plus = document.getElementsByClassName("plus")[0];
// let number = document.getElementsByClassName("number")[0];
// let product_price = document.getElementById("product_price");
// let allprice = document.getElementById("allprice");
// let wlyad7d7 = document.getElementById("wlyad7d7");
// console.log("hi");
// // document.write(product_price.innerHTML);
// plus.addEventListener("click", function (params) {
//   number.innerHTML = +number.innerHTML + 1;
//  allprice.innerHTML = +allprice.innerHTML + +product_price.innerHTML;

// });
// minus.addEventListener("click", function (params) {
//   if (+number.innerHTML > 0) {
//     number.innerHTML = +number.innerHTML - 1;
//  allprice.innerHTML = +allprice.innerHTML - +product_price.innerHTML;
    
//   }
// });
//  price = product_price.innerHTML;


let minusButtons = document.getElementsByClassName("minus");
let plusButtons = document.getElementsByClassName("plus");
let numberElements = document.getElementsByClassName("number");
let productPriceElements = document.getElementsByClassName("product-price");
let allpriceElements = document.getElementsByClassName("allprice");
let wlyad7d7Elements = document.querySelectorAll("[id^='wlyad7d7']");

for (let i = 0; i < minusButtons.length; i++) {
  minusButtons[i].addEventListener("click", function () {
    if (+numberElements[i].innerHTML > 0) {
      numberElements[i].innerHTML = +numberElements[i].innerHTML - 1;
      allpriceElements[i].innerHTML =
        +allpriceElements[i].innerHTML -
        +productPriceElements[i].getAttribute("data-price");
    }
  });

  plusButtons[i].addEventListener("click", function () {
    numberElements[i].innerHTML = +numberElements[i].innerHTML + 1;
    allpriceElements[i].innerHTML =
      +allpriceElements[i].innerHTML +
      +productPriceElements[i].getAttribute("data-price");
  });
}


// console.log(wlyad7d7.value);




// $(document).ready(function() {
//     // Increase quantity
//     $(document).on("click", ".plus", function() {
//         var quantityElement = $(this).siblings(".number");
//         var productId = $(this).data("product-id");
//         var currentQuantity = parseInt(quantityElement.text());
//         var newQuantity = currentQuantity + 1;

//         updateQuantity(productId, newQuantity, quantityElement);
//     });

//     // Decrease quantity
//     $(document).on("click", ".minus", function() {
//         var quantityElement = $(this).siblings(".number");
//         var productId = $(this).data("product-id");
//         var currentQuantity = parseInt(quantityElement.text());
//         if (currentQuantity > 1) {
//             var newQuantity = currentQuantity - 1;

//             updateQuantity(productId, newQuantity, quantityElement);
//         }
//     });

//     function updateQuantity(productId, newQuantity, quantityElement) {
//         $.ajax({
//             url: "update_quantity.php",
//             method: "POST",
//             data: { product_id: productId, quantity: newQuantity },
//             success: function(response) {
//                 if (response === "success") {
//                     quantityElement.text(newQuantity);
//                     updateTotalPrice();
//                 }
//             }
//         });
//     }

//     function updateTotalPrice() {
//         var totalPrice = 0;
//         $(".product-price").each(function() {
//             totalPrice += parseFloat($(this).text().replace("$", ""));
//         });
//         $("#total-price").text("$" + totalPrice.toFixed(2));
//     }
// });

