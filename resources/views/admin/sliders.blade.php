@extends('admin.layouts.master')
@section("title") Promo Sliders - Dashboard
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
        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <button type="button" class="btn btn-secondary btn-labeled btn-labeled-left" id="addNewSlider"
                    data-toggle="modal" data-target="#addNewSliderModal">
                <b><i class="icon-plus2"></i></b>
                Add New Slider
                </button>
            </div>
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>No. of Slides</th>
                            <th>Position</th>
                            <th>Size</th>
                            <th>Created At</th>
                            <th class="text-center" style="width: 10%;"><i class="
                                icon-circle-down2"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->name }}</td>
                            <td>@if($slider->is_active)
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                Active
                                </span>
                                @else
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                Inactive
                                </span>
                                @endif
                            </td>
                            <td>{{ count($slider->slides) }}</td>
                            @if($slider->position_id == 0)
                            <td>MAIN</td>
                            @endif
                            @if($slider->position_id == 1)
                            <td>After 1st Restaurant</td>
                            @endif
                            @if($slider->position_id == 2)
                            <td>After 2nd Restaurant</td>
                            @endif
                            @if($slider->position_id == 3)
                            <td>After 3rd Restaurant</td>
                            @endif
                            @if($slider->position_id == 4)
                            <td>After 4th Restaurant</td>
                            @endif
                            @if($slider->position_id == 5)
                            <td>After 5th Restaurant</td>
                            @endif
                            @if($slider->position_id == 6)
                            <td>After 6th Restaurant</td>
                            @endif
                            <td>{{ $slider->size }}</td>
                            <td>{{ $slider->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-justified">
                                    <a href="{{ route('admin.get.editSlider', $slider->id) }}"
                                        class="badge badge-primary badge-icon"> EDIT <i
                                        class="icon-database-edit2 ml-1"></i></a>
                                    @if($slider->is_active)
                                    <a href="{{ route('admin.disableSlider', $slider->id) }}" class="badge badge-primary badge-icon ml-1" data-popup="tooltip" title="Disable Slider" data-placement="bottom"> <i class="icon-switch2"></i> </a>
                                    @else
                                    <a href="{{ route('admin.disableSlider', $slider->id) }}" class="badge badge-primary badge-icon ml-1 badge-danger" data-popup="tooltip" title="Enable Slider" data-placement="bottom"> <i class="icon-switch2"></i> </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="addNewSliderModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="font-weight-bold">Add New Slider</span></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.createSlider') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Name:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control form-control-lg" name="name"
                                placeholder="Enter Slider Name" required>
                            <span class="help-text text-muted">The new slider will be INACTIVE by default.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Slider Position:</label>
                        <div class="col-lg-9">
                            <select name="position_id" class="form-control form-control-lg">
                                <option value="0">Main Position</option>
                                <option value="1">After 1st Restaurant</option>
                                <option value="2">After 2nd Restaurant</option>
                                <option value="3">After 3rd Restaurant</option>
                                <option value="4">After 4th Restaurant</option>
                                <option value="5">After 5th Restaurant</option>
                                <option value="6">After 6th Restaurant</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Size:</label>
                        <div class="col-lg-9">
                            <select name="size" class="form-control form-control-lg" required="required">
                                 <option value="1">Extra Small</option>
                                 <option value="2">Small</option>
                                 <option value="3">Medium</option>
                                 <option value="4">Large</option>
                                 <option value="5">Extra Large</option>
                            </select>
                        </div>
                    </div>
                    @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                        SAVE
                        <i class="icon-database-insert ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select').select2({
            minimumResultsForSearch: Infinity,
    });

    $('.slider-size').numeric({ allowThouSep:false, maxDecimalPlaces: 0, allowMinus: false, min:1, max: 5});
</script>
@endsection