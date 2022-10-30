
        // JS EDIT MODAL
$(document).ready(function () {

    $('.edit').on('click', function () {

        var id = $(this).attr('data-id');
        console.log(id);

        $('#CategoryEditModal').modal('show');
        var tr = $(this).closest('tr');
        var data = tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#name1').val(data[1]);

        $('#edit-category-form').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                type: "PUT",
                url: "/admin/categories/" + id,
                data: $('#edit-category-form').serialize(),
                success: function (response) {
                    if (response.code == 200) {
                        $('#CategoryEditModal').modal('hide');
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

        if (input.files) {
            var filesAmount = input.files.length;
            $('.preview').empty();
            
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
    
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                
                    reader.readAsDataURL(input.files[i]);
                
            };
        };
    


    $('#filename').on('change', function() {
        console.log(132);
        previewImage(this, 'div.preview');
    });
    $('.add').on('click', function () {
        $('#add-category-form').on('submit',function(event) {
            event.preventDefault();

            var formData = new FormData($('form#add-category-form')[0])

            $.ajax({
                type: "POST",
                url: "/admin/categories/",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code == 200) {
                        $('#CategoryAddModal').modal('hide');
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
