@extends('admin.default')
@section('css')
<style>
    .img-wraps {
    position: relative;
    display: inline-block;
    
    font-size: 0;
}
.preview .img-responsive {
    width: 100px;
    height: 100px
   
    
}
.gallery img {
    width: 200px;
    height: 200px
}
.img-wraps .closes {
    position: absolute;
    top: 5px;
    right: 8px;
    z-index: 100;
    background-color: #FFF;
    padding: 4px 3px;
     
    color: #000;
    font-weight: bold;
    cursor: pointer;
    
    text-align: center;
    font-size:18px;
    line-height: 10px;
    border-radius: 50%;
    border:1px solid black;
    
}
</style>
@endsection
@section('content')
<div class="row py-3 pl-3">
    <button type="button" class="btn btn-primary btn-sm add " data-toggle="modal" data-target="#CategoryAddModal" >
        <span class = " fa fa-plus"></span>
    </button>
</div>
    <table class="table text-center ">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_categories as $categories)
                <tr>
                    <td >{{ $categories->id }}</td>
                    <td>{{ $categories->name }}</td>
                    <td>
                        <a class="gallery-image" href="" data-toggle="modal" data-target="#DisplayGalleryImageModal">{{count((explode(',', json_encode($categories->image,true))))}}</a>
                    </td>
                    <td>{{ $categories->created_at }}</td>
                    <td>{{ $categories->updated_at }}</td>
                    <td>
                        <div class="row d-flex flex-row justify-content-center">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#CategoryEditModal"  data-id="{{ $categories ->id }}" >
                                    <span class= "fa fa-edit"></span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ url('admin/categories/'.$categories->id)}}" method="POST">
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
<!-- Modal display gallery image -->
<div class="modal fade" id="DisplayGalleryImageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Toàn bộ ảnh</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class = "gallery d-flex flex-wrap p-2 justify-content-center">
                @foreach ($data_categories as $categories)
                    <?php
                    foreach (json_decode($categories->images, true) as $images) {
                        ?> <img src="{{ url('storage/images/'.$images) }}" alt="">
                         <?php
                    
                    }
                    
                    ?>
                    @foreach (  $image as $images)
                    <img src="{{ url('storage/images/'.$images) }}" alt="">
                    
                    @endforeach
                @endforeach
              
              
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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

<!-- Modal edit -->
    <div class="modal fade" id="CategoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-category-form"  method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- @method('PUT') --}}
                    @method('PUT') 
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label"> Tên Category </label>
                            <input name="namecategory"  id="name1" type="text" class="form-control"aria-describedby="nameHelp" placeholder="Tên Category">
                            <div class="namecategory errorValidate"></div>
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
    <script src="{{ asset('js/category.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js" integrity="sha512-l7jogMOI6ZWZJEY7lREjFdQum46y2+kpp/mnbJx7O+izymO9eGjL6Y4o7cEJNBdouhVHpti2Wd79Q6aIjPwxtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha512-ldc1sPu1FZ8smgkgp+HwnYyVb1eRn2wEmKrDg1JqPEb02+Ei4kNzDIQ0Uwh0AJVLQFjJoWwG+764x70zy5Tv4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection


