// // open add modal
// $('#edit-brand-modal').on('show.bs.modal', function (event) {
//     var url = "";
//     let brandId = $(event.relatedTarget).data('id');
//     let brandName = $(event.relatedTarget).data('namebrand');
//     $("input[name=namebrands]").val(brandName);

//     $(formEdit).on('submit', function(event){
//         event.preventDefault();
//         // $('.errorValidate').removeClass("alert alert-danger").text('');
//         var url = $(this).attr('data-action');
//         url = url + "/" + brandId;
//         // console.log("da di vao day", url);


//         $.ajax({
//             url: url,
//             method: 'PUT',
//             data: new FormData(this),
//             dataType: 'JSON',
//             contentType: false,
//             cache: false,
//             processData: false,
//             success:function(response)
//             {
//                 if (response.code == 200) {
//                     // $('.notification')
//                     // .addClass('bg-primary text-white').text(response.status);
//                     $(modal).modal('hide');
//                 }
//                 else {
                    
//                     $.each(response.validator, function( index, value ) {
//                         console.log(value, index);
//                         // $('.namebrands').addClass('alert alert-danger').text(value);
//                         $('.' + index).addClass('alert alert-danger').text(value);
//                     });
//                 }
//             },
//             error: function(response) {

//             }
//         });
//     });
// })

// $(document).ready(function(){
//     var table = '#brand-table';
//     var modal = '#add-brand-modal';
//     var form = '#add-brand-form';
//     $('#add-brand-form').on('submit', function(event){
//         event.preventDefault();
//         $('.errorValidate').removeClass("alert alert-danger").text('');
//         var url = $(this).attr('data-action');

//         $.ajax({
//             url: url,
//             method: 'POST',
//             data: new FormData(this),
//             dataType: 'JSON',
//             contentType: false,
//             cache: false,
//             processData: false,
//             success:function(response)
//             {   
//                 if (response.code == 200) {
//                     // $('.notification')
//                     // .addClass('bg-primary text-white').text(response.status);
//                     $(modal).modal('hide');
//                 }
//                 else {
                    
//                     $.each(response.validator, function( index, value ) {
//                         console.log(value, index);
//                         // $('.namebrands').addClass('alert alert-danger').text(value);
//                         $('.' + index).addClass('alert alert-danger').text(value);
//                     });
//                 }
//             },
//             error: function(response) {

//             }
//         });
//     });

    
    

// });


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
            $.ajax({
                type: "POST",
                url: "/admin/brands/",
                data: $('#add-brands-form').serialize(),
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
