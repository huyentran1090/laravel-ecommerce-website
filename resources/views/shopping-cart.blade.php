@extends('home')
@section('css')
    <style>
        .hidden {
        display: none !important;
        }
    </style> 
@endsection
@section('content')
    <section class="pt-5 pb-5" style="background-color: rgb(125, 235, 247)">
        <div class="container">
            <div class="row w-100" style="background-color:#eee">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">GIỎ HÀNG</h3>
                    <p class="mb-5 text-center">
                        <i class="text-info font-weight-bold">3</i> sản phẩm có trong giỏ
                    </p>
                    <table id="shoppingCart" class="table table-condensed table-responsive" style="background-color: #fff">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th style="width:60%">Sản phẩm</th>
                                <th style="width:12%">Giá tiền</th>
                                <th style="width:10%">Số lượng</th>
                                <th style="width:16%"></th>
                            </tr>
                        </thead>
                        <tbody class= "cart-body">
                            {{-- <tr>
                                <td>
                                    <label class="checkbox-wrap checkbox-primary">
                                        <input type="checkbox" checked="">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <img src="https://via.placeholder.com/250x250/5fa9f8/ffffff" alt=""
                                                class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                            <h4>Product Name</h4>
                                            <p class="font-weight-light">Brand</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">$49.00</td>
                                <td data-th="Quantity">
                                    <input type="number" class="form-control form-control-lg text-center" value="1">
                                </td>
                                <td class="actions" data-th="">
                                    <div class="text-right">
                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4>Tổng tiền:</h4>
                        <h1>$99.00</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <a href="#" class="btn btn-warning mb-4 btn-lg pl-5 pr-5">Mua hàng</a>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
