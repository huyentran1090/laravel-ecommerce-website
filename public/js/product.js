
        // JS EDIT MODAL
        $(document).ready(function () {

            $('.edit').on('click', function () {
        
                var id = $(this).attr('data-id');
                console.log(id);
        
                $('#ProductEditModal').modal('show');
                var image_src = ($('.image-table').attr('src'));
                var tr = $(this).closest('tr');
                var data = tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#name1').val(data[1]);
                $('#url').attr("src", image_src);;
                $('#price1').val(data[3]);
                $('#id_cate1').val(data[4]);
                $('#id_brand1').val(data[5]);
        
                $('#edit-product-form').on('submit', function (event) {
                    event.preventDefault();
                    var formData = new FormData($('form#edit-product-form')[0])
                    $.ajax({
                        type: "PUT",
                        url: "/admin/products/" + id,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.code == 200) {

                                $('#ProductEditModal').modal('hide');
                                alert("Updated");
                                window.location.reload();
                            }
                            else {
        
                                $.each(response.validator, function (index, value) {
                                    console.log(value, index);
                                    $('.' + index).addClass('alert alert-danger').text(value);
                                });
                            }
                        },
                    });
                });
            });
        });
        
// JS ADD MODAL
$(document).ready(function() {
    $('.add').on('click', function () {
        $('#add-product-form').on('submit',function(event) {
            event.preventDefault();
            var formData = new FormData($('form#add-product-form')[0])
            // var data = {
              
            //     // files: $('#file2')[0].files[0],
            //     // nameProduct: $('#name').val(),
            // }
            
            

            $.ajax({
                type: "POST",
                url: "/admin/products/",
                data:formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code == 200) {
                        $('#ProductAddModal').modal('hide');
                        alert("Created");
                        window.location.reload();
                    }
                    else {

                        $.each(response.validator, function (index, value) {
                            console.log(value, index);
                            $('.' + index).addClass('alert alert-danger').text(value);
                        });
                    }
                },
            });
        });
    });
});
        