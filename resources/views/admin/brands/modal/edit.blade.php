<div class="modal fade" id="BrandEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit-brand-form" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                @method('PUT')
                <!-- Modal body -->
                <div class="modal-body overflow-auto" style="height:300px">
                    <div class="mb-3">
                        <label class="form-label"> Tên thương hiệu muốn sửa </label>
                        <input name="namebrands" id="name1" type="text"
                            class="form-control"aria-describedby="nameHelp" placeholder="Tên Thương hiệu">
                        <div class="namebrands errorValidate"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Ảnh </label>
                        <input type="file" name="filename1[]" id="filename1" class="form-control" multiple>
                        <div class="filename1 errorValidate"></div>
                    </div>
                    <div id="preview-edit" class="d-flex flex-wrap justify-content-start px-auto">
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
