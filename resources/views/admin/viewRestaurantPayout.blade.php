@extends('admin.layouts.master')
@section("title") Restaurant Payouts - Dashboard
@endsection
@section('content')
<div class="content">
    <div class="row mt-4">
        <div class="col-xl-8">
        	<div class="card">
            	<div class="card-body">
	            <h4>
	            	{{ $restaurantPayout->restaurant->name }} is requesting a payout of <strong>{{ config('settings.currencyFormat') }}{{ $restaurantPayout->amount }}</strong>
	            </h4>

	            <form action="{{ route('admin.updateRestaurantPayout') }}" method="POST" enctype="multipart/form-data">
	                <legend class="font-weight-semibold text-uppercase font-size-sm">
	                    <i class="icon-address-book mr-2"></i> Restaurant Payout
	                </legend>
	                <input type="hidden" name="id" value="{{ $restaurantPayout->id }}">

	                <div class="form-group row">
	                    <label class="col-lg-3 col-form-label"><span class="text-danger">*</span>Status:</label>
	                    <div class="col-lg-9">
	                        <select class="form-control select-search" name="status" required>
	                        <option value="PENDING" @if($restaurantPayout->status === "PENDING") selected="selected" @endif>PENDING</option>
	                        <option value="PROCESSING" @if($restaurantPayout->status === "PROCESSING") selected="selected" @endif>PROCESSING</option>
	                        <option value="COMPLETED" @if($restaurantPayout->status === "COMPLETED") selected="selected" @endif>COMPLETED</option>
	                        </select>
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label class="col-lg-3 col-form-label">Transaction Mode:</label>
	                    <div class="col-lg-9">
	                        <input value="{{ $restaurantPayout->transaction_mode }}" type="text" class="form-control form-control-lg" name="transaction_mode"
	                            placeholder="Transaction Mode">
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label class="col-lg-3 col-form-label">Transaction ID:</label>
	                    <div class="col-lg-9">
	                        <input value="{{ $restaurantPayout->transaction_id }}" type="text" class="form-control form-control-lg" name="transaction_id"
	                            placeholder="Transaction ID">
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label class="col-lg-3 col-form-label">Message:</label>
	                    <div class="col-lg-9">
	                        <input value="{{ $restaurantPayout->message }}" type="text" class="form-control form-control-lg" name="message"
	                            placeholder="Message">
	                    </div>
	                </div>
	                @csrf
	                <div class="text-right">
	                    <button type="submit" class="btn btn-primary">
	                    UPDATE
	                    <i class="icon-database-insert ml-1"></i>
	                    </button>
	                </div>
	            </form>
	        	</div>
	       </div>
        </div>
    </div>
</div>
@endsection