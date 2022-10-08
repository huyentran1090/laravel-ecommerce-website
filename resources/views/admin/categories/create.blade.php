@extends('admin.default')


@section('content')

    {{-- route('author.store') = url('author') --}}
    <form action="{{ url('admin/categories') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Thêm Category</label>
            <input name="namecategories" type="text" class="form-control" value="{{ old('name') }}" id="namecategories" aria-describedby="nameHelp" placeholder="Name categories">
            @error('namecategories')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- @if (isset($errorsValidate->nameAuthor))
                <div class="alert alert-danger">{{ $errorsValidate->nameAuthor }}</div>
            @endif --}}
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
@endsection