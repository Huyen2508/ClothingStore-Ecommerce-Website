@extends('layouts.backend.app')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Thống kê chung</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thống kê thông tin</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$orders}}</h3>

              <p>Số lượng đơn hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
{{--        <div class="col-lg-3 col-6">--}}
{{--          <!-- small box -->--}}
{{--          <div class="small-box bg-success">--}}
{{--            <div class="inner">--}}
{{--              <h3>{{number_format($revenue*1000,0,'.',',')}}<sup style="font-size: 20px">VNĐ</sup></h3>--}}
{{--              <p>Tổng doanh thu</p>--}}
{{--            </div>--}}
{{--            <div class="icon">--}}
{{--              <i class="ion ion-stats-bars"></i>--}}
{{--            </div>--}}
{{--            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <!-- ./col -->--}}
{{--        <div class="col-lg-3 col-6">--}}
{{--          <!-- small box -->--}}
{{--          <div class="small-box bg-warning">--}}
{{--            <div class="inner">--}}
{{--              <h3>{{$user}}</h3>--}}

{{--              <p>Số người dùng đăng ký</p>--}}
{{--            </div>--}}
{{--            <div class="icon">--}}
{{--              <i class="ion ion-person-add"></i>--}}
{{--            </div>--}}
{{--            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <!-- ./col -->--}}
{{--        <div class="col-lg-3 col-6">--}}
{{--          <!-- small box -->--}}
{{--          <div class="small-box bg-danger">--}}
{{--            <div class="inner">--}}
{{--              <h3>{{$orderDone}}</h3>--}}

{{--              <p>Đơn hàng đã xử lý</p>--}}
{{--            </div>--}}
{{--            <div class="icon">--}}
{{--              <i class="ion ion-pie-graph"></i>--}}
{{--            </div>--}}
{{--            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <!-- ./col -->--}}
      </div>
{{--      <div class="row">--}}
{{--          <div class="col-md-6">--}}
{{--              <div class="card">--}}
{{--                  <div class="card-header">--}}
{{--                      <div class="card-title">Số lượng người đăng ký trong 12 tháng gần nhất</div>--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <div class="chart-container">--}}
{{--                          <canvas id="lineChart" data-order="{{ $countUser }}"></canvas>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--          <div class="col-md-6">--}}
{{--              <div class="card">--}}
{{--                  <div class="card-header">--}}
{{--                      <div class="card-title">Số lượng đơn hàng đặt trong 12 tháng gần nhất</div>--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <div class="chart-container">--}}
{{--                          <canvas id="barChart" data-order="{{ $countOrder }}"></canvas>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--      </div>--}}
{{--      <div class="row">--}}
{{--          <div class="col-md-6">--}}
{{--              <div class="card">--}}
{{--                  <div class="card-header">--}}
{{--                      <div class="card-title">Doanh số trong 12 tháng gần nhất (tính theo trạng thái "đã giao" của đơn hàng)</div>--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <canvas id="profitLineChart" data-order="{{ $countProfit }}"></canvas>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--          <div class="col-md-6">--}}
{{--              <div class="card">--}}
{{--                  <div class="card-header">--}}
{{--                      <div class="card-title">Top 20 người dùng mua hàng nhiều nhất website</div>--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <table>--}}
{{--                          <tr>--}}
{{--                              <th>Email</th>--}}
{{--                              <th class="text-center">Số đơn</th>--}}
{{--                          </tr>--}}
{{--                          @foreach ($loyalUser as $user)--}}
{{--                          <tr>--}}
{{--                              <td width="65%">--}}
{{--                                  {{App\Models\User::findOrFail($user->user_id)->email}}--}}
{{--                              </td>--}}
{{--                              <td class="text-center">--}}
{{--                                  {{$user->value}}--}}
{{--                              </td>--}}
{{--                          </tr>--}}
{{--                          @endforeach--}}
{{--                      </table>--}}

{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--      </div>--}}
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
@section('script')
<script>
    //the number of users register in latest 12 months
    var lineChart = document.getElementById('lineChart').getContext('2d')
    var order = $('#lineChart').data('order');
    var listOfValue = [];
    var listOfMonth = [];

        order.forEach(function(element){
            listOfMonth.push("T"+element.getMonth+"-"+element.getYear);
            listOfValue.push(element.value);
    });
    var myLineChart = new Chart(lineChart, {
        type: 'line',
        data: {
            labels: listOfMonth,
            datasets: [{
                label: "Số người đăng ký",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: listOfValue
            }]
        },
        options : {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                labels : {
                    padding: 10,
                    fontColor: '#1d7af3',
                }
            },
            tooltips: {
                bodySpacing: 4,
                mode:"nearest",
                intersect: 0,
                position:"nearest",
                xPadding:10,
                yPadding:10,
                caretPadding:10
            },
            layout:{
                padding:{left:15,right:15,top:15,bottom:15}
            }
        }
    });

    //the number of orders register in latest 12 months
    var barChart = document.getElementById('barChart').getContext('2d')
    var order = $('#barChart').data('order');
    var listOfValueOrder = [];
    var listOfMonthOrder = [];

        order.forEach(function(element){
            listOfMonthOrder.push("T"+element.getMonth+"-"+element.getYear);
            listOfValueOrder.push(element.value);
    });
    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: listOfMonthOrder,
            datasets : [{
                label: "Số đơn",
                backgroundColor: 'rgb(23, 125, 255)',
                borderColor: 'rgb(23, 125, 255)',
                data: listOfValueOrder,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
        }
    });

    //count profit
    var lineChartProfit = document.getElementById('profitLineChart').getContext('2d')
    var orderProfit = $('#profitLineChart').data('order');
    var listOfValueProfit = [];
    var listOfMonthProfit = [];

        orderProfit.forEach(function(element){
            listOfMonthProfit.push("T"+element.getMonth+"-"+element.getYear);
            listOfValueProfit.push(element.value);
    });
    var myLineChartProfit = new Chart(lineChartProfit, {
        type: 'line',
        data: {
            labels: listOfMonthProfit,
            datasets: [{
                label: "Doanh số",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: listOfValueProfit
            }]
        },
        options : {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                labels : {
                    padding: 10,
                    fontColor: '#1d7af3',
                }
            },
            tooltips: {
                bodySpacing: 4,
                mode:"nearest",
                intersect: 0,
                position:"nearest",
                xPadding:10,
                yPadding:10,
                caretPadding:10
            },
            layout:{
                padding:{left:15,right:15,top:15,bottom:15}
            }
        }
    });
</script>
@endsection
