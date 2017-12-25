$("input[type='reset']").click(function(){
    $( "#searchPriceRange" ).slider('values', 0, 0.01);
    $( "#searchPriceRange" ).slider('values', 1, 1000.00);
    $( "#searchLowPrice" ).val("0.01");
    $( "#searchMaxPrice" ).val("1000.00");
});