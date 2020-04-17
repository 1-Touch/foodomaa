@extends('admin.layouts.master')
@section("title") Edit Rating - Dashboard
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                 <a href="{{ route('admin.modules') }}" class="font-weight-bold mr-2">Modules</a> <i class="icon-circle-right2 mr-2"></i> <span class="font-weight-bold mr-2"> <a href="{{ route('admin.ratings') }}">Ratings and Reviews </a> </span> <i class="icon-circle-right2 mr-2"></i> Editing Rating and Review
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.updateRating') }}" method="POST" enctype="multipart/form-data">
                        <legend class="font-weight-semibold text-uppercase font-size-sm">
                            <i class="icon-address-book mr-2"></i> Review Details
                        </legend>
                        <input type="hidden" name="id" value="{{ $order_id }}">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Restaurant Rating:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg rating" name="restaurantRating"
                                    value="{{ $restaurantRating }}" placeholder="Restaurant Rating (1-5)" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Delivery Rating:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg rating" name="deliveryRating"
                                    value="{{ $deliveryRating }}" placeholder="Restaurant Rating (1-5)" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Review:</label>
                            <div class="col-lg-9">
                                <textarea name="comment" id="" cols="30" rows="10" class="form-control form-control-lg">{{ $comment }}</textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                            UPDATE
                            <i class="icon-database-insert ml-1"></i>
                            </button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.rating').numeric({allowThouSep:false,  min: 1, max: 5, maxDecimalPlaces: 0 });
    });
</script>
@endsection