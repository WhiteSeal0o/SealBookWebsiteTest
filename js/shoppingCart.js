var changeCart = false;

$("input[name='updateCart']").click(function(){
    var tmp = "";
    var list = document.getElementsByName('quantity');
    for(i = 0; i < list.length; i++){
        var temp = list[i].getAttribute('data');
        temp.indexOf("-");
        tmp += "bookid" + i + "=" + temp.substr(0, temp.indexOf("-"));
        tmp += "&quantity" + i + "=" + list[i].innerText;
        if(i != list.length - 1){
            tmp += "&";
        }
    }
    var url = "updateCart.php?" + tmp;
    window.location.replace(url);
});

$("input[name='emptyCart']").click(function(){
    if(confirm("Do you want to empty your shopping cart?")){
        window.location.replace('emptyCart.php');
    }
});

$("input[name='newOrder']").click(function(){
    window.location.replace('emptyCart.php');
});  

$("div .add").click(function(){
    changeCart = true;
    var bookid = $(this).attr('name');
    var tmp = "#quantity" + bookid;
    var temp = $(tmp).attr('data');
    var maxQuantity = temp.substr(temp.indexOf("-") + 1, temp.length);
    var lastQuantity = parseInt($(tmp).text());
    var newQuantity = lastQuantity + 1;
    if(newQuantity > maxQuantity){
        alert("It's is maximum books we have");
    }else{
        $(tmp).text(newQuantity);
        tmp = "#price" + bookid;
        var price = parseFloat($(tmp).text());
        var amount = price * newQuantity;
        tmp = "#amount" + bookid;
        $(tmp).text(amount);
        tmp = "#total";
        var lastTotal = parseFloat($(tmp).text());
        var newToatl = lastTotal + price;
        $(tmp).text(newToatl);
    }
});

$("div .minus").click(function(){
    changeCart = true;
    var bookid = $(this).attr('name');
    var tmp = "#quantity" + bookid;
    var lastQuantity = parseInt($(tmp).text());
    var newQuantity = lastQuantity - 1;
    if(newQuantity < 0){
         
    }else{
        $(tmp).text(newQuantity);
        tmp = "#price" + bookid;
        var price = parseFloat($(tmp).text());
        var amount = price * newQuantity;
        tmp = "#amount" + bookid;
        $(tmp).text(amount);
        tmp = "#total";
        var lastTotal = parseFloat($(tmp).text());
        var newToatl = lastTotal - price;
        $(tmp).text(newToatl);
    }
});

$(document).ready(function(){
    $("div[name='customerInfo']").hide();
    changeCart = false;
});

$("input[name='placeOrder']").click(function(){
    if(changeCart == true){
        alert("Maybe something was changed. Please update your order");
    }else{
        $("div[name='customerInfo']").show();
        $("input[name='name']").focus();  
    }
});

$("input[name='sentOrder']").click(function(){
    if(confirm("Please make sure all your information is correct")){
        $(this).submit();
    }
});

$("a[name='remove']").click(function(){
    changeCart = true;
    var bookid = $(this).attr('data');
    var tmp = "#quantity" + bookid;
    var qty = parseInt($(tmp).text());
    $(tmp).text("0");
    tmp = "#amount" + bookid;
    $(tmp).text("0");
    tmp = "#price" + bookid;
    var price = parseFloat($(tmp).text());
    tmp = "#total";
    var lastTotal = parseFloat($(tmp).text());
    var newToatl = lastTotal - price * qty;
    $(tmp).text(newToatl);    
});

$("img.logo").click(function () {
    console.log($(this).attr('data'));
    $("#"+$(this).attr('data')).addClass("popup");
});

$(".product-detail").click(function () {
    $(this).removeClass("popup");
});

$(".product-detail .btn").hover(function () {
    $(this).toggleClass("reverse");
});

$(".product-detail .content .btn").click(function () {
    var bookid = $(this).attr('data').substring(3, $(this).attr('data').length);
    var quantity = prompt("How much do you want: ", "1");
    if(isNaN(quantity) || quantity == 0 || quantity == null){
      alert("You input a wrong number")
    }
    else{
      url = "addCart.php?bookid=" + bookid + "&quantity=" + quantity;
      window.open(url, "_self");
    }
    $(this).removeClass("popup");
  });
  