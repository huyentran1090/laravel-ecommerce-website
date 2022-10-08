@extends('admin.default')



<main class="col-sm-12">
<button type="button" class="btn btn-primary" data-toggle="modal" 
data-target="#add-brand-modal">
    {{-- <a href="{{url('admin/brands/create')}}">
      ADD
    </a> --}}
        Add 

</button>


    <table class="table" id="brand-table">
        <thead>
            <tr>
                <th>ID</th>
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
                        <div>
                            <button type="button" class ="btn btn-primary btn-sm edit" 
                                data-id="{{ $brands->id }}" data-namebrand="{{ $brands->name }}"
                                data-toggle="modal" data-target="#edit-brand-modal">
                                {{-- <a href="{{ url('admin/brands/'. $brands->id. '/edit/') }}" class="btn btn-primary btn-sm">edit</a> --}}
                               edit
                            </button>
                        </div>
                        <div>
                            <form action="{{ url('admin/brands/'. $brands->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary btn-sm" >
                                   Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
<div class="modal" id="add-brand-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Brand</h4>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <p class="notification"></p>
            <form data-action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" id="add-brand-form">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> Tên thương hiệu </label>
                        <input name="namebrands" type="text" class="form-control" id="namebrands" aria-describedby="nameHelp" placeholder="Tên thương hiệu">
                        <div class="namebrands errorValidate"></div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- <div class="modal" id="edit-brand-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit brand</h4>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <p class="notification"></p>
            <form data-action="{{ url('admin/brands/') }}" method="POST" enctype="multipart/form-data" id="edit-brand-form">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> Tên thương hiệu </label>
                        <input name="namebrands" type="text" class="form-control" id="namebrands" aria-describedby="nameHelp" placeholder="Tên thương hiệu">
                        <div class="namebrands errorValidate"></div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div> --}}

<div class="modal" id="edit-brand-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit brand</h4>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <p class="notification"></p>
            <form data-action="/admin/brands" method="POST" enctype="multipart/form-data" id="edit-brand-form">
                @csrf
                @method('PUT')
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"> Tên thương hiệu </label>
                        <input name="namebrands"  id="namebrands" type="text" class="form-control"aria-describedby="nameHelp" placeholder="Tên thương hiệu">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>s
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/brands.js') }}" defer></script>


