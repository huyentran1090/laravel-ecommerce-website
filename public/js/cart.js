$(document).ready(function () {
    // t đổi tên hàm showProductGallery -> initCart vì đoạn ni vừa vào page hàm ni sẽ chạy tự động đầu tiên để lấy dữ liệu
    initCart();
});
function initCart() {
    // ở bên home.js m dùng hàm JSON.stringify(cart) để convert array -> string
    // đoạn ni phải get cart và convert string -> array m mới lặp được chơ
    var cart = JSON.parse(localStorage.getItem('cart'));
    //thử mở comment ni ra và chạy xem sự khác biệt
    // var cart = localStorage.getItem('cart');
    console.log(cart);
    var cartBody = "";
    var divEl = $(".cart-body").parent();
    if(cart.length > 0) {
        cart.forEach(element => {
            console.log(element)
            // Viết code lặp sản phẩm ra ở đây nha
        });

        // for (var i in cart) {
        //     console.log(cart);
        //     cartBody += '<tr>' +
        //                 '<td>' +
        //                     '<label class=\"checkbox-wrap checkbox-primary\">' +
        //                         '<input type="checkbox" checked="">' +
        //                         '<span class=\"checkmark\"></span>' +
        //                     '</label>'+
        //                 '</td>'+
        //                 '<td data-th="Product">'+
        //                     '<div class=\"row\">'+
        //                         '<div class=\"col-md-3 text-left\">'+
        //                             '<img src="http://127.0.0.1:8080/storage/images/'+cart[i].image+'" class=\"img-fluid d-none d-md-block rounded mb-2 shadow\">'+
        //                         '</div>'+
        //                         '<div class=\"col-md-9 text-left mt-sm-2\">'+
        //                             '<h4>'+cart[i].name+'</h4>'+
        //                         '</div>'+
        //                     '</div>'+
        //                 '</td>'+
        //                 '<td data-th="Price">'+cart[i].price+'</td>'+
        //                 '<td data-th="Quantity">'+
        //                     '<input type="number" class=\"form-control form-control-lg text-center\" value="1">'+
        //                 '</td>'+
        //                 '<td class=\"actions\" data-th="">'+
        //                     '<div class=\"text-right\">'+
        //                         '<button class=\"btn btn-white border-secondary bg-white btn-md mb-2\">'+
        //                             '<i class=\"fa fa-trash\"></i>'+
        //                         '</button>'+
        //                     '</div>'+
        //                 '</td>'+
        //             '</tr>';
        // };
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