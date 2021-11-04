<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8">

    <!-- CSS Files -->
    <style>
        .border_email{
            padding: 0px 280px;
        }
        .email-pay{
            text-align: center;
        }
        #email-btn-pay{
            border: 1px solid transparent;
            cursor: pointer;
            color: white;
        }
        #mark-bar-email{
            text-align: left;
            background: #ffffcc;
        }
        .notification{
            margin: 12px 5px 0px 0px;
        }
        .infor_email{
            display: flex;
            padding: 30px 70px;
        }
        .policy_email {
            display: flex;
            padding: 30px 70px;

        }
        .policy_email .col-4{
            padding-right: 80px;
        }
        .dear_email{
            padding: 20px 70px;
        }
        #card-main-email{
            margin: 20px 70px ;
            padding: 20px;
        }
        .main-email-left{
            width: 400px;
        }
        .main-email-right{
            width: 400px;
        }
        .main-email{
            display: flex;
        }
        .infor_email .My_account{
            width: 300px;
        }
        .infor_email .email_icon{
            width: 300px;
            text-align: center;
        }
        .infor_email .email_phone{
            width: 300px;
            text-align: right;
        }


        @media (max-width : 1300px) {
            .border_email{
                margin-right: 0px !important;
                text-align: right !important;
            }
            .border_email{
                padding: 0px 142px;
            }

        }
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }

        .space-text{
            padding: 10px;
        }


        .table-hover tr:hover{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div style="background-color: #3399cc; width: 100%;">
        <div style="padding: 0px 135px;">
            <div style="background-color: white;">
                <div style="border-radius:0px;">
                    <div style=" display: flex; padding: 30px 70px;">
                    </div>
                    <div>
                        <div style="font-size: 20px; color: #3399cc; padding-top: 20px; text-align: center; border-bottom: 2px solid #ff6633; box-shadow: 2px 5px 30px #888888;">
                            <b>XÁC NHẬN ĐƠN HÀNG</b>
                            <br>
                            <b>{{$getOrder->code}}</b>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="padding: 20px 70px;">
                        Kính chào Quý khách,
                        <br>
                        <br>
                        chân thành cảm ơn quý khách đã mua sắm tại shop chúng tôi
                        <br>
                        <br>
                        Chúng tôi hy vọng Quý khách hài lòng với trải nghiệm mua sắm và các sản phẩm đã chọn.
                        <br>
                        Chúng tôi vừa nhận được thông tin đặt hàng của quý khách với chi tiết đơn hàng như sau:
                        <br>
                        <br>
                        <table style=" border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;">
                            <tr style="padding: 15px;">
                                <th style="padding: 15px;">THÔNG TIN ĐƠN HÀNG</th>
                                <th style="padding: 15px;">ĐỊA CHỈ GIAO HÀNG</th>
                            </tr>
                            <tr>
                                <td>
                                    <div style="padding: 10px;">Mã đơn hàng: {{$getOrder->code}}</div>
                                    <div style="padding: 10px;">Ngày / Giờ: {{$getOrder->created_at}}</div>
                                </td>
                                <td>
                                    <pre>{{$getOrder->order_info}}</pre>
                                </td>
                            </tr>
                        </table>
                        <table style="margin-top: 20px; border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;">
                            <tr style="padding: 15px;">
                                <th style="padding: 15px;">Sản Phẩm</th>
                                <th style="text-align: center;">Số lượng</th>
                                <th style="text-align: center;">Giá tiền</th>
                                <th style="text-align: center;">Tổng cộng</th>
                            </tr>
                            @foreach ($getOrderDetail as $order)
                            <tr style="border: 1px solid #ddd;">
                                <td style="width:30%">
                                    {{$order->productOrder->name}}
                                </td>
                                <td style="text-align: center;">
                                    {{$order->quantity}}
                                </td>
                                <td style="text-align: center;">
                                    @if ($order->productOrder->promotion != null)
                                    {{number_format($order->productOrder->promotion*1000, 0, ',', ' ' ).'đ'}}
                                    @else
                                    {{number_format($order->productOrder->price*1000, 0, ',', ' ' ).'đ'}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($order->productOrder->promotion != null)
                                    {{number_format($order->productOrder->promotion*$order->quantity*1000, 0, ',', ' ' ).'đ'}}
                                    @else
                                    {{number_format($order->productOrder->price*$order->quantity*1000, 0, ',', ' ' ).'đ'}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div style="margin-top: 20px;  border: 1px solid #ddd; text-align: left;">
                            <table style="width: 100%;">
                                <tr>
                                    <th style="width:50%; padding: 15px;">Giá trị đơn hàng</th>
                                    <th >{{number_format($getOrder->total_price*1000, 0, ',', '.' )."VNĐ"}}</th>
                                </tr>
                                <tr style="background-color: #ffffcc;">
                                    <td><b>Hình thức thanh toán	</b></td>
                                    <td>
                                        @if ($getOrder->payment_method == 0)
                                        Thanh toán qua chuyển khoản
                                        @elseif($getOrder->payment_method == 1)
                                        Thanh toán tại nhà (COD)
                                        @endif
                                    </td>
                                </tr>
                                <tr style="background-color: #ffffcc;">
                                    <td><b>Tình trạng thanh toán</b></td>
                                    <td>
                                        @if ($getOrder->status == 0)
                                        Đang xử lý
                                        @elseif($getOrder->status == 1)
                                        Đã xác nhận
                                        @elseif($getOrder->status == 2)
                                        Đã giao
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding: 20px 70px;">
                        <p>
                            Mọi thắc mắc và góp ý, Quý khách vui lòng liên hệ với chúng tôi qua:
                        </p>
                            Email hỗ trợ :<a href="#" title="" class="new"> support@4seasonsshop.com.vn</a> hoặc
                        <br>
                        <br>
                            Tổng đài Chăm sóc khách hàng: 1900 6755 hoặc Hotline : 0950 448 540
                        <br>
                        <br>
                            FourSeasonsshop trân trọng cảm ơn và rất hân hạnh được phục vụ Quý khách.
                        <br>
                        <br>
                        <br>
                        <b><i>*Quý khách vui lòng không trả lời email này*</i></b>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
