

// JS EDIT MODAL
$(document).ready(function () {

    $('.edit').on('click', function () {

        var id = $(this).attr('data-id');
        console.log(id);

        $('#BrandEditModal').modal('show');
        var tr = $(this).closest('tr');
        var data = tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#name1').val(data[1]);

        $('#edit-brand-form').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                type: "PUT",
                url: "/admin/brands/" + id,
                data: $('#edit-brand-form').serialize(),
                success: function (response) {
                    if (response.code == 200) {
                        $('#BrandEditModal').modal('hide');
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
        $('#add-brands-form').on('submit',function(event) {
            event.preventDefault();
            var formData = new FormData($('form#add-brands-form')[0])

            $.ajax({
                type: "POST",
                url: "/admin/brands/",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code == 200) {
                        $('#BrandAddModal').modal('hide');
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
