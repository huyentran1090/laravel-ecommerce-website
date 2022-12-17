@extends('home')
@section('content')
    @foreach ($data as $categories)
        @if (count($categories['products']) > 0)
            <h1>{{ $categories['name'] }}</h1>
        @endif
        <div class="row">
            {{-- @foreach ($categories['products'] as $item)
                                                @php dd($item, $item->brands->name) @endphp
                                                
            @endforeach --}}
            @foreach ($categories['products'] as $item)
            <div class='offset-3 col-6 mb-5 offset-md-0 col-md-3 '>
                <div id='card' class='border-0'>
                    <div class='card border-0 position-relative'>
                        <a href="#">
                            @php $productImageArray = json_decode($item['image']) @endphp
                            <img src="{{ url('storage/images/' . $productImageArray[0] ) }}" class='card-img-top rounded'
                                alt='{{ $item['name'] }}'>
                        </a>
                        <div class='d-flex justify-content-center'>
                            <div id='point' class='position-absolute'>8.9
                            </div>
                        </div>
                        <div class='card-body p-0'>
                            <div id='rating'>
                                <span class='fa fa-star checked'></span>
                                <span class='fa fa-star checked'></span>
                                <span class='fa fa-star checked'></span>
                                <span class='fa fa-star'></span>
                                <span class='fa fa-star'></span>
                            </div>
                            <h5 class='card-title py-2'>{{ $item['name'] }}</h5>
                            <div class='col-md-12 p-0'>
                                <span class= 'fa fa-tag'></span>
                                <a href='#'>{{ $item->brands->name }}</a>
                            </div>
                            <form action='#' method='post'>
                                <div class='row justify-content-center'>
                                    <input class='minus is-form' type='button' value='-' onclick='minus()'>
                                    <input aria-label='quantity' id='box-number' class='input-qty' max='10' min='0'
                                        name='' type='number' value='1'>
                                    <input class='plus is-form' type='button' value='+' onclick='plus()'>
                                    <div id='block-cart-icon'>
                                        <a type = 'button' id='add-to-cart' class='btn btn-info btn-lg' href="#" onclick="addProduct({{$item}})">
                                            <span name='quantity' class='glyphicon glyphicon-shopping-cart'>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    @endforeach
@endsection
