@extends('admin.layouts.master')
@section("title") Orders - Dashboard
@endsection
@section('content')
<style>
.pulse {
    display: inline-block;
    width: 12.5px;
    height: 12.5px;
    border-radius: 50%;
    animation: pulse 1.2s infinite;
    vertical-align: middle;
    margin: -3px 0 0 3px;
}
.pulse-warning {
    background: #ffc107;
}
.pulse-danger {
    background: #ff5722;
}

@keyframes pulse {
  0% {
    box-shadow: 0 0 0 0 rgba(255,87,34, 0.5);
  }
  50% {
      box-shadow: 0 0 0 26px rgba(255,87,34, 0);
  }
  100% {
      box-shadow: 0 0 0 0 rgba(255,87,34, 0);
  }
}
</style>
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                <span class="font-weight-bold mr-2">TOTAL</span>
                <span class="badge badge-primary badge-pill animated flipInX">{{ $count }}</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="content">
    <form action="{{ route('admin.post.searchOrders') }}" method="GET">
        <div class="form-group form-group-feedback form-group-feedback-right search-box">
            <input type="text" class="form-control form-control-lg search-input"
                placeholder="Search with order id..." name="query">
            <div class="form-control-feedback form-control-feedback-lg">
                <i class="icon-search4"></i>
            </div>
        </div>
        @csrf
    </form>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Restaurant Name</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Coupon</th>
                            <th>Order Placed At</th>
                            <th class="text-center" style="width: 10%;"><i class="
                                icon-circle-down2"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                {{ $order->unique_order_id }}
                                @if(config("settings.restaurantAcceptTimeThreshold") != NULL)
                                    @if ($order->orderstatus_id == 1)
                                        @if($order->created_at->diffInMinutes(\Carbon\Carbon::now()) >= (int) config("settings.restaurantAcceptTimeThreshold"))
                                            <span class="pulse pulse-warning" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Order not accepted by restaurant. Late by {{ $order->created_at->diffInMinutes(\Carbon\Carbon::now()) - 5 }} mins."></span>
                                        @endif
                                    @endif
                                @endif
                                @if(config("settings.deliveryAcceptTimeThreshold") != NULL)
                                    @if ($order->orderstatus_id == 2)
                                       @if($order->created_at->diffInMinutes(\Carbon\Carbon::now()) >= (int) config("settings.deliveryAcceptTimeThreshold"))
                                            <span class="pulse pulse-danger" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Order not on accepted by delivery guy. Late by {{ $order->created_at->diffInMinutes(\Carbon\Carbon::now()) - 5 }} mins."></span>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            <td>{{ $order->restaurant->name }}</td>
                            <td>
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize text-left">
                                    @if ($order->orderstatus_id == 1) Order Placed @endif
                                    @if ($order->orderstatus_id == 2) Order Accepted @endif
                                    @if ($order->orderstatus_id == 3) Delivery Assigned @endif
                                    @if ($order->orderstatus_id == 4) Picked Up @endif
                                    @if ($order->orderstatus_id == 5) Completed @endif
                                    @if ($order->orderstatus_id == 6) Canceled @endif
                                    @if ($order->orderstatus_id == 7) Ready to Pickup @endif
                                    
                                    @if($order->orderstatus_id > 2 && $order->orderstatus_id  < 6)
                                    
                                    @if($order->accept_delivery !== null)
                                    @if($order->orderstatus_id > 2 && $order->orderstatus_id  < 6)
                                    Delivery by: <b>{{ $order->accept_delivery->user->name }}</b>
                                    @endif
                                    @endif
                                    @endif
                                </span>
                            </td>
                            <td>{{ config('settings.currencyFormat') }} {{ $order->total }}</td>
                            <td>
                                @if($order->coupon_name == NULL) NONE @else
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                {{ $order->coupon_name }}
                                </span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.viewOrder', $order->unique_order_id) }}"
                                    class="badge badge-primary badge-icon"> VIEW <i
                                    class="icon-file-eye ml-1"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // reload window every 10 mins to refresh order status...
        setTimeout(function() {
            window.location.reload(1);
        }, 10 * 60 * 1000);
    });
</script>
@endsection