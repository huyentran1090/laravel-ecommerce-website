$(document).ready(function () {
    $('.showCart').on('click', function (e) {
        showProductGallery()
    });
});
function showProductGallery() {
    var cart = localStorage.getItem('cart');
    console.log(cart);
    var cartBody = "";
    var divEl = $(".cart-body").parent();
    if(cart.length > 0) {
        for (var i in cart) {
            cartBody += '<tr>' +
                        '<td>' +
                            '<label class=\"checkbox-wrap checkbox-primary\">' +
                                '<input type="checkbox" checked="">' +
                                '<span class=\"checkmark\"></span>' +
                            '</label>'+
                        '</td>'+
                        '<td data-th="Product">'+
                            '<div class=\"row\">'+
                                '<div class=\"col-md-3 text-left\">'+
                                    '<img src="http://127.0.0.1:8080/storage/images/'+cart.image+'" class=\"img-fluid d-none d-md-block rounded mb-2 shadow\">'+
                                '</div>'+
                                '<div class=\"col-md-9 text-left mt-sm-2\">'+
                                    '<h4>'+cart.name+'</h4>'+
                                '</div>'+
                            '</div>'+
                        '</td>'+
                        '<td data-th="Price">'+cart.price+'</td>'+
                        '<td data-th="Quantity">'+
                            '<input type="number" class=\"form-control form-control-lg text-center\" value="1">'+
                        '</td>'+
                        '<td class=\"actions\" data-th="">'+
                            '<div class=\"text-right\">'+
                                '<button class=\"btn btn-white border-secondary bg-white btn-md mb-2\">'+
                                    '<i class=\"fa fa-trash\"></i>'+
                                '</button>'+
                            '</div>'+
                        '</td>'+
                    '</tr>';
        };
        $(divEl).removeClass('hidden');
    } else {
        $(divEl).addClass('hidden');
    };
    $('.cart-body').html(cartBody);
};


// function checkCart(){
//     if (cart.length > 0) {
//         $('.cart-body').hide();
//     } else {
//         $('.cart-body').show();
//     }
// }