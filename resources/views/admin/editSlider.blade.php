@extends('admin.layouts.master')
@section("title") Edit Slider - Dashboard
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                <span class="font-weight-bold mr-2">Editing: </span>
                <span class="badge badge-primary badge-pill animated flipInX">{{ $slider->name }}</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="content">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <legend class="font-weight-semibold text-uppercase font-size-sm">
                    <i class="icon-image2 mr-2"></i> Slider Details
                </legend>
                @if(count($slides) == 0)
                <div id="noSlidesContainer">
                    <strong>No Slides</strong>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="addSlide">
                        ADD SLIDE
                        <i class="icon-plus3 ml-1"></i>
                        </button>
                    </div>
                </div>
                @else
                <div class="row">
                    @foreach($slides as $slide)
                    <div class="col-md-3 mb-2">
                        <p class="h5">{{ $slide->name }}</p>
                        <img src="{{ substr(url("/"), 0, strrpos(url("/"), '/')) }}{{ $slide->image }}" alt="{{ $slide->name }}" width="150" height="150">
                        <div class="btn-group btn-group-justified" style="width: 150px">
                            <a href="{{ route('admin.deleteSlide', $slide->id) }}" class="btn btn-danger" data-popup="tooltip" title="Delete Slide" data-placement="bottom"> <i class="icon-trash ml-1"></i> </a>
                            @if($slide->is_active)
                            <a href="{{ route('admin.disableSlide', $slide->id) }}" class="btn btn-secondary" data-popup="tooltip" title="Disable Slide" data-placement="bottom"> <i class="icon-switch2 ml-1"></i> </a>
                            @else
                            <a href="{{ route('admin.disableSlide', $slide->id) }}" class="btn btn-warning" data-popup="tooltip" title="Enable Slide" data-placement="bottom"> <i class="icon-switch2 ml-1"></i> </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="addSlide">
                    ADD SLIDE
                    <i class="icon-plus3 ml-1"></i>
                    </button>
                </div>
                @endif
                <div class="text-left">
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteSliderConfirmModal" id="deleteSliderButton">
                    DELETE SLIDER
                    <i class="icon-trash ml-1"></i>
                    </a>
                </div>
                <form action="{{ route('admin.saveSlide') }}" method="POST" id="slideForm" class="mt-3 hidden" enctype="multipart/form-data">
                    <input type="hidden" class="form-control form-control-lg" name="promo_slider_id" value="{{ $slider->id }}" required>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Slide Name:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Slide Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Slide Image:</label>
                        <div class="col-lg-9">
                            <img class="slider-preview-image hidden"/>
                            <div class="uploader">
                                <input type="file" class="form-control-uniform" name="image" required accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="restaurantURL">
                        <label class="col-lg-3 col-form-label">Link To:</label>
                        <div class="col-lg-9">
                            <select class="form-control form-control-lg" name="url" id="urlInput" required>
                                @foreach($restaurants as $restaurant)
                                    <option value="restaurants/{{ $restaurant->slug }}">{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                            <div id="urlHelpBlockContainer" class="hidden">
                                <p class="help-block text-muted mb-0">Your URL will be: </p>
                                <span class="help-block" id="baseURL"></span><strong><span id="appendURL"></span></strong>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md btn-primary" id="enterCustomURL" type="button">Enter Custom URL</button>
                    <div class="form-group row hidden" id="customURL">
                       <label class="col-lg-3 col-form-label">Custom URL:</label>
                        <div class="col-lg-9">
                            <input type="url" class="form-control form-control-lg" name="customUrl" id="customUrl" placeholder="Enter your custom URL">
                            <span class="help-text">Enter full URL with http:// or https://</span>
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
<div id="deleteSliderConfirmModal" class="modal fade mt-5" tabindex="-1">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="font-weight-bold">Are you sure?</span></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <span class="help-text">Be careful, all the slides associated with this slider will also be permanently deleted. <br> You can use the "<strong>DISABLE</strong>" feature to temporarily disable the Slider.</span>
                <div class="modal-footer mt-4">
                    <a href="{{ route('admin.deleteSlider', $slider->id) }}" class="btn btn-primary">Yes</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('.slider-preview-image')
                    .removeClass('hidden')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function () {
        $("#showPassword").click(function (e) { 
            $("#passwordInput").attr("type", "text");
        });
        $('.select').select2({
            minimumResultsForSearch: Infinity,
        });
    
       $('.form-control-uniform').uniform();
    
        $("#addSlide").click(function(event) {
            $("#slideForm").removeClass('hidden');
            $("#noSlidesContainer").remove();
            $(this).remove();
        });
    
        $("#urlInput").on("change paste keyup", function() {
            $("#urlHelpBlockContainer").removeClass('hidden');
            $("#appendURL").html($(this).val());
        });
    
         let URL = "{{ url("/") }}";
         URL = URL.substring(0, URL.lastIndexOf("/") + 1);
         $("#baseURL").html(URL);

         /*handle custom url click */ 
         $('#enterCustomURL').click(function(event) {
            $(this).hide();
            $('#customURL').removeClass('hidden');
            $('#restaurantURL').addClass('hidden');
            $('#urlInput').removeAttr('required');
            $('#customUrl').attr('required', 'required');
         });
    });
</script>
@endsection