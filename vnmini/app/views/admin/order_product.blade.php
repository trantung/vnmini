<script type="text/javascript">
    function deleteOrderProduct() {
        var id = $('.order_product').data("id");
        $.ajax(
            {
                url: '/admin/order_product/delete/' + id,
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id
                },
                success: function ()
                {
                    console.log("it Work");
                }
        	}
        );
        window.location.reload();
    }
</script>