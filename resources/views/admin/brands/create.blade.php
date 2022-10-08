@extends('admin.default')


@section('content')

    {{-- route('author.store') = url('author') --}}
    <form action="{{ url('admin/brands') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Tên thương hiệu </label>
            <input name="namebrands" type="text" class="form-control" value="{{ old('name') }}" id="namebrands" aria-describedby="nameHelp" placeholder="Tên thương hiệu"
            @error('namebrands')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- @if (isset($errorsValidate->nameAuthor))
                <div class="alert alert-danger">{{ $errorsValidate->nameAuthor }}</div>
            @endif --}}
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
@endsection