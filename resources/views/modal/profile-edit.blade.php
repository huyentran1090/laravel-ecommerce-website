<div class="modal fade" id="ProfileEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa thông tin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit-profile-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label"> Full Name </label>
                            <input name="fullname" id="fullname" type="text"
                                class="form-control"aria-describedby="nameHelp" placeholder="">
                            <div class="fullname errorValidate"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Image </label>
                            <input type="file" name="profile-image" id="profile-image" class="form-control">
                        </div>
                        <div id="preview-profile-edit" class="d-flex flex-wrap justify-content-start px-auto">
                        </div>
                        <div class="form-group">
                            <div class="datepicker date input-group">
                                <input type="text" placeholder="Choose Date" class="form-control" id="fecha1">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="0"
                                    id="Gender0">
                                <label class="form-check-label" for="Gender0">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="1"
                                    id="Gender1" checked>
                                <label class="form-check-label" for="Gender1">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label"> Phone </label>
                            <input name="phone" id="phone" type="number"
                                class="form-control"aria-describedby="nameHelp" placeholder="">
                            <div class="phone errorValidate"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label"> Address </label>
                            <input name="address" id="address" type="text"
                                class="form-control"aria-describedby="nameHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-label"> Social Network </label>
                            <input name="social" id="social" type="text"
                                class="form-control"aria-describedby="nameHelp" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });
</script> --}}
