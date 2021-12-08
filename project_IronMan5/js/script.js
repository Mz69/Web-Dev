function slideImg(index, dir) {
    var imgs = document.getElementsByClassName("small-img");
    var img_num = imgs.length;

    imgs[index].style.display = "none";
    index = Number(index) + Number(dir);
    
    if (index >= img_num) {
        index = 0;
    } else if (index < 0) {
        index = Number(img_num) - 1;
    }

    imgs[index].style.display = "block";

    document.getElementById("left").value = index;
    document.getElementById("right").value = index;
}

function numChange(x) {
    num_input = document.getElementById("num-purchase");
    num_input.value = Number(num_input.value) + Number(x);
    if (num_input.value < 1) {
        num_input.value = 1;
    }
}

//Adds a given amount of a certain product to the current user's cart
function postNumPurchase(element, prodID) {
    var num = Number(document.getElementById("num-purchase").value);

    $.post("includes/cart.php",
    {
        "product-id" : Number(prodID),
        "num-products": num,
    }).done(function(data) {
        console.log("Added to cart");
    });
    element.innerHTML = "Items added to cart!";
    document.getElementById("num-purchase").value = 0;
}