@extends('admin.layouts.master')
@section("title") Users - Dashboard
@endsection
@section('content')
<style>
    #showPassword {
    cursor: pointer;
    padding: 5px;
    border: 1px solid #E0E0E0;
    border-radius: 0.275rem;
    color: #9E9E9E;
    }
    #showPassword:hover {
    color: #616161;
    }
</style>
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                @if(empty($query))
                <span class="font-weight-bold mr-2">TOTAL</span>
                <span class="badge badge-primary badge-pill animated flipInX">{{ $count }}</span>
                @else
                <span class="font-weight-bold mr-2">TOTAL</span>
                <span class="badge badge-primary badge-pill animated flipInX mr-2">{{ $count }}</span>
                <span class="font-weight-bold mr-2">Results for "{{ $query }}"</span>
                @endif
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <button type="button" class="btn btn-secondary btn-labeled btn-labeled-left" id="addNewUser"
                    data-toggle="modal" data-target="#addNewUserModal">
                <b><i class="icon-plus2"></i></b>
                Add New User
                </button>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <form action="{{ route('admin.post.searchUsers') }}" method="GET">
        <div class="form-group form-group-feedback form-group-feedback-right search-box">
            <input type="text" class="form-control form-control-lg search-input"
                placeholder="Search with user name or email..." name="query">
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
                            <th style="width: 20%;">Name</th>
                            <th style="width: 45%">Email</th>
                            <th style="width: 15%;">Created</th>
                            <th style="width: 10%;">Role</th>
                            <th style="width: 10%;">{{ config('settings.walletName') }}</th>
                            <th class="text-center" style="width: 10%;"><i class="
                                icon-circle-down2"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span class="badge badge-flat border-grey-800 text-default text-capitalize">
                                {{ $role->name }}
                                </span> @endforeach
                            </td>
                            <td class="text-center">
                               {{ config('settings.currencyFormat') }} {{ $user->balanceFloat }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.get.editUser', $user->id) }}"
                                    class="badge badge-primary badge-icon"> EDIT <i
                                    class="icon-database-edit2 ml-1"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addNewUserModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="font-weight-bold">Add New User</span></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route("admin.saveNewUser") }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Name:</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" class="form-control form-control-lg"
                                placeholder="Enter Full Name" required autocomplete="new-name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email:</label>
                        <div class="col-lg-9">
                            <input type="text" name="email" class="form-control form-control-lg"
                                placeholder="Enter Email Address" required autocomplete="new-email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Phone:</label>
                        <div class="col-lg-9">
                            <input type="text" name="phone" class="form-control form-control-lg"
                                placeholder="Enter Phone Number" required autocomplete="new-phone">
                        </div>
                    </div>
                    <div class="form-group row form-group-feedback form-group-feedback-right">
                        <label class="col-lg-3 col-form-label">Password:</label>
                        <div class="col-lg-9">
                            <input name="password" type="password" class="form-control form-control-lg" placeholder="Enter Password (min 6 characters)" required
                                autocomplete="new-password">
                        </div>
                        <div class="form-control-feedback form-control-feedback-lg">
                            <span id="showPassword"><i class="icon-unlocked2"></i> Show</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Role:</label>
                        <div class="col-lg-9">
                            <select name="role" class="form-control select" data-fouc>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}" class="text-capitalize">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="deliveryGuyDetails" class="hidden">
                        <legend class="font-weight-semibold text-uppercase font-size-sm">
                            <i class="icon-truck mr-2"></i> Delivery Guy Details
                        </legend>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name or Nick Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg" name="delivery_name" placeholder="Enter Name or Nickname of Delivery Guy"
                                    autocomplete="new-name">
                                    <span class="help-text text-muted">This name will be displayed to the user/customers</span>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Age</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg" name="delivery_age" placeholder="Enter Delivery Guy's Age">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Delivery Guy's Photo:</label>
                            <div class="col-lg-9">
                                <input type="file" class="form-control-uniform" name="delivery_photo" data-fouc>
                                <span class="help-text text-muted">Image size 250x250</span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Description</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg" name="delivery_description" placeholder="Enter Short Description about this Delivery Guy">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Number</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg" name="delivery_vehicle_number" placeholder="Enter Delivery Guy's Vehicle Number">
                            </div>
                        </div>
                        @if(config('settings.enableDeliveryGuyEarning') == 'true')
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Commission Rate %</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-lg commission_rate" name="delivery_commission_rate" placeholder="Commission Rate % (By detault, it's set to 5%)" value="5" required="required">
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                        SAVE
                        <i class="icon-database-insert ml-1"></i></button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.form-control-uniform').uniform();

        $("#showPassword").click(function (e) { 
            $("#newUserPassword").attr("type", "text");
        });
    
        $('.select').select2({
            minimumResultsForSearch: Infinity,
            placeholder: 'Select Role/s (Old roles will be revoked and these roles will be applied)',
        });

         $("[name='role']").change(function(event) {
            if ($(this).val() == "Delivery Guy") {
                $('#deliveryGuyDetails').removeClass('hidden');
                $("[name='delivery_name']").attr('required', 'required');
            }
            else {
                $('#deliveryGuyDetails').addClass('hidden');
                $("[name='delivery_name']").removeAttr('required')
            }
        });
        
        $('.commission_rate').numeric({ allowThouSep:false, maxDecimalPlaces: 2, max: 100, allowMinus: false });
    });
    
</script>
@endsection