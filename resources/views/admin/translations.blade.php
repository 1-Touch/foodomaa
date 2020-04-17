@extends('admin.layouts.master')
@section("title") Translations - Dashboard
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
                <a href="{{ route('admin.newTranslation') }}" class="btn btn-secondary btn-labeled btn-labeled-left">
                <b><i class="icon-plus2"></i></b>
                Add New Langauage
                </a>
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
                            <th>Language Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center"><i class="
                                icon-circle-down2"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($translations as $translation)
                        <tr>
                            <td>{{ $translation->language_name }}</td>
                            <td>@if($translation->is_default) <span class="badge badge-flat border-grey-800 text-default text-capitalize"> DEFAULT </span>@endif
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize">@if($translation->is_active) ACTIVE @else INACTIVE @endif</span></td>
                            <td>{{ $translation->created_at->diffForHumans() }}</td>
                            <td>{{ $translation->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-justified justify-content-center">
                                    <a href="{{ route('admin.editTranslation', $translation->id) }}"
                                        class="badge badge-primary badge-icon"> EDIT <i
                                        class="icon-database-edit2 ml-1"></i></a>
                                    @if($translation->is_active)
                                    <a href="{{ route('admin.disableTranslation', $translation->id) }}" class="badge badge-primary badge-icon ml-1" data-popup="tooltip" title="Disable Translation" data-placement="bottom"> <i class="icon-switch2"></i> </a>
                                    @else
                                    <a href="{{ route('admin.disableTranslation', $translation->id) }}" class="badge badge-danger badge-icon ml-1" data-popup="tooltip" title="Enable Translation" data-placement="bottom"> <i class="icon-switch2"></i> </a>
                                    @endif
                                    
                                    <a href="{{ route('admin.makeDefaultLanguage', $translation->id) }}" class="badge badge-secondary badge-icon ml-1 @if($translation->is_default) badge-success @endif" data-popup="tooltip" title="Make {{ $translation->language_name }} as Default Language" data-placement="bottom"> <i class="icon-checkmark4"></i> </a>
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
@endsection