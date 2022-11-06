<!-- Modal ADD -->
<div class="modal fade" id="CategoryAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-category-form"  method="POST" enctype="multipart/form-data" >
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"> Hãy điền loại mặc hàng bạn muốn thêm </label>
                        <input name="namecategory"  id="name" type="text" class="form-control"aria-describedby="nameHelp" placeholder="Tên Category">
                        <div class="namecategory errorValidate"></div>
                    </div>
                    {{-- upload multi image --}}
                    <div class="mb-3">
                        <label class="form-label"> Ảnh </label>
                        <input type="file" name="filename[]" id="filename" class="form-control" multiple>
                    </div>
                    <div class = "preview">

                    </div>
                   
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="add" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>