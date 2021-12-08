$( document ).ready(function() {
    refreshCart();

    //Delegated event listener for each list item button
    $("#cart").on("click", "a",  function() {
        //Select taskId embedded in parent list item ID
        let prodID = $(this).attr('id');
        $.post("includes/cart.php",
        {
            "product-id" : prodID,
            "delete" : true,
            "num-products": 1,
        },
        //Refresh cart on success
        function() {
            refreshCart();
        });
    });

    //Refresh cart contents in browser
    function refreshCart() {
        $.get("includes/cart.php", function(data) {
            $("#cart").html(data);
        });

    }
});