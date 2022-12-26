<div class="modal fade" id="BrandAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm thương hiệu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-brands-form" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal body -->
                <div class="modal-body overflow-auto" style="height:200px">
                    <div class="mb-3">
                        <label class="form-label"> Thương hiệu mà bạn muốn thêm </label>
                        <input name="namebrands" id="name" type="text"
                            class="form-control"aria-describedby="nameHelp" placeholder="Tên thương hiệu">
                        <div class="namebrands errorValidate"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Ảnh </label>
                        <input type="file" name="filename[]" id="filename" class="form-control" multiple>
                        <div class="filename errorValidate"></div>
                    </div>
                    <div id="preview" class="preview d-flex flex-wrap justify-content-start px-auto">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-danger cancel" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
