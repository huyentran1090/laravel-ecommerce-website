   // JS EDIT MODAL
$(document).ready(function () {
    var id;
    var old_images;

    $('.edit').on('click', function () {
        id = $(this).attr('data-id');
        $('#ProductEditModal').modal('show');
        var tr = $(this).closest('tr');
        var data = tr.children("td").map(function () {
            return $(this).text();
        }).get();
        
        $('#name1').val(data[1]);
        $('#preview-edit').empty();
        old_images = $(this).data('edit-images');
        console.log(old_images);
        old_images.forEach(element => {
            var $newDiv = $("<div/>")   // creates a div element
                    .addClass("col-lg-4 col-md-4 col-xs-6 p-2")   // add a class
                    .html("<img id='test' src='http://127.0.0.1:8080/storage/images/" + element + "'>");
            $("#preview-edit").append($newDiv);
        });
        $(function() {
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    $('#preview-edit').empty();
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img class=\"img-responsive\">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#filename1').on('change', function() {
                previewImages(this, 'div#preview-edit');
            });
        });
    });

    $('#edit-category-form').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData($('form#edit-category-form')[0])
        formData.append("old_images", old_images);
        $.ajax({
            type: "POST",
            url: "/admin/categories/" + id,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
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

// JS ADD MODAL
$(document).ready(function() {
    $(function() {
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                $('.preview').empty();
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img class=\"img-responsive\">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#filename').on('change', function() {
            previewImages(this, 'div.preview');
        });
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
                            $('.' + index).addClass('alert alert-danger').text(value);
                        });
                    }
                },
            });
        });
    });
});

$(document).on("click", ".open-modal-gallary-image", function () {
    $('#gallery').empty();
    let images = $(this).data('images');
    images.forEach(element => {
        var $newDiv = $("<div/>")   // creates a div element
                 .addClass("col-lg-4 col-md-4 col-xs-6 p-2")   // add a class
                 .html("<img id='test' src='http://127.0.0.1:8080/storage/images/" + element + "'>");
        $("#gallery").append($newDiv);

        // var img = $('<img id="test">'); //Equivalent: $(document.createElement('img'))
        // img.attr('src', "http://127.0.0.1:8000/storage/images/" + element);
        // img.appendTo('#gallery');
    });
});
