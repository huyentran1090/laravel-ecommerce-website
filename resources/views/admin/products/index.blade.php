@extends('admin.default')


@section('content')
<link href="{{ asset('css/product-index.css') }}" rel="stylesheet">
<div class="row py-3 pl-3">
    <button type="button" class="btn btn-primary btn-sm add " data-toggle="modal" data-target="#ProductAddModal" >
        <span class = " fa fa-plus"></span>
    </button>
</div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>Brands</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_products as $products)
                <tr>
                    <td>{{ $products->id }}</td>
                    <td>{{ $products->name }}</td>
                    <td>
                        <img id="image-resource-{{$products->id}}" src="{{ url('storage/images/'.$products->image) }}"  style="height: 100px; width: 150px;">
                    </td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->id_cate }}</td>
                    <td>{{ $products->id_brand }}</td>
                    <td>{{ $products->created_at }}</td>
                    <td>{{ $products->updated_at }}</td>
                    <td>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-2 ml-2">
                                <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#ProductEditModal"  data-id="{{ $products ->id }}" >
                                    <span class= "fa fa-edit"></span>
                                </button>
                            </div>
                            <div class="col-md-2 ml-3">
                                <form action="{{ url('admin/products/'.$products->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary btn-sm" >
                                       <span class = "fa fa-trash"></span>
                                    </button>
                                </form> 
                            </div>
                        </div>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<!-- Modal ADD -->
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
                        <label for="group2">Vui lòng chọn ảnh</label>
                        <div class="custom-file">
                          <input name="image" type="file" class="custom-file-input" id="file2">
                          <label class="custom-file-label" for="file2"></label>
                          <div class="image errorValidate"></div>
                        </div>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
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
                            <div class="form-group">
                                <label for="group2">Vui lòng chọn ảnh</label>
                                <div class="custom-file">
                                  <input name="image" type="file" class="custom-file-input" id="imagefile2" required>
                                  <label class="custom-file-label" for="file2"></label>
                                </div>
                                <div id="img-preview" class=" justify-content-center position-relative mt-3">
                                    <img class="image-url rounded mx-auto d-block " src="" width="150px" height="150px"/>
                                  
                                        <div id="remove" class="position-absolute">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class= fa-fa-close></span>
                                            </button>
                                           
                                        </div>
                                    

                                </div> 
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
    <script src="{{ asset('js/product.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js" integrity="sha512-l7jogMOI6ZWZJEY7lREjFdQum46y2+kpp/mnbJx7O+izymO9eGjL6Y4o7cEJNBdouhVHpti2Wd79Q6aIjPwxtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha512-ldc1sPu1FZ8smgkgp+HwnYyVb1eRn2wEmKrDg1JqPEb02+Ei4kNzDIQ0Uwh0AJVLQFjJoWwG+764x70zy5Tv4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection

