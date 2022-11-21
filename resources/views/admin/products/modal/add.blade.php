<div class="modal fade" id="ProductAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-product-form"  method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"> Hãy điền loại sản phẩm bạn muốn thêm </label>
                        <input name="nameproducts"  id="name" type="text" class="form-control"aria-describedby="nameHelp" placeholder="Tên sản phẩm">
                        <div class="nameproducts errorValidate"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Vui lòng chọn ảnh</label>
                        <input name="product-image[]" type="file"  class="form-control" id="product-image" multiple>
                        <div class="image errorValidate"></div>
                    </div>
                    <div id="preview" class="preview d-flex flex-wrap justify-content-start px-auto">
                    </div>
                    <div class="form-group">
                        <label > Giá sản phẩm</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="0đ">
                    </div>
                    <div class="form-group">
                        <label > Loại hàng</label>
                        <select  name="id_cate" class="form-control" >
                          @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label > Thương hiệu</label>
                        <select  name="id_brand" class="form-control" >
                          @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endforeach
                        </select>
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