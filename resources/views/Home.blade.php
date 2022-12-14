<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trang chủ bán hàng</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>
  <div id="container" class="container-fluid p-0">
    <div class="row pb-5 mr-0">
      <div id="navbar" class="col-md-12 ">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-dark ">
            <div>
              <a class="navbar-brand" href="/webtrading.php">
                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/market-1802176-1530897.png" alt="shop" height= "40px">
                ゲンチン～ショプ
              </a>
            </div>          
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto py-5 py-md-2">
                @foreach ($data_cate as $categories)
                <li class="nav-item active">
                  <a class="nav-link mx-3" href="#">{{$categories['name_cate'] }}</a>
                </li>   
                @endforeach
              </ul>
              <div id="show-table-cart">
                <a href="#" id = "add-product-cart" class='btn btn-info btn-lg'>
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
            <input type="search" name="search" class="form-control rounded" placeholder="Tìm sản phẩm hay danh mục mong muốn" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" name="submit" class="btn btn-primary">Tìm kiếm</button>
          </div>
        </form>
      </div>
    </div>
    <div id="block-content" class="container" >
      <div class="row">
        <div class="col-lg-9">
          <div class="row ">
            <div class="offset-3 col-12 offset-md-0 col-md-6 p-0 py-sm-2  position-relative  ">
            </div>
            <div class="offset-2 col-12 offset-md-0 col-md-6 pb-sm-5">
              <div class="row">
                <ul class="nav nav-tabs border-0 justify-content-center" role="tablist">
                  <li class="nav-item mr-2">
                    <a class="nav-link active" href="#allmovie" role="tab" data-toggle="tab">Sản phẩm mới</a>
                  </li>
                  <li class="nav-item mr-2">
                    <a class="nav-link" href="#comingsoon" role="tab" data-toggle="tab">Sản phẩm hot</a>
                  </li>
                  <li class="nav-item mr-2">
                    <a class="nav-link" href="#newmovie" role="tab" data-toggle="tab">Đang sale</a>
                  </li>
                </ul>
              </div> 
            </div>
          </div>
          <div class="row position-absolute" style="top:0px">
            <div class="tab-content ">
              <div role="tabpanel" class="tab-pane active" id="allmovie">
                <div class="row">
                  @foreach ( $data_cate as $categories)
                  <h1>{{$categories['name_cate']}}</h1>
                  <div class="row w-100">
                    @foreach ($categories['product'] as $item)
                      <div   class='offset-3 col-6 mb-5 offset-md-0 col-md-3 '>
                        <div id='card' class='border-0'>
                          <div class='card border-0 position-relative'>
                            <a href="#">
                              <img src="" class='card-img-top rounded' alt='Hospital Playlist'>
                            </a>
                            <div class='d-flex justify-content-center'>
                              <div id='point' class='position-absolute'>8.9</div>
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
                                <span class'fa fa-tag'></span>
                                  <a href='#'>{{ $item['brand_name'] }}</a>
                              </div>
                              <form action='#' method='post'>               
                                <div class ='row justify-content-center'>
                                  <input class='minus is-form' type='button' value='-' onclick='minus()'>
                                  <input aria-label='quantity'  id ='box-number' class='input-qty' max='10' min='0' name='' type='number' value='1'>
                                  <input class='plus is-form' type='button' value='+' onclick ='plus()'>
                                  <div id='block-cart-icon'>
                                    <a  id = 'add-product-cart' class='btn btn-info btn-lg' href="#">
                                      <span name ='quantity' class='glyphicon glyphicon-shopping-cart'>                            
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
                  
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comingsoon">
                <div class="row">
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                    <div class="border-0">
                      <div class="card border-0 position-relative">
                        <a href="/hospital.html">
                          <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                          class="card-img-top" alt="Hospital Playlist">
                        </a>
                        <div class="d-flex justify-content-center">
                          <div id="point" class="position-absolute">8.9</div>
                        </div>
                        
                        <div class="card-body p-0">
                          <div id="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <h5 class="card-title py-2">Hospital Playlist</h5>
                          <div class="col-md-12 p-0">
                            <span class="fa fa-tag "></span>
                            <a href="#">Phim cuộc sống</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row px-3">
                  <h1>PHIM LẺ MỚI</h1>
                  <div class="row">
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-3 col-6 mb-5 offset-md-0 col-md-3 ">
                      <div class="border-0">
                        <div class="card border-0 position-relative">
                          <a href="/hospital.html">
                            <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" 
                            class="card-img-top" alt="Hospital Playlist">
                          </a>
                          <div class="d-flex justify-content-center">
                            <div id="point" class="position-absolute">8.9</div>
                          </div>
                          
                          <div class="card-body p-0">
                            <div id="rating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                            </div>
                            <h5 class="card-title py-2">Hospital Playlist</h5>
                            <div class="col-md-12 p-0">
                              <span class="fa fa-tag "></span>
                              <a href="#">Phim cuộc sống</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="newmovie">
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 d-none d-lg-block">
          <div class="row pl-4 pt-2" style="height:50px">
            <h2>PHIM BỘ HOT</h2>
          </div>
          <div id="block-list" class="row pl-5" style="height: 850px; overflow-y: auto; overflow-x: hidden;">
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row py-5 pl-4" style="height:50px">
            <h2>PHIM LẺ HOT </h2>
          </div>
          <div id="block-list" class="row pl-5" style="height: 800px; overflow-y: auto; overflow-x: hidden;">
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
            <div id="block-list-item" class="row align-items-center mt-3">
              <div id="block-item-img" class="col-md-4 pl-0">
                <div class="card border-0 position-relative">
                  <img src="https://ss-images.saostar.vn/wp700/pc/1621997630434/saostar-9cyyz9astb2z5ki8.jpg" class="card-img-top" alt="Hospital Playlist">
                  <div class="d-flex justify-content-center">
                    <div id="list-item-point" class="position-absolute">8.9</div>
                  </div>
                </div>
              </div>
              <div id="block-item-content" class="col-md-8 card-body px-0 py-3">
                <h5 class="card-title m-0">Hospital Playlist</h5>
                <p class="my-2">(2021)</p>
                <div id="rating" class="p-0">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
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
      document.getElementById("box-number").value= parseInt(x)-1;
    }
    function plus() {
      let x = document.getElementById("box-number").value;
      document.getElementById("box-number").value= parseInt(x)+1;
    }

  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>

