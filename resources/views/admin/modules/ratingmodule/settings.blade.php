@extends('admin.layouts.master')
@section("title") Rating Module Settings - Dashboard
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4>
                <a href="{{ route('admin.modules') }}" class="font-weight-bold mr-2">Modules</a> <i class="icon-circle-right2 mr-2"></i> <span class="font-weight-bold mr-2">Rating Module Settings</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.updateSettings') }}" method="POST" enctype="multipart/form-data">
                    <legend class="font-weight-semibold text-uppercase font-size-sm">
                        <i class="icon-gear mr-2"></i> Core Settings
                    </legend>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Enable Home Banner? <i class="icon-question3 ml-1" data-popup="tooltip" title="Enabling this will take the latest non-rated user's order and show a banner on the homepage." data-placement="top"></i> </label>
                        <div class="col-lg-9">
                            <div class="checkbox checkbox-switchery mt-2">
                                <label>
                                <input value="true" type="checkbox" class="switchery-primary" @if(config('settings.rarModEnHomeBanner') == "true") checked="checked" @endif name="rarModEnHomeBanner">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Show Restaurant Name? <i class="icon-question3 ml-1" data-popup="tooltip" title="The restaurant name will be shown just before the star icons." data-placement="top"></i> </label>
                        <div class="col-lg-9">
                            <div class="checkbox checkbox-switchery mt-2">
                                <label>
                                <input value="true" type="checkbox" class="switchery-primary" @if(config('settings.rarModShowBannerRestaurantName') == "true") checked="checked" @endif name="rarModShowBannerRestaurantName">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Home Banner Position <i class="icon-question3 ml-1" data-popup="tooltip" title="The review banner will be shown just below the restaurant's position." data-placement="top"></i> </label>
                            <div class="col-lg-6">
                                <select name="rarModHomeBannerPosition" class="form-control form-control-lg" required="required">
                                    <option @if(config('settings.rarModHomeBannerPosition') == "1") selected="selected" @endif value="1">After 1st Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "2") selected="selected" @endif value="2">After 2nd Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "3") selected="selected" @endif value="3">After 3rd Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "4") selected="selected" @endif value="4">After 4th Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "5") selected="selected" @endif value="5">After 5th Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "6") selected="selected" @endif value="6">After 6th Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "7") selected="selected" @endif value="7">After 7th Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "8") selected="selected" @endif value="8">After 8th Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "9") selected="selected" @endif value="9">After 9th Restaurant</option>
                                    <option @if(config('settings.rarModHomeBannerPosition') == "10") selected="selected" @endif value="10">After 10th Restaurant</option>
                                </select>
                            </div>
                    </div>
                    <legend class="font-weight-semibold text-uppercase font-size-sm">
                        <i class="icon-color-sampler mr-2"></i> Design
                    </legend>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Home Banner Background Color:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control colorpicker-show-input" name="rarModHomeBannerBgColor" data-preferred-format="rgb" value="{{ config('settings.rarModHomeBannerBgColor') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Home Banner Text Color:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control colorpicker-show-input" name="rarModHomeBannerTextColor" data-preferred-format="rgb" value="{{ config('settings.rarModHomeBannerTextColor') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Home Banner Stars Color:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control colorpicker-show-input" name="rarModHomeBannerStarsColor" data-preferred-format="rgb" value="{{ config('settings.rarModHomeBannerStarsColor') }}">
                        </div>
                    </div>
                    <legend class="font-weight-semibold text-uppercase font-size-sm">
                        <i class="icon-font-size mr-2"></i> Translations
                    </legend>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Home Banner Text</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarModHomeBannerText"
                                placeholder="Home Banner Text" required value="{{ config('settings.rarModHomeBannerText') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Page Title</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarModRatingPageTitle"
                                placeholder="Page Title" required value="{{ config('settings.rarModRatingPageTitle') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Delivery Rating Title</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarModDeliveryRatingTitle"
                                placeholder="Delivery Rating Title" required value="{{ config('settings.rarModDeliveryRatingTitle') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Restaurant Rating title</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarModRestaurantRatingTitle"
                                placeholder="Restaurant Rating title" required value="{{ config('settings.rarModRestaurantRatingTitle') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Review Box Title</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarReviewBoxTitle"
                                placeholder="Review Box Title" required value="{{ config('settings.rarReviewBoxTitle') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Review Box Placeholder</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarReviewBoxTextPlaceHolderText"
                                placeholder="Review Box Placeholder" required value="{{ config('settings.rarReviewBoxTextPlaceHolderText') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Submit Button Text</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-lg" name="rarSubmitButtonText"
                                placeholder="Submit Button Text" required value="{{ config('settings.rarSubmitButtonText') }}">
                        </div>
                    </div>
                    @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-labeled btn-lg btn-labeled-left">
                            <b><i class="icon-database-insert ml-1"></i></b>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.select').select2({
            minimumResultsForSearch: Infinity,
        });
    
      if (Array.prototype.forEach) {
               var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery-primary'));
               elems.forEach(function(html) {
                   var switchery = new Switchery(html, { color: '#2196F3' });
               });
           }
           else {
               var elems = document.querySelectorAll('.switchery-primary');
               for (var i = 0; i < elems.length; i++) {
                   var switchery = new Switchery(elems[i], { color: '#2196F3' });
               }
           }
    
       $('.form-control-uniform').uniform();

       $(".colorpicker-show-input").spectrum({
         showInput: true
       });
    });
</script>
@endsection