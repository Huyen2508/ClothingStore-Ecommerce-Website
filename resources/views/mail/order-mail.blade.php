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
                            <b>X??C NH???N ????N H??NG</b>
                            <br>
                            <b>{{$getOrder->code}}</b>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="padding: 20px 70px;">
                        K??nh ch??o Qu?? kh??ch,
                        <br>
                        <br>
                        ch??n th??nh c???m ??n qu?? kh??ch ???? mua s???m t???i shop ch??ng t??i
                        <br>
                        <br>
                        Ch??ng t??i hy v???ng Qu?? kh??ch h??i l??ng v???i tr???i nghi???m mua s???m v?? c??c s???n ph???m ???? ch???n.
                        <br>
                        Ch??ng t??i v???a nh???n ???????c th??ng tin ?????t h??ng c???a qu?? kh??ch v???i chi ti???t ????n h??ng nh?? sau:
                        <br>
                        <br>
                        <table style=" border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;">
                            <tr style="padding: 15px;">
                                <th style="padding: 15px;">TH??NG TIN ????N H??NG</th>
                                <th style="padding: 15px;">?????A CH??? GIAO H??NG</th>
                            </tr>
                            <tr>
                                <td>
                                    <div style="padding: 10px;">M?? ????n h??ng: {{$getOrder->code}}</div>
                                    <div style="padding: 10px;">Ng??y / Gi???: {{$getOrder->created_at}}</div>
                                </td>
                                <td>
                                    <pre>{{$getOrder->order_info}}</pre>
                                </td>
                            </tr>
                        </table>
                        <table style="margin-top: 20px; border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;">
                            <tr style="padding: 15px;">
                                <th style="padding: 15px;">S???n Ph???m</th>
                                <th style="text-align: center;">S??? l?????ng</th>
                                <th style="text-align: center;">Gi?? ti???n</th>
                                <th style="text-align: center;">T???ng c???ng</th>
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
                                    {{number_format($order->productOrder->promotion*1000, 0, ',', ' ' ).'??'}}
                                    @else
                                    {{number_format($order->productOrder->price*1000, 0, ',', ' ' ).'??'}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($order->productOrder->promotion != null)
                                    {{number_format($order->productOrder->promotion*$order->quantity*1000, 0, ',', ' ' ).'??'}}
                                    @else
                                    {{number_format($order->productOrder->price*$order->quantity*1000, 0, ',', ' ' ).'??'}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div style="margin-top: 20px;  border: 1px solid #ddd; text-align: left;">
                            <table style="width: 100%;">
                                <tr>
                                    <th style="width:50%; padding: 15px;">Gi?? tr??? ????n h??ng</th>
                                    <th >{{number_format($getOrder->total_price*1000, 0, ',', '.' )."VN??"}}</th>
                                </tr>
                                <tr style="background-color: #ffffcc;">
                                    <td><b>H??nh th???c thanh to??n	</b></td>
                                    <td>
                                        @if ($getOrder->payment_method == 0)
                                        Thanh to??n qua chuy???n kho???n
                                        @elseif($getOrder->payment_method == 1)
                                        Thanh to??n t???i nh?? (COD)
                                        @endif
                                    </td>
                                </tr>
                                <tr style="background-color: #ffffcc;">
                                    <td><b>T??nh tr???ng thanh to??n</b></td>
                                    <td>
                                        @if ($getOrder->status == 0)
                                        ??ang x??? l??
                                        @elseif($getOrder->status == 1)
                                        ???? x??c nh???n
                                        @elseif($getOrder->status == 2)
                                        ???? giao
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
                            M???i th???c m???c v?? g??p ??, Qu?? kh??ch vui l??ng li??n h??? v???i ch??ng t??i qua:
                        </p>
                            Email h??? tr??? :<a href="#" title="" class="new"> support@4seasonsshop.com.vn</a> ho???c
                        <br>
                        <br>
                            T???ng ????i Ch??m s??c kh??ch h??ng: 1900 6755 ho???c Hotline : 0950 448 540
                        <br>
                        <br>
                            FourSeasonsshop tr??n tr???ng c???m ??n v?? r???t h??n h???nh ???????c ph???c v??? Qu?? kh??ch.
                        <br>
                        <br>
                        <br>
                        <b><i>*Qu?? kh??ch vui l??ng kh??ng tr??? l???i email n??y*</i></b>
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
