
$(document).ready(function () {
    $('.datepicker').datepicker({
        language: "es",
        autoclose: true,
        format: "dd/mm/yyyy"
    });

    $('.edit').on('click', function () {
        id = $(this).attr('data-id');
        console.log(id);
    });
    $('#edit-profile-form').on('submit', function (event) {
        console.log("abc");
        event.preventDefault();
        var formData = new FormData($('form#edit-profile-form')[0])
        $.ajax({
            type: "POST",
            url: "/profile/" + id,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.code == 200) {

                    $('#ProfileEditModal').modal('hide');
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