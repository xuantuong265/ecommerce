$(document).ready(function () {
    $(".updateCart").click(function (e) { 
        e.preventDefault();
        var rowId = $(this).attr('id');
        var qty   = $(this).parent().parent().find(".qty").val();
        var token = $("input[name='_token']").val();
        
        // ajax
        $.ajax({
            type: "GET",
            url: '/update-cart/'+rowId+'/' +qty,
            cache:false,
            data: {"_token":token, "id": rowId, "qty": qty},
            success: function (data) {
                if(data == "ok"){
                    // window.location = "/list-cart";
                    alert('hihi');
                }
            }
        });
    });
});