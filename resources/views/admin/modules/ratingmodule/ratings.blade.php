@extends('admin.layouts.master')
@section("title") Ratings - Dashboard
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4>
                <a href="{{ route('admin.modules') }}" class="font-weight-bold mr-2">Modules</a> <i class="icon-circle-right2 mr-2"></i> <span class="font-weight-bold mr-2">Ratings and Reviews</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Restaurant</th>
                            <th>Order</th>
                            <th>Delivery Guy</th>
                            <th class="text-center" style="width: 20%">Rating</th>
                            <th>Comment</th>
                            <th class="text-center" style="width: 10%;"><i class="
                                icon-circle-down2"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratings as $index => $rating)
                        
                        @php
                        $user = App\User::where('id', $rating->user_id)->first();
                        $order = App\Order::where('id', $rating->order_id)->first();
                        $restaurant = App\Restaurant::where('id', $order->restaurant_id)->first();
                        $deliveryGuy = App\AcceptDelivery::where('order_id', $order->id)->first();
                        $deliveryGuyUser = App\User::where('id', $deliveryGuy->user_id)->first();
                        @endphp
                        <tr>
                            <td @if($index & 1) style="border: none;" @endif><a href="{{ route('admin.get.editUser', $user->id) }}">@if($index % 2 == 0){{ $user->name }}@endif</a></td>
                            <td @if($index & 1) style="border: none;" @endif><a href="{{ route('admin.get.editRestaurant', $restaurant->id) }}">@if($index % 2 == 0){{ $restaurant->name }}@endif</td>
                            <td @if($index & 1) style="border: none;" @endif><a href="{{ route('admin.viewOrder', $order->unique_order_id) }}">@if($index % 2 == 0){{ $order->unique_order_id }}@endif</td>
                            <td @if($index & 1) style="border: none;" @endif><a href="{{ route('admin.get.editUser', $deliveryGuyUser->id) }}">@if($index % 2 == 0){{ $deliveryGuyUser->name }}@endif</a></td>
                            <td @if($index & 1) style="border: none;" @endif class="text-center">
                                @for($i = 1; $i <= $rating->rating; $i++)
                                    <i class="icon-star-full2" style="color: #FF9800"></i>
                                @endfor
                                <span class="badge badge-flat border-grey-800">{{ $rating->rating }}</span>
                            </td>
                            <td @if($index & 1) style="border: none;" @endif>
                                @if($index % 2 == 0) {!! Illuminate\Support\Str::limit($rating->comment, 45, '...') !!} @endif
                            </td>
                            <td @if($index & 1) style="border: none;" @endif class="text-center">
                                @if($index % 2 == 0)
                                <a href="{{ route('admin.editRating', $rating->order_id) }}"
                                    class="badge badge-primary badge-icon"> EDIT <i
                                    class="icon-database-edit2 ml-1"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $ratings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection