<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ bán hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    {{-- <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> --}}
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="container" class="container-fluid p-0">
        <div class="row pb-5 mr-0">
            <div id="navbar" class="col-md-12 ">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-dark ">
                        <div>
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/market-1802176-1530897.png"
                                    alt="shop" height="40px">
                                Shop Bán Hàng
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto py-5 py-md-2">
                                @foreach ($data as $categories)
                                    <li class="nav-item active">
                                        <a class="nav-link mx-3" href="#">{{ $categories['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div id="show-table-cart">
                                {{-- route('name of route') --}}
                                <a href="{{ route('shopping.cart') }}" id="add-product-cart"
                                    class='btn btn-info btn-lg showCart'>
                                    <span class='glyphicon glyphicon-shopping-cart'>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div id="input" class="row justify-content-center pb-5 px-0">
            <div class="col-lg-8">
                <form action="#" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded"
                            placeholder="Tìm sản phẩm hay danh mục mong muốn" aria-label="Search"
                            aria-describedby="search-addon" />
                        <button type="submit" name="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="block-content" class="container">

            <div class="row">
                @yield('content')
            </div>

        </div>
    </div>
    <footer>
        <div class="footer" style="height: fit-content;">
            <div class="container py-5">
                <div class="row justify-content-center py-5 px-0 mx-0">
                    <div class="col-12 offset-9 col-sm-4 offset-sm-0 d-flex flex-column">
                        <a href="http://" class="footer-link">Liên hệ</a>
                        <a href="http://" class="footer-link">Giới thiệu</a>
                        <a href="http://" class="footer-link">Bản quyền</a>
                    </div>
                    <div class="col-12 offset-9 col-sm-4 offset-sm-0 d-flex flex-column">
                        <a href="http://" class="footer-link">Phim bộ</a>
                        <a href="http://" class="footer-link">Phim lẻ</a>
                        <a href="http://" class="footer-link">Phim chiếu rạp</a>
                    </div>
                    <div class="col-12 offset-9 col-sm-4 offset-sm-0 d-flex flex-column">
                        <div class="row ">
                            <span class="fa fa-facebook-square"></span>
                            <a href="http://" class="footer-link pl-2">Facebook</a>
                        </div>
                        <div class="row">
                            <span class="fa fa-twitter"></span>
                            <a href="http://" class="footer-link pl-2">Twitter</a>
                        </div>
                        <div class="row">
                            <span class="fa fa-instagram"></span>
                            <a href="http://" class="footer-link pl-2">Instagram</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function minus() {
            let x = document.getElementById("box-number").value;
            document.getElementById("box-number").value = parseInt(x) - 1;
        }

        function plus() {
            let x = document.getElementById("box-number").value;
            document.getElementById("box-number").value = parseInt(x) + 1;
        }
    </script>

    <script src="{{ asset('js/home.js') }}" defer></script>
    @yield('javascript')
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
</body>

</html>
