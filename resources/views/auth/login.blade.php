@extends("admin.layouts.master")
@section("title")
Login
@endsection
@section("content")
<style>
    .btn-registerBtn {
        background-color: #ffffff;
        color: #2b2b2b;
        border-radius: 0.175rem;
        box-shadow: 0 1px 6px 1px rgba(0,0,0,.05);
        transition: 0.2s linear all !important;
    }
    .btn-registerBtn:hover {
        /*background-color: #fafafa !important;*/
        color: #2b2b2b;
        box-shadow: 0 3px 12px 2px rgba(0,0,0,.10) !important;
        transition: 0.2s linear all !important;
    }
    .btn-registerBtn-selected {
        color: #fff;
        background-color: #FF5722;
    }
    .btn-registerBtn-selected:hover {
        color: #fff;
    }
    .delivery-msg {
        background-color: #ffffff;
        color: #2b2b2b;
        border-radius: 0.175rem;
        box-shadow: 0 3px 12px 2px rgba(0,0,0,.05);
    }
</style>

    <form class="registration-form py-5" action="{{ route('post.login') }}" method="POST" id="loginForm" style="margin: 0 auto 20px auto;">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i
                        class="icon-user-tie icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Login to Dashboard</h5>
                    <span class="d-block text-muted">Enter your credentials below</span>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <label class="d-flex align-items-center">
                        <input type="checkbox" checked="checked" name="remember" class="mr-1" style="height: 1rem; width: 1rem">
                        <span>Remember me?</span>
                    </label>
                </div>
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" style="height: 2.8rem; font-size: 1rem;">Log in <i
                        class="icon-circle-right2 ml-2"></i></button>
                </div>

                <div class="content-divider text-muted form-group"><span> OR </span></div>
                <div class="content d-flex justify-content-center align-items-center mt-3">
                    <button class="btn btn-lg btn-registerBtn mr-2 regButtonDelivery" type="button">Register for Delivery</button>
                    <button class="btn btn-lg btn-registerBtn regButtonResOwn" type="button">Register for Restaurant</button>
                </div>
            </div>
        </div>
    </form>
     <form class="registration-form py-5 hidden" action="{{ route('registerRestaurantDelivery') }}" method="POST" id="regForm" style="margin: 0 auto 20px auto;">
        <input type="hidden" name="role" id="roleValue">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <span id="regIcon">
                         <i class="icon-user-tie icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    </span>
                    <h5 class="mb-0">Registration for <span id="regFor">Restaurant Owner</span></h5>
                    <span class="d-block text-muted">Please fill the form to register</span>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Full Name" name="name" required="required">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Email" name="email" required="required">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="number" class="form-control" placeholder="Phone number" name="phone" min="8" required="required">
                    <div class="form-control-feedback">
                        <i class="icon-mobile text-muted"></i>
                    </div>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
                {!! captcha_img('flat') !!}
                <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required="required">
                    <div class="form-control-feedback">
                        <i class="icon-font-size text-muted"></i>
                    </div>
                </div>
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" style="height: 2.8rem; font-size: 1rem;">Register <i
                        class="icon-circle-right2 ml-2"></i></button>
                </div>

                <div class="content-divider text-muted form-group"><span> OR </span></div>
                <div class="content d-flex justify-content-center align-items-center mt-3">
                    <button class="btn btn-lg btn-registerBtn mr-2 regButtonDelivery" type="button">Register for Delivery</button>
                    <button class="btn btn-lg btn-registerBtn regButtonResOwn" type="button">Register for Restaurant</button>
                </div>

            </div>
        </div>
    </form>


    <script>
        $('.regButtonDelivery').click(function(event) {
            $('.regButtonDelivery').addClass('btn-registerBtn-selected')
            $('.regButtonResOwn').removeClass('btn-registerBtn-selected');
            $('#loginForm').addClass('hidden');
            $('#regForm').removeClass('hidden');
            $('#regFor').html("Delivery Guy")
            $('#roleValue').attr('value', 'DELIVERY');
            $('#regIcon').html("<i class='icon-truck icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1'></i>")

        });
        $('.regButtonResOwn').click(function(event) {
            $('.regButtonResOwn').addClass('btn-registerBtn-selected')
            $('.regButtonDelivery').removeClass('btn-registerBtn-selected');
            $('#loginForm').addClass('hidden');
            $('#regForm').removeClass('hidden');
            $('#regFor').html("Restaurant Owner")
            $('#roleValue').attr('value', 'RESOWN');
            $('#regIcon').html("<i class='icon-store2 icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1'></i>")
        });
    </script>

@if(Session::has('delivery_register_message'))
<div class="d-flex justify-content-center align-items-center mt-3">
     <div class="delivery-msg p-3"><b>SUCCESS!!!</b> You can now login to the delivery application using your phone.</div>
</div>
@endif
@endsection