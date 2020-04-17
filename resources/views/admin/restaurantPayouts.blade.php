@extends('admin.layouts.master')
@section("title") Restaurant Payouts - Dashboard
@endsection
@section('content')
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
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Amount
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Transaction Mode
                            </th>
                            <th>
                                Transaction ID
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Created At
                            </th>
                           <th class="text-center" style="width: 10%;"><i class="
                                icon-circle-down2"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($restaurantPayouts as $restaurantPayout)
                        <tr>
                            <td>{{ $restaurantPayout->amount }}</td>
                            <td><span class="badge badge-flat border-grey-800 text-default text-capitalize">{{ $restaurantPayout->status }}</span></td>
                            <td>
                                @if($restaurantPayout->transaction_mode != NULL)
                                {{ $restaurantPayout->transaction_mode }}
                                @else
                                ----
                                @endif
                            </td>
                            <td>
                                @if($restaurantPayout->transaction_id != NULL)
                                {{ $restaurantPayout->transaction_id }}
                                @else
                                ----
                                @endif
                            </td>
                             <td>
                                @if($restaurantPayout->message != NULL)
                                {{ $restaurantPayout->message }}
                                @else
                                ----
                                @endif
                            </td>
                            <td>{{ $restaurantPayout->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.viewRestaurantPayout', $restaurantPayout->id) }}"
                                    class="badge badge-primary badge-icon"> VIEW <i
                                    class="icon-file-eye ml-1"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $restaurantPayouts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection