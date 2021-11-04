<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>FourSeasonsShop - Cửa Hàng Quần Áo Bốn Mùa</title>
    <base href="{{asset('')}}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <meta charset="utf-8">
    <link rel="icon" href="assets/img/logo_without_text.png" class="img-fluid" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="https://kit.fontawesome.com/ac2db3b359.js" crossorigin="anonymous"></script>
    <!-- Slide -->
    <script src="OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/customFrontend.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo-brand d-lg-block d-none">
                <a href="#"> <img class="img-fluid" src="{{asset('images/banner_shop.png')}}" style="width:100%" alt="Chania"></a>
            </div>
            <div class="menu">
                <div class="container list-menu">
                <a href="#"><img class="img-fluid" height="60px" width="120px" src="{{asset('images/logo.png')}}" alt="Chania"></a>
                    <div class="d-lg-block d-none">
                        <ul>
                            <li><a href="#">trang chủ</a></li>
                            <li><a href="#">giới thiệu</a></li>
                            <li><a href="#">sản phẩm</a></li>
                            <li><a href="{{route('posts')}}">blog</a></li>
                            <li><a href="#">liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="dathang-nutsave">
                        <p>(04) 6672332</p>
                        <p>8:00AM-19:00PM</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="main-body row">
                    <div class="col-md-9 col-12">
                        <div class="category-product row">
                            <div class="col-md-4 col-12">
                                <div class="box-category my-4">
                                    <div class="head-title button-pr text-center py-2">
                                        <i class="fas fa-align-justify pr-3"></i> Danh mục sản phẩm
                                    </div>
                                    <div class="list-cate">
                                        @foreach ($categories as $category)
                                        <div class="detail-cate row pt-2">
                                            <div class="col-3 px-0 pl-2 text-center">
                                                <i class="fas fa-utensils"></i>
                                            </div>
                                            <div class="col-9 pl-0">
                                                <a href="{{route('pc', $category->slug )}}"><p><b>{{$category->name}}</b></p></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-12 my-4">
                                <form class="example" action="{{route('search')}}" style="margin:auto;">
                                    <input type="text" placeholder="Nhập nội dung tìm kiếm" name="search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input type="text" name="userid" value="{{session_id()}}" hidden>

                        {{-- content webpage --}}
                        @yield('content')

                    </div>
                    <div class="col-3 d-lg-block d-none">
                        <div class="info-address my-4">
                            <div class="notice text-center row">
                                <div class="user-account">
                                    @if (Auth::user())
                                    <div class="dropdown">
                                        <button class="dropbtn">
                                            <i class="fas fa-user pr-1"></i> Xin chào {{ Auth::user()->name }}
                                            <i class="fas fa-sort-down pl-2"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            @if(Auth::user()->role==0)
                                            <a href="{{route('home')}}">Trang admin</a>
                                            @endif
                                            <a href="{{route('userInfo',Auth::user()->id)}}">Chi tiết tài khoản</a>
                                            <a href="{{ route('logoutt') }}">Đăng Xuất</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="dropdown">
                                        <button class="dropbtn">
                                            <i class="fas fa-user pr-1"></i> Tài khoản
                                            <i class="fas fa-sort-down pl-2"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <a href="{{ route('loginn') }}">Đăng nhập</a>
                                            <a href="{{ route('register') }}">Tạo tài khoản</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="px-3"><b>|</b></div>
                                <div class="user-card">
                                    <div class="card-dropdown">
                                        <button class="icon-card-user">
                                            <i class="fas fa-cart-plus pr-1"></i> Giỏ hàng
                                            <i class="fas fa-sort-down pl-2"></i>
                                        </button>
                                        <div class="content-card-user">
                                            <div class="pb-3" style="color: #44a4d7;">
                                                <b>Sản phẩm được thêm vào giỏ hàng</b>
                                            </div>
                                            <table class="table table-borderless">
                                                {{ csrf_field() }}
                                                <thead id="product_data">
                                                    {{-- product in cart show here --}}
                                                </thead>
                                            </table>
                                            {{-- <span id="product_data2"></span> --}}
                                            <div class="button-card">
                                                <button type="submit" class="my-2 btn-card">
                                                    <a href="{{ route('detailcart') }}"> Xem giỏ hàng</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="support-contact">
                                <div class="contact my-3 py-3">
                                    <div class="shop-adress row">
                                        <div class="col-3 pr-0 text-center ">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <div class="col-9 pl-0 text-info">
                                            <p class="bold-text">
                                                <b>địa chỉ cửa hàng</b>
                                            </p>
                                            <hr>
                                            @foreach ($address as $ad)
                                            <p>{{$ad->ward}}, {{$ad->district}}, {{$ad->city}}</p>
                                            <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feedback">
                            <img src="assets/img/huytran.jpg" alt="" class="rounded-circle">
                            <p><i>"FourSeasonsShop là cửa hàng chuyên phân phối sản phẩm chính hãng..."</i></p>
                            <p style="color: #ff7f0b;"><b>Son Nguyen</b></p>
                            <p>Đại học Hà Nội</p>
                        </div>

                        <div class="my-4">
                            <img src="assets/img/pngtree-big-sale-banner-with-megaphone-and-speech-bubble-png-image_4945616.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="news my-3">
                            <div class="title-news py-2 pl-4 mb-3">
                                <a href="{{route('posts')}}"><h6 style="margin-bottom: 0;"><b>TIN TỨC</b></h6></a>
                            </div>
                            <div class="col">
                                @foreach ($posts as $post)
                                <div class="box-news row py-3 ">
                                    <div class="col-4">
                                        <img src="{{ asset('images/'.$post->image) }}" class="img-fluid" alt="khong co anh">
                                    </div>
                                    <div class="col-8 text-box-news">
                                        <a href="{{route('detail-post', $post->slug)}}">{{$post->title}}</a>
                                        <h6 style="font-size: 10px">{{$post->created_at}}</h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- logo -->
                <div class="logo row my-5">
                    <div class="col-md-2 col-6">
                        <img src="assets/img/shirt.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-2 col-6">
                        <img src="assets/img/spring.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-2 col-6">
                        <img src="assets/img/summer.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-2 col-6">
                        <img src="assets/img/fall.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-2 col-6">
                        <img src="assets/img/winter.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-2 col-6">
                        <img src="assets/img/pants.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="category-footer row pb-5">
                    <div class="list-cate-footer col-md-2 col-6">
                        <h6><b>Phong cách thời trang</b></h6>
                        <a href="#">Mùa xuân</a>
                        <a href="#">Mùa hè</a>
                        <a href="#">Mùa thu</a>
                        <a href="#">Mùa đông</a>
                    </div>
                    <div class="list-cate-footer col-md-2 col-6">
                        <h6><b>Phong cách thời trang</b></h6>
                        <a href="#">Mùa xuân</a>
                        <a href="#">Mùa hè</a>
                        <a href="#">Mùa thu</a>
                        <a href="#">Mùa đông</a>
                    </div>
                    <div class="list-cate-footer col-md-2 col-6">
                        <h6><b>Phong cách thời trang</b></h6>
                        <a href="#">Mùa xuân</a>
                        <a href="#">Mùa hè</a>
                        <a href="#">Mùa thu</a>
                        <a href="#">Mùa đông</a>
                    </div>
                    <div class="list-cate-footer col-md-2 col-6">
                        <h6><b>Phong cách thời trang</b></h6>
                        <a href="#">Mùa xuân</a>
                        <a href="#">Mùa hè</a>
                        <a href="#">Mùa thu</a>
                        <a href="#">Mùa đông</a>
                    </div>
                    <div class="list-cate-footer col-md-2 col-6">
                        <h6><b>Phong cách thời trang</b></h6>
                        <a href="#">Mùa xuân</a>
                        <a href="#">Mùa hè</a>
                        <a href="#">Mùa thu</a>
                        <a href="#">Mùa đông</a>
                    </div>
                    <div class="list-cate-footer col-md-2 col-6">
                        <h6><b>Phong cách thời trang</b></h6>
                        <a href="#">Mùa xuân</a>
                        <a href="#">Mùa hè</a>
                        <a href="#">Mùa thu</a>
                        <a href="#">Mùa đông</a>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="container">
                    <div class="info-footer row">
                        <div class="col-md-4 col-12 info-details">
                            <p>
                                <h6><b> LIÊN HỆ VỚI CHÚNG TÔI</b></h6>
                            </p>

                            @foreach ($address as $ad)
                            <p><i class="fas fa-map-marker-alt"></i>{{$ad->ward}}, {{$ad->district}}, {{$ad->city}}</p>
                            <hr>
                            @endforeach
                            <p><i class="fas fa-phone-square-alt"></i> (04) 6678329 653 - (04) 543829 439</p>
                            <p><i class="fas fa-globe-americas"></i> Trực 8h00 -20h00 từ thứ 2 đến thứ 6</p>
                        </div>
                        <div class="col-md-2 col-12 personal-info">
                            <p>
                                <h6><b>THÔNG TIN</b></h6>
                            </p>
                            <a href="#">Tài khoản của tôi</a>
                            <a href="#">Sản phẩm yêu thích</a>
                            <a href="#">Lịch sử mua hàng</a>
                            <a href="#">Sử dụng thông tin</a>
                        </div>
                        >
                        <div class="col-md-2 col-12 personal-info">
                            <p>
                                <h6><b>CHÍNH SÁCH</b></h6>
                            </p>
                            <a href="#">Chính sách bảo hành</a>
                            <a href="#">Chính sách thanh toán</a>
                            <a href="#">Chính sách vận chuyển</a>
                            <a href="#">Chính sách đổi trả</a>
                        </div>
                        <div class="col-md-2 col-12 personal-info">
                            <p>
                            <h6><b>Theo dõi chúng tôi</b></h6>
                            </p>
                            <a href="#">Facebook</a>
                            <a href="#">Instagram</a>
                            <a href="#">Zalo</a>
                            <a href="#">Youtube</a>
                        </div
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/cartAction.js') }}"></script>
    {{-- <script src="{{asset('js/loadProductInCart.js')}}"></script> --}}

    <!--   Core JS Files   -->
    {{-- <script src="assets/js/core/jquery.3.2.1.min.js"></script> --}}
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var buttoncategory = document.querySelector('.head-title');
            var listcate = document.querySelector('.list-cate');
            var buttonpr = document.getElementsByClassName('button-pr');   // vì lấy nhiều nên bắt buộc phải dùng class
            var contentpr = document.getElementsByClassName('content-pr');
            var btncard = document.querySelector('.icon-card-user');
            var dropdowncontent = document.querySelector('.content-card-user');
            var active = document.querySelector('.active');

            for (i = 0; i < buttonpr.length; i++) {
                buttonpr[i].onclick = function() {
                    var nd = this.getAttribute('data-mk');
                    var phantushow = document.getElementById(nd);
                    for (k = 0; k < buttonpr.length; k++) {
                        contentpr[k].classList.remove('show');
                    }
                    phantushow.classList.toggle('show');
                }
            }
            buttoncategory.onclick = function() {
                listcate.classList.toggle('show');
            }
            btncard.onclick = function() {
                dropdowncontent.classList.toggle('show');
            }
        });
    </script>
    {{-- select address --}}
    <script type="text/javascript">
        $('#country').change(function(){
            var provinceID = $(this).val();
            if(provinceID){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-district-list')}}?province_id="+provinceID,
                    success:function(res){
                        if(res){
                            $("#state").empty();
                            $("#state").append('<option value="">Chọn Quận/Huyện</option>');
                            $.each(res,function(key,value){
                                $("#state").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#state").empty();
                        }
                    }
                });
            }else{
                $("#state").empty();
                $("#city").empty();
            }
        });
        $('#state').on('change',function(){
            var districtID = $(this).val();
            if(districtID){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-ward-list')}}?district_id="+districtID,
                    success:function(res){
                        if(res){
                            $("#city").empty();
                            $("#city").append('<option value="">Chọn Phường/Xã</option>');
                            $.each(res,function(key,value){
                                $("#city").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#city").empty();
                        }
                    }
                });
            }else{
                $("#city").empty();
            }
        });
    </script>
    {{-- end select address --}}
    @yield('js')
</body>
</html>
