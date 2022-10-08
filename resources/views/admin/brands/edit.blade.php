
    {{-- route('author.store') = url('author') --}}
    {{-- <form action="{{url('admin/brands/'.$brands->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail2">Mã thương hiệu</label>
            <input name="id" type="text" class="form-control" value="{{ $brands->id }}" id="idBrands" aria-describedby="nameHelp">
            <br>
            <label for="exampleInputEmail1">Tên thương hiệu</label>
            <input name="name" type="text" class="form-control" value="{{ $brands->name }}" id="nameBrands" aria-describedby="nameHelp" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- @if (isset($errorsValidate->nameAuthor))
                <div class="alert alert-danger">{{ $errorsValidate->nameAuthor }}</div>
            @endif --}}
        {{-- </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form> --}} 
    <div class="modal" id="edit-brand-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Brand</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <p class="notification"></p>
                <form action="{{url('admin/brands/'.$brands->id)}}" method="POST" enctype="multipart/form-data" id="edit-brand-form">
                    @csrf
                    @method('PUT')
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Tên thương hiệu </label>
                            <input name="namebrands" type="text" class="form-control" id="namebrands"  value="{{ $brands->name }}"aria-describedby="nameHelp" placeholder="Tên thương hiệu">
                            <div class="namebrands errorValidate"></div>
                        </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>
