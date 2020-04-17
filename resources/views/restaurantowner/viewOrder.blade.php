@extends('admin.layouts.master')
@section("title") Order - Dashboard
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-xl-8" id="printThis">
            <div class="sidebar-category mt-4" style="box-shadow: 0 1px 6px 1px rgba(0, 0, 0, 0.05);background-color: #fff;">
                <div class="category-content">
                    <div href="#" class="btn btn-block content-group" style="text-align: left; background-color: #8360c3; color: #fff; border-radius: 0;"><strong style="font-size: 1.3rem;">{{ $order->unique_order_id }}</strong>
                        <a href="javascript:void(0)" id="printButton" class="btn btn-sm" style="color: #fff; border: 1px solid #ccc; float: right;">Print</a>
                    </div>
                    <div class="p-3">
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Order Placed: </strong></label>
                            {{ $order->created_at}}  ( {{ $order->created_at->diffForHumans() }} )
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Customer Details: </strong></label>
                            <br>
                            <p><b>Name: </b> {{ $order->user->name }}</p>
                            <p><b>Email: </b> {{ $order->user->email }}</p>
                            <p><b>Contact Number: </b> {{ $order->user->phone }}</p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Restaurant Name: </strong></label>
                            {{ $order->restaurant->name }}
                        </div>
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Status:</strong></label>
                            <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                            @if ($order->orderstatus_id == 1) Order Placed @endif
                            @if ($order->orderstatus_id == 2) Order Accepted @endif
                            @if ($order->orderstatus_id == 3) Delivery Assigned @endif
                            @if ($order->orderstatus_id == 4) Picked Up @endif
                            @if ($order->orderstatus_id == 5) Completed @endif
                            @if ($order->orderstatus_id == 6) Canceled @endif
                            @if ($order->orderstatus_id == 7) Ready to Pickup @endif
                            </span>

                            @if($order->accept_delivery !== null)
                            @if($order->orderstatus_id > 2 && $order->orderstatus_id  < 6)
                            <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                Delivery by: <b>{{ $order->accept_delivery->user->name }}</b>
                            </span>
                            @endif
                            @endif
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Address: </strong></label>
                            <p>{{ $order->address }}</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Payment Mode: </strong></label>
                            <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                            {{ $order->payment_mode }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label no-margin text-semibold mr-2"><strong>Comment/Suggestion: </strong></label>
                            <span>
                            {{ $order->order_comment }}
                            </span>
                        </div>
                        <hr>
                        @php
                        function calculateAddonTotal($addons) {
                            $total = 0;
                            foreach ($addons as $addon) {
                                $total += $addon->addon_price;
                            }
                            return $total;
                        }
                        @endphp
                        <div class="text-right">
                            <div class="form-group">
                                <div class="clearfix"></div>
                                <div class="row">
                                <div class="col-md-12 p-2 mb-3" style="background-color: #f7f8fb; float: right; text-align: left;">
                                    @foreach($order->orderitems as $item)
                                    <div>
                                    <div class="d-flex mb-1 align-items-start" style="font-size: 1.2rem;">
                                        <span class="badge badge-flat border-grey-800 text-default mr-2">x{{ $item->quantity }}</span>
                                        <strong class="mr-2" style="width: 100%;">{{ $item->name }}</strong>
                                        
                                        <span class="badge badge-flat border-grey-800 text-default">{{ config('settings.currencyFormat') }} {{ ($item->price +calculateAddonTotal($item->order_item_addons)) * $item->quantity }}</span>
                                    </div>
                                    @if(count($item->order_item_addons))
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Addon</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($item->order_item_addons as $addon)
                                                <tr>
                                                    <td>{{ $addon->addon_category_name }}</td>
                                                    <td>{{ $addon->addon_name }}</td>
                                                    <td>{{ config('settings.currencyFormat') }}{{ $addon->addon_price }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                        @endif
                                        @if(!$loop->last)
                                            <div class="mb-2" style="border-bottom: 2px solid #c9c9c9;"></div>
                                        @endif
                                        </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label class="control-label no-margin text-semibold mr-2"><strong>Coupon: </strong></label>
                                @if($order->coupon_name == NULL) NONE @else
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                {{ $order->coupon_name }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label no-margin text-semibold mr-2"><strong>Restaurant Charge: </strong></label>
                                {{ config('settings.currencyFormat') }}{{ $order->restaurant_charge }}
                            </div>
                            <div class="form-group">
                                <label class="control-label no-margin text-semibold mr-2"><strong>Delivery Charge: </strong></label>
                                {{ config('settings.currencyFormat') }}{{ $order->delivery_charge }}
                            </div>
                            @if(!$order->tax == NULL)
                            <div class="form-group">
                                <label class="control-label no-margin text-semibold mr-2"><strong>Tax: </strong></label>
                                {{ $order->tax }}%
                                @endif
                            </div>
                            <hr>
                            <div class="form-group">
                                <h3>
                                    <label class="control-label no-margin text-semibold mr-2"><strong>TOTAL</strong></label>
                                    <strong> {{ config('settings.currencyFormat') }} {{ $order->total }} </strong>
                                </h3>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5 mt-2">
            <div class="col-md-8">
                <div class="d-flex justify-content-end">
                    @if($order->orderstatus_id == 1)
                    <a href="{{ route('restaurant.acceptOrder', $order->id) }}"
                        class="mr-2 btn btn-lg acceptOrderBtn btn-primary"> Accept Order <i
                        class="icon-checkmark3 ml-1"></i></a>
                    <a href="{{ route('restaurant.cancelOrder', $order->id) }}"
                        class="btn btn-lg cancelOrderBtn btn-danger" data-popup="tooltip" data-placement="top" title="Double Click to Cancel"> Cancel Order <i
                        class="icon-cross ml-1"></i></a>
                    @endif
                    @if($order->delivery_type == 2 && $order->orderstatus_id == 2)
                    <a href="{{ route('restaurant.markOrderReady', $order->id) }}"
                        class="btn btn-lg btn-warning"> Mark as Ready <i
                        class="icon-checkmark3 ml-1"></i></a>
                    @endif
                    @if($order->delivery_type == 2 && $order->orderstatus_id == 7)
                    <a href="{{ route('restaurant.markSelfPickupOrderAsCompleted', $order->id) }}"
                        class="btn btn-lg btn-success"> Mark as Completed <i
                        class="icon-checkmark3 ml-1"></i></a>
                    @endif
                </div>
            </div>
        </div>
</div>
<script>
    $('#printButton').on('click',function(){
        $('#printThis').printThis();
    })
    //on single click, accpet order and disable button
    $('body').on("click", ".acceptOrderBtn", function(e) {
        $(this).addClass('pointer-none');
    });
    
    //on Single click donot cancel order
    $('body').on("click", ".cancelOrderBtn", function(e) {
        return false;
    });
    
    //cancel order on double click
    $('body').on("dblclick", ".cancelOrderBtn", function(e) {
        $(this).addClass('pointer-none');
        window.location = this.href;
        return false;
     });
</script>
@endsection