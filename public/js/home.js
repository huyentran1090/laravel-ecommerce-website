function addProduct(product) {
    console.log(product.brands.name);
    let cart = [];
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));
        console.log(cart);
    }
    const isFound = cart.some(element => {
        // input: array
        // output: true/false
        if (element.id == product.id) {
            return true;
        }
        return false;
    });
    if (isFound) {
        alert("Sản phẩm đã có trong giỏ hàng");
    } else {
        cart.push({ 'id': product.id, 'name': product.name, 'image': JSON.parse(product.image), 'brand': product.brands.name ,'price': product.price, 'quantity': 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
}