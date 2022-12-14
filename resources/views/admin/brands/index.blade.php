@extends('admin.default')

@section('content')
<div class="row py-3 pl-3">
    <button type="button" class="btn btn-primary btn-sm add " data-toggle="modal" data-target="#BrandAddModal" >
        <span class = " fa fa-plus"></span>
    </button>
</div>
    <table class="table text-center ">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_brands as $brands)
                <tr>
                    <td>{{ $brands->id }}</td>
                    <td>{{ $brands->name }}</td>
                    <td>{{ $brands->created_at }}</td>
                    <td>{{ $brands->updated_at }}</td>
                    
                    <td>
                        <div class="row d-flex flex-row justify-content-center">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#BrandEditModal"  data-id="{{$brands ->id }}" >
                                    <span class= "fa fa-edit"></span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ url('admin/brands/'.$brands->id)}}" method="POST">
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
<div class="modal fade" id="BrandAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Th??m th????ng hi???u</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-brands-form"  method="POST" enctype="multipart/form-data" >
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"> Th????ng hi???u m?? b???n mu???n th??m </label>
                        <input name="namebrands"  id="name" type="text" class="form-control"aria-describedby="nameHelp" placeholder="T??n th????ng hi???u">
                        <div class="namebrands errorValidate"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> ???nh </label>
                        <input type="file" name="filename[]" class="form-control upload-img" multiple>
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
    <div class="modal fade" id="BrandEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-brand-form"  method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- @method('PUT') --}}
                    @method('PUT') 
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label"> T??n th????ng hi???u mu???n s???a </label>
                            <input name="namebrands"  id="name1" type="text" class="form-control"aria-describedby="nameHelp" placeholder="T??n Th????ng hi???u">
                            <div class="namebrands errorValidate"></div>
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
    <script src="{{ asset('js/brands.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js" integrity="sha512-l7jogMOI6ZWZJEY7lREjFdQum46y2+kpp/mnbJx7O+izymO9eGjL6Y4o7cEJNBdouhVHpti2Wd79Q6aIjPwxtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha512-ldc1sPu1FZ8smgkgp+HwnYyVb1eRn2wEmKrDg1JqPEb02+Ei4kNzDIQ0Uwh0AJVLQFjJoWwG+764x70zy5Tv4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    @endsection


