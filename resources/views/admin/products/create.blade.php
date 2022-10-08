@extends('admin.default')


@section('content')

    {{-- route('author.store') = url('author') --}}
    <div class="container">
        <div class="row">
          <div class="col-8">
            <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <input name="nameproducts" type="text" class="form-control"  value="{{ old('name') }}" aria-describedby="namelHelp" placeholder="Nhập tên sản phẩm">
                    @error('nameproducts')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              </div>

              <div class="form-group">
                <label for="group2">Vui lòng chọn ảnh</label>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="file2" required>
                  <label class="custom-file-label" for="file2"></label>
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
              <button type="submit" class="btn btn-info">Submit</button>
            </form>
          </div>
        </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(".custom-file-input").on("change", function() {
      var image = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(image);
    });
  </script>
@endsection