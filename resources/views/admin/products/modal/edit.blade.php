<div class="modal fade" id="ProductEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit-product-form"  method="POST" enctype="multipart/form-data" >
                @csrf
                {{-- @method('PUT') --}}
                @method('PUT') 
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label"> Hãy điền loại sản phẩm bạn muốn thêm </label>
                            <input name="nameproducts"  id="name1" type="text" class="form-control"aria-describedby="nameHelp" placeholder="Tên sản phẩm">
                            <div class="nameproducts errorValidate"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Ảnh </label>
                            <input type="file" name="product-image1[]" id="product-image1" class="form-control" multiple>
                        </div>
                        <div id="preview-edit" class="d-flex flex-wrap justify-content-start px-auto">
                        </div>
                        <div class="form-group">
                            <label > Giá sản phẩm</label>
                            <input name="price" type="text" class="form-control" id="price1" placeholder="0đ">
                        </div>
                        <div class="form-group">
                            <label > Loại hàng</label>
                            <select  name="id_cate" id="id_cate1" class="form-control" >
                              @foreach ($categories as $category)
                                    <option type ="text" value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label > Thương hiệu</label>
                            <select  name="id_brand" id="id_brand1" class="form-control" >
                              @foreach ($brands as $brand)
                                    <option type ="text" value="{{ $brand->id }}">{{ $brand->name }}</option>
                              @endforeach
                            </select>
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