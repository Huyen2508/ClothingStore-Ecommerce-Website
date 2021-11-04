@extends('layouts.frontend.app')
@section('content')
<div style="background-color: #f5fcff">
    <div class="address-user-detail row pt-4" style="width:100%">
        <div class="col-3 text-center" style="color: #0b7dda;">
            <i class="fas fa-cart-plus pr-1" aria-hidden="true"></i> <b> Giỏ hàng của quý khách</b>
        </div>
        <div class="col-5 text-center">
            <h4><b>Thanh Toán Đơn Hàng</b> </h4>
            <p>Cảm ơn quý khách đã lựa chọn sản phẩm của chúng tôi</p>
        </div>
    </div>

    <div class="row pt-4 px-2 my-4" style="width:100%;">
        {{-- <div class="col-12 col-lg-3" style="color: #f09819; font-size: 16px;">
            <i class="mr-1 fas fa-map-marker-alt"></i> Địa chỉ nhận hàng
        </div>
        <div class="col-12 col-lg-9 pt-lg-0 pt-3" id="change_address">
            <a class="btn-gradient16" href=""><i class="mr-1 fas fa-plus"></i>Thêm địa chỉ mới </a>
            <a class="btn-gradient16" href=""><i class="mr-1 fas fa-plus"></i>Thiết lập địa chỉ </a>
        </div> --}}
    </div>
    <div>
        {{-- <div>
            <input type="radio" name="demo2" value="two" id="radio-two" class="form-radio-first" checked=""><label for="radio-two"> <b> Nguyễn Minh Đức (+84) 978485015</b> D4, Đại học Hà Nội, Km9 Nguyễn Trãi, Phường Thanh Xuân Bắc, Quận Thanh Xuân, Hà Nội </label>
        </div>
        <div>
            <input type="radio" name="demo2" value="two" id="radio-two" class="form-radio-first"><label for="radio-two">  <b> Phạm Văn Hưng (+84) 978485015</b >D4, Đại học Hà Nội, Km9 Nguyễn Trãi, Phường Thanh Xuân Bắc, Quận Thanh Xuân, Hà Nội</label>
        </div> --}}
        <form action="{{route('createorder')}}" method="POST">
            @csrf
            <div class="private-information my-4" style="width:100%">
                <div class="row">
                    <div class="px-0 col-lg-6 col-12 pl-0">
                        <div class="row">
                            <div class="text-right col-lg-4 col-3" style=" margin-top: 20px;">
                                Họ và tên *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="VD: Nguyễn Văn A" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right col-lg-4 col-3" style="margin-top: 20px;">
                                Điện thoại *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="VD: 0978485015" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right col-lg-4 col-3" style="margin-top: 20px;">
                                Email *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="VD: user@gmail..." name="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-0 col-lg-6 col-12 pl-0">
                        <div class="row">
                            <div class="text-right col-lg-4 col-4" style="margin-top: 20px;">
                                Tỉnh / TP *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select id="country" name="province" class="form-control input-fixed" style="margin-top: 5px;" required>
                                        <option value="" selected disabled>Chọn Tỉnh/Thành phố</option>
                                        @foreach($provinces as $key => $province)
                                        <option value="{{$key}}"> {{$province}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right col-lg-4 col-3" style="margin-top: 20px;">
                                Quận / Huyện *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select name="district" id="state" class="form-control input-fixed" style="margin-top: 5px;" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right col-lg-4 col-3" style="margin-top: 20px;">
                                Phường / Xã *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select name="ward" id="city" class="form-control" style="margin-top: 5px;" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right col-lg-4 col-3" style="margin-top: 20px;">
                                Địa chỉ chi tiết *
                            </div>
                            <div class="col-lg-7 col-7 px-0">
                                <div class="form-group">
                                    <textarea name="address" class="form-control" aria-label="With textarea" rows="5"></textarea>
                                    <div class="invalid-feedback">Đây là trường bắt buộc</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-0 col-md-12">
                <select id='mySelect' name="paymentmethod">
                    <option value='0' selected>Thanh toán qua chuyển khoản</option>
                    <option value='1'>Thanh toán tại nhà (COD)</option>
                </select>
                <ul class="nav nav-tabs" id="myTab">
{{--                    <li class="active"><a href="#profile">Thanh toán qua chuyển khoản</a></li>--}}
                    <li class="active">Thanh toán qua chuyển khoản</li>
{{--                    <li><a href="#messages">Thanh toán tại nhà</a></li>--}}
                    <li>Thanh toán tại nhà</li>
                </ul>
                <div class="tab-content" style="border-color: white;">
                    <div class="tab-pane active" id="profile">Vui lòng chuyển khoản qua số tài khoản 21577890765</div>
                    <div class="tab-pane" id="messages">Đến giao hàng tại địa chỉ mà bạn đã đăng ký, phí giao hàng là 30.000đ</div>
                </div>
                <div class="col-8 pt-5">
                    <table class="table" style="background-color: white;">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <p class="text-center" style="margin-bottom: 2px;"><b>Giá trị đơn Hàng Của Quý Khách</b></p>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Tổng giá trị đơn hàng </th>
                                <td colspan="2" style="color: #f09819;"><b id="price">{{number_format($sum*1000, 0, ',', '.' )}}đ</b></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <input type="text" name="total" value="{{$sum}}" hidden>
                                    <input type="text" class="form-input-code" style="width: none !important;" placeholder="Nhập mã giảm giá" name="voucher"><br>
                                    <span id="info"></span>
                                </th>
                                <td colspan="2" style="color: #f09819;">
                                    <button type="button" class="btn btn-primary" onClick="addVoucher()" style="border-radius: 20px;">Áp dụng</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="btn-confirm-pay">
                    <button type="submit" class="btn btn-primary" style="border-radius: 20px !important; margin-left: 90px; ">Xác nhận đặt hàng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    $('#mySelect').on('change', function(e) {
        $('#myTab li a').eq($(this).val()).tab('show');
    });
</script>
<script>

// add voucher code in order bill
function addVoucher() {
    var voucher_code = $("input[name=voucher]").val();
    var total = $("input[name=total]").val();
    $.ajax({
        url: '/checkvoucher',
        data: {
            voucher_code: voucher_code,
            total: total
        },
        type: "POST",
        success: function(data) {
            if (data.error == 'error' ) {
                $('#info').css('color','rgb(255, 0, 43)');
                $('#info').html(data.text);
                $("#price").html(data.price);
            } else {
                $('#info').css('color','#07f743');
                $('#info').html(data.text);
                $("#price").html(data.price);
            }
        },
    });
}
</script>
@endsection
