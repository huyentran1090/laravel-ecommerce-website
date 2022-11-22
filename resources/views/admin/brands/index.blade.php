@extends('admin.default')
@section('css')
    <style>
        #DisplayGalleryImageModal .modal-dialog {
            min-width: 700px;
        }
        #gallery img {
            width: 200px;
            height: 200px
        }
        #preview-edit img {
            width: 100px;
            height: 100px
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid d-flex py-3 pl-0">
        <div class="col-md-11 pl-0">
            <form action="/admin/brands" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="name" class="form-control bg-light border-0 small" placeholder="Từ khoá..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-1 d-flex justify-content-start p-2 m-0">
            <div>
                <button type="button" class="btn btn-primary btn-sm add " data-toggle="modal" data-target="#BrandAddModal">
                    <span class=" fa fa-plus"></span>
                </button>
            </div>
            <div class="pl-1">
                <form action="{{ url('admin/brands/') }}">
                    <button class="btn btn-primary btn-sm">
                        <span class="fa fa-refresh"></span>
                    </button>
                </form>
            </div>
        </div>
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
            @foreach ($data_brands as $brands)
                <tr>
                    <td>{{ $brands->id }}</td>
                    <td>{{ $brands->name }}</td>
                    <td>
                        <a class="gallery-image open-modal-gallery-image" href="" data-toggle="modal"
                            data-target="#DisplayGalleryImageModal"
                            data-images={{ $brands->image ? $brands->image : '[]' }}>
                            {{ count(json_decode($brands->image ? $brands->image : '[]')) }}
                        </a>
                    </td>
                    <td>{{ $brands->created_at }}</td>
                    <td>{{ $brands->updated_at }}</td>
                    <td>
                        <div class="row d-flex flex-row justify-content-center">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal"
                                    data-target="#BrandEditModal" data-id="{{ $brands->id }}"
                                    data-edit-images={{ $brands->image ? $brands->image : '[]' }}>
                                    <span class="fa fa-edit"></span>
                                </button>
                            </div>
                            <div class="col-md-2 ">
                                <form action="{{ url('admin/brands/' . $brands->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary btn-sm">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mx-auto">
            {!! $data_brands->links() !!}
        </div>
    </div>
    @include('admin.brands.modal.add')
    @include('admin.brands.modal.edit')
    @include('admin.brands.modal.gallery')

    <script src="{{ asset('js/brands.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"
        integrity="sha512-l7jogMOI6ZWZJEY7lREjFdQum46y2+kpp/mnbJx7O+izymO9eGjL6Y4o7cEJNBdouhVHpti2Wd79Q6aIjPwxtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha512-ldc1sPu1FZ8smgkgp+HwnYyVb1eRn2wEmKrDg1JqPEb02+Ei4kNzDIQ0Uwh0AJVLQFjJoWwG+764x70zy5Tv4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endsection
