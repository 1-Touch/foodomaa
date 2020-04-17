@extends('admin.layouts.master')
@section("title")
Dashboard
@endsection
@section('content')
<style>
    .chart-container {
    margin-top: 5rem;
    overflow: hidden;
    }
    .chart-container.has-scroll {
    overflow: hidden;
    }
</style>
<div class="content mb-5">
    <div id="update_notification" style="display:none;" class="alert alert-update mt-2">
        <button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row mt-4">
        <div class="col-6 col-xl-3 mb-2 mt-2">
            <div class="col-xl-12 dashboard-display p-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10 d-none d-sm-block">
                            <i class="dashboard-display-icon icon-basket"></i>
                        </div>
                        <div class="dashboard-display-number">{{ $displaySales }}</div>
                        <div class="font-size-sm text-uppercase text-muted">Sales</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2 mt-2">
            <div class="col-xl-12 dashboard-display p-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10 d-none d-sm-block">
                            <i class="dashboard-display-icon icon-users4"></i>
                        </div>
                        <div class="dashboard-display-number">{{ $displayUsers }}</div>
                        <div class="font-size-sm text-uppercase text-muted">Users</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2 mt-2">
            <div class="col-xl-12 dashboard-display p-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10 d-none d-sm-block">
                            <i class="dashboard-display-icon icon-city"></i>
                        </div>
                        <div class="dashboard-display-number">{{ $displayRestaurants }}</div>
                        <div class="font-size-sm text-uppercase text-muted">Restaurants</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2 mt-2">
            <div class="col-xl-12 dashboard-display p-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10 d-none d-sm-block">
                            <i class="dashboard-display-icon icon-coin-dollar"></i>
                        </div>
                        <div class="dashboard-display-number">{{ config('settings.currencyFormat') }} {{ $displayEarnings }}</div>
                        <div class="font-size-sm text-uppercase text-muted">Earnings</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="panel panel-flat dashboard-main-col mt-4" style="min-height: 30rem;">
                <div class="panel-heading">
                    <h4 class="panel-title pl-3 pt-3"><strong>Recent Orders</strong></h4>
                    <hr>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Status</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>    
                                    <a href="{{ route('admin.viewOrder', $order->unique_order_id) }}" class="letter-icon-title">{{ $order->unique_order_id }}</a>
                                </td>
                                <td>
                                    <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                    @if ($order->orderstatus_id == 1) Order Placed @endif
                                    @if ($order->orderstatus_id == 2) Order Accepted @endif
                                    @if ($order->orderstatus_id == 3) Delivery Assigned @endif
                                    @if ($order->orderstatus_id == 4) Picked Up @endif
                                    @if ($order->orderstatus_id == 5) Completed @endif
                                    @if ($order->orderstatus_id == 6) Canceled @endif
                                    @if ($order->orderstatus_id == 7) Ready for Pickup @endif
                                    </span>
                                </td>
                                <td>
                                    <span class="text-semibold no-margin">{{ config('settings.currencyFormat') }} {{ $order->total }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6 d-none d-md-block">
            <div class="panel panel-flat">
                <div class="panel-body">
                    @if($ifAnyOrders)
                    <div class="chart-container has-scroll">
                        <div class="chart has-fixed-height has-minimum-width" id="basic_donut"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-flat dashboard-main-col mt-4">
                <div class="panel-heading">
                    <h4 class="panel-title pl-3 pt-3"><strong>New Users</strong></h4>
                    <hr>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created</th>
                                <th class="text-center" style="width: 10%;"><i class="
                                    icon-circle-down2"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.get.editUser', $user->id) }}" class="letter-icon-title">{{ $user->name }}</a>
                                </td>
                                <td>
                                    <span class="text-muted text-size-small">{{ $user->email }}</span>
                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                    <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                    {{ $role->name }}
                                    </span>
                                    @endforeach
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.get.editUser', $user->id) }}"
                                        class="badge badge-primary badge-icon"> Edit <i
                                        class="icon-database-edit2 ml-1"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {

        require.config({
            paths: {
                echarts: '{{ substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/visualization/echarts'
            }
        });
    
        require(
            [
                'echarts',
                'echarts/theme/limitless',
                'echarts/chart/pie',
                'echarts/chart/funnel'
            ],
    
            function (ec, limitless) {
    
                var basic_donut = ec.init(document.getElementById('basic_donut'), limitless);
              
                basic_donut_options = {
    
                    // Add title
                    title: {
                        text: 'Overview Of Order Statuses',
                        subtext: 'Of all orders till {{ $todaysDate }}',
                        x: 'center'
                    },
    
                    // Add legend
                    legend: {
                        show: false,
                        orient: 'vertical',
                        x: 'left',
                        data: {!! $orderStatusesName !!}
                    },
    
                    // Display toolbox
                    toolbox: {
                        show: false,
                    },
    
                    // Enable drag recalculate
                    calculable: false,
    
                    // Add series
                    series: [
                        {
                            name: 'Orders',
                            type: 'pie',
                            radius: ['50%', '70%'],
                            center: ['50%', '58%'],
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: true
                                    },
                                    labelLine: {
                                        show: true
                                    }
                                },
                                emphasis: {
                                    label: {
                                        show: true,
                                        formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                                        position: 'center',
                                        textStyle: {
                                            fontSize: '17',
                                            fontWeight: '500'
                                        }
                                    }
                                }
                            },
    
                            data: {!! $orderStatusesData !!} 
                        }
                    ]
                };
    
                basic_donut.setOption(basic_donut_options);
    
                window.onresize = function () {
                    setTimeout(function (){
                        basic_donut.resize();
                    }, 200);
                }
            }
        );
    });
</script>
@endsection