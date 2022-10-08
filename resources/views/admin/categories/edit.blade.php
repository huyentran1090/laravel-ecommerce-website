@extends('admin.default')


@section('content')
    {{-- route('author.store') = url('author') --}}
    <form action="{{url('admin/categories/'.$categories->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail2">Mã tác giả</label>
            <input name="id" type="text" class="form-control" value="{{ $categories->id }}" id="nameAuthor" aria-describedby="nameHelp" >
            <label for="exampleInputEmail1">Tên tác giả</label>
            <input name="name" type="text" class="form-control" value="{{ $categories->name }}" id="nameAuthor" aria-describedby="nameHelp" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- @if (isset($errorsValidate->nameAuthor))
                <div class="alert alert-danger">{{ $errorsValidate->nameAuthor }}</div>
            @endif --}}
        </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
@endsection