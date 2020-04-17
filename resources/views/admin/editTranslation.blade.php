@extends('admin.layouts.master')
@section("title") Edit Translation - Dashboard
@endsection
@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-circle-right2 mr-2"></i>
                <span class="font-weight-bold mr-2">Editing Language</span>
                <span class="badge badge-primary badge-pill animated flipInX">{{ $language_name }}</span>
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.updateTranslation') }}" method="POST" enctype="multipart/form-data">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                    Save Translation
                    <i class="icon-database-insert ml-1"></i>
                    </button>
                </div>
                <input type="hidden" name="translation_id" value="{{ $translation_id }}">
                <div class="form-group row mt-3">
                    <label class="col-lg-3 col-form-label"><strong>Language Name</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="language_name" placeholder="Enter new language name" required="required" value="{{ $language_name }}">
                    </div>
                </div>
                <hr>
                <!-- DESKTOP -->
                <button class="btn btn-primary translation-section-btn" type="button"> <i class="icon-display4 mr-1"></i>Desktop Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Heading</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopHeading"
                            value="{{ $data->desktopHeading }}" placeholder="Heading Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Sub Heading</strong></label>
                    <div class="col-lg-9">
                        <textarea class="summernote-editor" name="desktopSubHeading" placeholder="Sub Heading Text" rows="6">{{ $data->desktopSubHeading }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Use App Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopUseAppButton"
                            value="{{ $data->desktopUseAppButton }}" placeholder="Use App Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement One Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementOneTitle"
                            value="{{ $data->desktopAchievementOneTitle }}" placeholder="Achievement One Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement One Sub Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementOneSub"
                            value="{{ $data->desktopAchievementOneSub }}" placeholder="Achievement One Sub Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement Two Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementTwoTitle"
                            value="{{ $data->desktopAchievementTwoTitle }}" placeholder="Achievement Two Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement Two Sub Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementTwoSub"
                            value="{{ $data->desktopAchievementTwoSub }}" placeholder="Achievement Two Sub Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement Three Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementThreeTitle"
                            value="{{ $data->desktopAchievementThreeTitle }}" placeholder="Achievement Four Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement Three Sub Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementThreeSub"
                            value="{{ $data->desktopAchievementThreeSub }}" placeholder="Achievement Three Sub Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement Four Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementFourTitle"
                            value="{{ $data->desktopAchievementFourTitle }}" placeholder="Achievement Four Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Achievement Four Sub Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopAchievementFourSub"
                            value="{{ $data->desktopAchievementFourSub }}" placeholder="Achievement Sub Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Footer Address</strong></label>
                    <div class="col-lg-9">
                        <textarea class="summernote-editor" name="desktopFooterAddress">{{ $data->desktopFooterAddress }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Social Heading Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopFooterSocialHeader"
                            value="{{ $data->desktopFooterSocialHeader }}" placeholder="Social Heading Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Facebook Link</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopSocialFacebookLink"
                            value="{{ $data->desktopSocialFacebookLink }}" placeholder="Facebook Link (Icon won't be shown if left empty)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Google Plus Link</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopSocialGoogleLink"
                            value="{{ $data->desktopSocialGoogleLink }}" placeholder="Google Plus Link (Icon won't be shown if left empty)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Youtube Link</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopSocialYoutubeLink"
                            value="{{ $data->desktopSocialYoutubeLink }}" placeholder="Youtube Link (Icon won't be shown if left empty)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Instagram Link</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="desktopSocialInstagramLink"
                            value="{{ $data->desktopSocialInstagramLink }}" placeholder="Instagram Link (Icon won't be shown if left empty)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>GDPR Message</strong></label>
                    <div class="col-lg-9">
                        <textarea class="summernote-editor" name="gdprMessage">{{ $data->gdprMessage }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>GDPR Confirm Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="gdprConfirmButton"
                            value="{{ $data->gdprConfirmButton }}" placeholder="GDPR Confirm Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Change Language Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="changeLanguageText"
                            value="@if (!empty($data->changeLanguageText)) {{ $data->changeLanguageText }}@else{{ config('settings.changeLanguageText') }}@endif" placeholder="Change Language Text">
                    </div>
                </div>
                <!-- END DESKTOP -->
                <!-- MOBILE -->
                <!-- First Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>First Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Heading</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenHeading"
                            value="{{ $data->firstScreenHeading }}" placeholder="First Screen Heading">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Sub Heading</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenSubHeading"
                            value="{{ $data->firstScreenSubHeading }}" placeholder="First Screen Sub Heading">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Setup Locaion Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenSetupLocation"
                            value="{{ $data->firstScreenSetupLocation }}" placeholder="Setup Location Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Welcome Message Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenWelcomeMessage"
                            value="{{ $data->firstScreenWelcomeMessage }}" placeholder="Welcome Message Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenLoginText"
                            value="{{ $data->firstScreenLoginText }}" placeholder="Login Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenLoginBtn"
                            value="{{ $data->firstScreenLoginBtn }}" placeholder="Login Button Text">
                    </div>
                </div>
                <!-- END First Screen Settings -->
                <!-- Login Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Login/Register Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Error Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginErrorMessage"
                            value="{{ $data->loginErrorMessage }}" placeholder="Login Error Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Please Wait Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="pleaseWaitText"
                            value="{{ $data->pleaseWaitText }}" placeholder="Please Wait Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Title</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginLoginTitle"
                            value="{{ $data->loginLoginTitle }}" placeholder="Login Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login SubTitle Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginLoginSubTitle"
                            value="{{ $data->loginLoginSubTitle }}" placeholder="Login SubTitle Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Email Label Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginLoginEmailLabel"
                            value="{{ $data->loginLoginEmailLabel }}" placeholder="Login Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Password Label Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginLoginPasswordLabel"
                            value="{{ $data->loginLoginPasswordLabel }}" placeholder="Login Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login Dont have Account</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginDontHaveAccount"
                            value="{{ $data->loginDontHaveAccount }}" placeholder="Login Dont have Account">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Register Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="firstScreenRegisterBtn"
                            value="{{ $data->firstScreenRegisterBtn }}" placeholder="Register Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Register Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="registerRegisterTitle"
                            value="{{ $data->registerRegisterTitle }}" placeholder="Register Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Register SubTitle Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="registerRegisterSubTitle"
                            value="{{ $data->registerRegisterSubTitle }}" placeholder="Register SubTitle Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Register Name Label Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginLoginNameLabel"
                            value="{{ $data->loginLoginNameLabel }}" placeholder="Register Name Label Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Register Phone Label Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="loginLoginPhoneLabel"
                            value="{{ $data->loginLoginPhoneLabel }}" placeholder="Register Phone Label Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Register Already Have Account</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="regsiterAlreadyHaveAccount"
                            value="{{ $data->regsiterAlreadyHaveAccount }}" placeholder="Register Already Have Account">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Required Fields Validation Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="fieldValidationMsg"
                            value="{{ $data->fieldValidationMsg }}" placeholder="Field Required Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Name Validation Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="nameValidationMsg"
                            value="{{ $data->nameValidationMsg }}" placeholder="Name Validation Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Email Validation Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="emailValidationMsg"
                            value="{{ $data->emailValidationMsg }}" placeholder="Email Validation Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Phone Validation Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="phoneValidationMsg"
                            value="{{ $data->phoneValidationMsg }}" placeholder="Phone Validation Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Phone & Password Min Length Validation Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="minimumLengthValidationMessage"
                            value="{{ $data->minimumLengthValidationMessage }}" placeholder="Phone & Password Min Length Validation Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Email/Phone Already Registered Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="emailPhoneAlreadyRegistered"
                            value="{{ $data->emailPhoneAlreadyRegistered }}" placeholder="Email/Phone Already Registered Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Email and Password donot match</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="emailPassDonotMatch"
                            value="{{ $data->emailPassDonotMatch }}" placeholder="Email and Password donot match">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Enter Phone Number to Verify Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="enterPhoneToVerify"
                            value="{{ $data->enterPhoneToVerify }}" placeholder="Enter Phone Number Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Invalid OTP Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="invalidOtpMsg"
                            value="{{ $data->invalidOtpMsg }}" placeholder="Invalid OTP Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>OTP Sent Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="otpSentMsg"
                            value="{{ $data->otpSentMsg }}" placeholder="OTP Sent Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Resend OTP Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="resendOtpMsg"
                            value="{{ $data->resendOtpMsg }}" placeholder="Resend OTP Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Resend OTP Countdown Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="resendOtpCountdownMsg"
                            value="{{ $data->resendOtpCountdownMsg }}" placeholder="Resend OTP Countdown Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Verify OTP Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="verifyOtpBtnText"
                            value="{{ $data->verifyOtpBtnText }}" placeholder="Verify OTP Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Social Login 'Hi' Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="socialWelcomeText"
                            value="{{ $data->socialWelcomeText }}" placeholder="Social Login 'Hi' Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Social Login OR Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="socialLoginOrText"
                            value="{{ $data->socialLoginOrText }}" placeholder="Social Login OR Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Forgot Password Link Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="forgotPasswordLinkText" value="@if (!empty($data->forgotPasswordLinkText)) {{ $data->forgotPasswordLinkText }}@else{{ config('settings.forgotPasswordLinkText') }}@endif" placeholder="Forgot Password Link Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Reset Password Page Title</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="resetPasswordPageTitle" value="@if (!empty($data->resetPasswordPageTitle)) {{ $data->resetPasswordPageTitle }}@else{{ config('settings.resetPasswordPageTitle') }}@endif" placeholder="Reset Password Page Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Reset Password Page Sub Title</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="resetPasswordPageSubTitle" value="@if (!empty($data->resetPasswordPageSubTitle)) {{ $data->resetPasswordPageSubTitle }}@else{{ config('settings.resetPasswordPageSubTitle') }}@endif" placeholder="Reset Password Page Sub Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>User Not Found Error Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="userNotFoundErrorMessage" value="@if (!empty($data->userNotFoundErrorMessage)) {{ $data->userNotFoundErrorMessage }}@else{{ config('settings.userNotFoundErrorMessage') }}@endif" placeholder="User Not Found Error Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Invalid Reset OTP Error Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="invalidOtpErrorMessage" value="@if (!empty($data->invalidOtpErrorMessage)) {{ $data->invalidOtpErrorMessage }}@else{{ config('settings.invalidOtpErrorMessage') }}@endif" placeholder="Invalid Reset OTP Error Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Send OTP Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="sendOtpOnEmailButtonText" value="@if (!empty($data->sendOtpOnEmailButtonText)) {{ $data->sendOtpOnEmailButtonText }}@else{{ config('settings.sendOtpOnEmailButtonText') }}@endif" placeholder="Send OTP Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Already Have OTP Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="alreadyHaveResetOtpButtonText" value="@if (!empty($data->alreadyHaveResetOtpButtonText)) {{ $data->alreadyHaveResetOtpButtonText }}@else{{ config('settings.alreadyHaveResetOtpButtonText') }}@endif" placeholder="Already Have OTP Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Dont Have OTP Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="dontHaveResetOtpButtonText" value="@if (!empty($data->dontHaveResetOtpButtonText)) {{ $data->dontHaveResetOtpButtonText }}@else{{ config('settings.dontHaveResetOtpButtonText') }}@endif" placeholder="Dont Have OTP Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Enter Reset OTP Label Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="enterResetOtpMessageText" value="@if (!empty($data->enterResetOtpMessageText)) {{ $data->enterResetOtpMessageText }}@else{{ config('settings.enterResetOtpMessageText') }}@endif" placeholder="Enter Reset OTP Label Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Verify Reset OTP Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="verifyResetOtpButtonText" value="@if (!empty($data->verifyResetOtpButtonText)) {{ $data->verifyResetOtpButtonText }}@else{{ config('settings.verifyResetOtpButtonText') }}@endif" placeholder="Verify Reset OTP Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Enter New Password Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="enterNewPasswordText" value="@if (!empty($data->enterNewPasswordText)) {{ $data->enterNewPasswordText }}@else{{ config('settings.enterNewPasswordText') }}@endif" placeholder="Enter New Password Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>New Password Label Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="newPasswordLabelText" value="@if (!empty($data->newPasswordLabelText)) {{ $data->newPasswordLabelText }}@else{{ config('settings.newPasswordLabelText') }}@endif" placeholder="New Password Label Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Set New Password Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="setNewPasswordButtonText" value="@if (!empty($data->setNewPasswordButtonText)) {{ $data->setNewPasswordButtonText }}@else{{ config('settings.setNewPasswordButtonText') }}@endif" placeholder="Set New Password Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Login/Registration Policy Message</strong></label>
                    <div class="col-lg-9">
                        <textarea class="summernote-editor" name="registrationPolicyMessage" placeholder="Sub Heading Text" rows="6">@if (!empty($data->registrationPolicyMessage)) {{ $data->registrationPolicyMessage }}@else{{ config('settings.registrationPolicyMessage') }}@endif</textarea>
                    </div>
                </div>
                <!-- END Login Screen Settings-->
                <!-- HomePage Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>HomePage Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryTypeDelivery"
                            value="{{ $data->deliveryTypeDelivery }}" placeholder="Delivery Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Self Pickup Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryTypeSelfPickup"
                            value="{{ $data->deliveryTypeSelfPickup }}" placeholder="Self Pickup Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No Restaurant Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="noRestaurantMessage"
                            value="{{ $data->noRestaurantMessage }}" placeholder="No Restaurant Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant Count Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="restaurantCountText"
                            value="{{ $data->restaurantCountText }}" placeholder="Restaurant Count Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Featured Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="restaurantFeaturedText"
                            value="{{ $data->restaurantFeaturedText }}" placeholder="Restaurant Featured Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Mins Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="homePageMinsText"
                            value="{{ $data->homePageMinsText }}" placeholder="Mins Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>For Two Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="homePageForTwoText"
                            value="{{ $data->homePageForTwoText }}" placeholder="For Two Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Footer Near Me Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="footerNearme"
                            value="{{ $data->footerNearme }}" placeholder="Footer Near Me Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Footer Explore Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="footerExplore"
                            value="{{ $data->footerExplore }}" placeholder="Footer ExploreText">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Footer Cart Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="footerCart"
                            value="{{ $data->footerCart }}" placeholder="Footer Cart Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Footer Account Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="footerAccount"
                            value="{{ $data->footerAccount }}" placeholder="Footer Account Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Footer Alerts Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="footerAlerts"
                            value="@if (!empty($data->footerAlerts)) {{ $data->footerAlerts }}@else{{ config('settings.footerAlerts') }}@endif" placeholder="Footer Alerts Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No Results Found Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="exploreNoResults"
                            value="@if (!empty($data->exploreNoResults)) {{ $data->exploreNoResults }}@else{{ config('settings.exploreNoResults') }}@endif" placeholder="Footer Account Text">
                    </div>
                </div>
                <!--END HomePage Screen Settings -->
                <!-- Alerts Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Alerts Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Mark All Read Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="markAllAlertReadText"
                            value="@if (!empty($data->markAllAlertReadText)) {{ $data->markAllAlertReadText }}@else{{ config('settings.markAllAlertReadText') }}@endif" placeholder="Mark All Read Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No New Alerts Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="noNewAlertsText"
                            value="@if (!empty($data->noNewAlertsText)) {{ $data->noNewAlertsText }}@else{{ config('settings.noNewAlertsText') }}@endif" placeholder="No New Alerts Text">
                    </div>
                </div>
                <!-- END Alerts Screen Settings -->
                <!-- Explore Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Explore Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant Search Placeholder Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="restaurantSearchPlaceholder"
                            value="{{ $data->restaurantSearchPlaceholder }}" placeholder="Restaurant Search Placeholder Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurants Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="exploreRestautantsText"
                            value="{{ $data->exploreRestautantsText }}" placeholder="Restaurants Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Items Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="exploreItemsText"
                            value="{{ $data->exploreItemsText }}" placeholder="Items Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Enter At Least 3 Characters Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="searchAtleastThreeCharsMsg"
                            value="{{ $data->searchAtleastThreeCharsMsg }}" placeholder="Enter At Least 3 Characters Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Explore Item's By Restaurant Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="exlporeByRestaurantText" value="@if (!empty($data->exlporeByRestaurantText)) {{ $data->exlporeByRestaurantText }}@else{{ config('settings.exlporeByRestaurantText') }}@endif" placeholder="Explore Item's By Restaurant Text">
                    </div>
                </div>
                <!-- END Explore Screen Settings -->
                <!-- Items Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Items Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Recommended Badge Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="recommendedBadgeText"
                            value="{{ $data->recommendedBadgeText }}" placeholder="Recommended Badge Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Popular Item Badge Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="popularBadgeText"
                            value="{{ $data->popularBadgeText }}" placeholder="Popular Item Badge Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>New Item Badge Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="newBadgeText"
                            value="{{ $data->newBadgeText }}" placeholder="New Item Badge Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Recommended Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemsPageRecommendedText"
                            value="{{ $data->itemsPageRecommendedText }}" placeholder="Recommended Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Fixed Cart View Cart Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="floatCartViewCartText"
                            value="{{ $data->floatCartViewCartText }}" placeholder="Fixed Cart View Cart Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Fixed Cart Items Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="floatCartItemsText"
                            value="{{ $data->floatCartItemsText }}" placeholder="Fixed Cart Items Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Customizable Item Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="customizableItemText"
                            value="{{ $data->customizableItemText }}" placeholder="Customization Heading">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Customization Heading</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="customizationHeading"
                            value="{{ $data->customizationHeading }}" placeholder="Customization Heading">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Customizable Done Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="customizationDoneBtnText"
                            value="{{ $data->customizationDoneBtnText }}" placeholder="Customizable Done Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Pure Veg Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="pureVegText"
                            value="{{ $data->pureVegText }}" placeholder="Pure Veg Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Certificate Code Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="certificateCodeText"
                            value="{{ $data->certificateCodeText }}" placeholder="Certificate Code Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Show More Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="showMoreButtonText"
                            value="{{ $data->showMoreButtonText }}" placeholder="Show More Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Show Less Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="showLessButtonText"
                            value="{{ $data->showLessButtonText }}" placeholder="Show Less Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Not Accepting Orders Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="notAcceptingOrdersMsg"
                            value="{{ $data->notAcceptingOrdersMsg }}" placeholder="Not Accepting Orders Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Item Search Placeholder Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemSearchPlaceholder"
                            value="@if (!empty($data->itemSearchPlaceholder)) {{ $data->itemSearchPlaceholder }}@else{{ config('settings.itemSearchPlaceholder') }}@endif" placeholder="Item Search Placeholder Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Item Search Reuslts Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemSearchText"
                            value="@if (!empty($data->itemSearchText)) {{ $data->itemSearchText }}@else{{ config('settings.itemSearchText') }}@endif" placeholder="Item Search Reuslts Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Item Search No Results Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemSearchNoResultText"
                            value="@if (!empty($data->itemSearchNoResultText)) {{ $data->itemSearchNoResultText }}@else{{ config('settings.itemSearchNoResultText') }}@endif" placeholder="Item Search No Results Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Item Menu Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemsMenuButtonText"
                            value="@if (!empty($data->itemsMenuButtonText)) {{ $data->itemsMenuButtonText }}@else{{ config('settings.itemsMenuButtonText') }}@endif" placeholder="Item Menu Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Item Percentage Discount Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemPercentageDiscountText"
                            value="@if (!empty($data->itemPercentageDiscountText)) {{ $data->itemPercentageDiscountText }}@else{{ config('settings.itemPercentageDiscountText') }}@endif" placeholder="Item Percentage Discount Text">
                    </div>
                </div>
                <!--END Items Screen Settings -->
                <!-- Cart Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Cart Screen Settings </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartPageTitle"
                            value="{{ $data->cartPageTitle }}" placeholder="Cart Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Items In Cart Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartItemsInCartText"
                            value="{{ $data->cartItemsInCartText }}" placeholder="Items In Cart Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Empty Cart Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartEmptyText"
                            value="{{ $data->cartEmptyText }}" placeholder="Empty Cart Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Suggestions Placeholder Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartSuggestionPlaceholder"
                            value="{{ $data->cartSuggestionPlaceholder }}" placeholder="Cart Suggestions Placeholder Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Coupon Placeholder Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartCouponText"
                            value="{{ $data->cartCouponText }}" placeholder="Cart Coupon Placeholder Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Applied Coupon Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartApplyCoupon"
                            value="{{ $data->cartApplyCoupon }}" placeholder="Applied Coupon Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Invalid Coupon Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartInvalidCoupon"
                            value="{{ $data->cartInvalidCoupon }}" placeholder="Invalid Coupon Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Coupon Off Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartCouponOffText"
                            value="{{ $data->cartCouponOffText }}" placeholder="Coupon Off Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Bill Details Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartBillDetailsText"
                            value="{{ $data->cartBillDetailsText }}" placeholder="Cart Bill Details Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Total Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartItemTotalText"
                            value="{{ $data->cartItemTotalText }}" placeholder="Cart Total Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart To Pay Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartToPayText"
                            value="{{ $data->cartToPayText }}" placeholder="Cart To Pay Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Charges Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartDeliveryCharges"
                            value="{{ $data->cartDeliveryCharges }}" placeholder="Delivery Charges Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant Charges Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartRestaurantCharges"
                            value="{{ $data->cartRestaurantCharges }}" placeholder="Restaurant Charges Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Select Your Address Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartSetYourAddress"
                            value="{{ $data->cartSetYourAddress }}" placeholder="Cart Select Your Address Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>New Address Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="buttonNewAddress"
                            value="{{ $data->buttonNewAddress }}" placeholder="New Address Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Change Location Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartChangeLocation"
                            value="{{ $data->cartChangeLocation }}" placeholder="Cart Change Location Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Deliver To Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartDeliverTo"
                            value="{{ $data->cartDeliverTo }}" placeholder="Cart Deliver To Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Select Payment Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutSelectPayment"
                            value="{{ $data->checkoutSelectPayment }}" placeholder="Select Payment Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Login Header Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartLoginHeader"
                            value="{{ $data->cartLoginHeader }}" placeholder="Cart Login Header Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Login Sub Header Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartLoginSubHeader"
                            value="{{ $data->cartLoginSubHeader }}" placeholder="Cart Login Sub Header">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cart Login Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartLoginButtonText"
                            value="{{ $data->cartLoginButtonText }}" placeholder="Cart Login Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Self Pikcup Selected Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="selectedSelfPickupMessage"
                            value="{{ $data->selectedSelfPickupMessage }}" placeholder="Self Pikcup Selected Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Tax Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="taxText"
                            value="{{ $data->taxText }}" placeholder="Tax Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Items Removed Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="itemsRemovedMsg"
                            value="{{ $data->itemsRemovedMsg }}" placeholder="Items Removed Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>On-going Order Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="ongoingOrderMsg"
                            value="{{ $data->ongoingOrderMsg }}" placeholder="On-going Order Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant Not Operational Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cartRestaurantNotOperational"
                            value="{{ $data->cartRestaurantNotOperational }}" placeholder="Restaurant Not Operational Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Min Order Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="restaurantMinOrderMessage"
                            value="@if (!empty($data->restaurantMinOrderMessage)) {{ $data->restaurantMinOrderMessage }}@else{{ config('settings.restaurantMinOrderMessage') }}@endif" placeholder="Min Order Message">
                    </div>
                </div>
                <!-- END Cart Screen Settings -->
                <!-- Checkout Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Checkout Screen Settings </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Checkout Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutPageTitle"
                            value="{{ $data->checkoutPageTitle }}" placeholder="Checkout Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Checkout Payment List Title Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutPaymentListTitle"
                            value="{{ $data->checkoutPaymentListTitle }}" placeholder="Checkout Payment List Title Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Checkout Payment In Process Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutPaymentInProcess"
                            value="{{ $data->checkoutPaymentInProcess }}" placeholder="Checkout Payment In Process Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Stripe Text Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutStripeText"
                            value="{{ $data->checkoutStripeText }}" placeholder="Stripe Text Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Stripe Sub Text Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutStripeSubText"
                            value="{{ $data->checkoutStripeSubText }}" placeholder="Stripe Sub Text Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cash On Delivery Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutCodText"
                            value="{{ $data->checkoutCodText }}" placeholder="Cash On Delivery Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Cash On Delivery Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutCodSubText"
                            value="{{ $data->checkoutCodSubText }}" placeholder="Cash On Delivery Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>PayStack Payment Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="paystackPayText"
                            value="{{ $data->paystackPayText }}" placeholder="PayStack Payment Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Razorpay Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutRazorpayText"
                            value="{{ $data->checkoutRazorpayText }}" placeholder="Razorpay Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Razorpay Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="checkoutRazorpaySubText"
                            value="{{ $data->checkoutRazorpaySubText }}" placeholder="Razorpay Sub Text">
                    </div>
                </div>
                <!-- END Checkout Screen Settings -->
                <!-- Running Order Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Running Order Screen Settings </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Placed Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderPlacedTitle"
                            value="{{ $data->runningOrderPlacedTitle }}" placeholder="Order Placed Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Placed Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderPlacedSub"
                            value="{{ $data->runningOrderPlacedSub }}" placeholder="Order Placed Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Preparing Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderPreparingTitle"
                            value="{{ $data->runningOrderPreparingTitle }}" placeholder="Order Preparing Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Preparing Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderPreparingSub"
                            value="{{ $data->runningOrderPreparingSub }}" placeholder="Order Preparing Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>On Way Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderOnwayTitle"
                            value="{{ $data->runningOrderOnwayTitle }}" placeholder="On Way Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>On Way Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderOnwaySub"
                            value="{{ $data->runningOrderOnwaySub }}" placeholder="On Way Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Assigned Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderDeliveryAssignedTitle"
                            value="{{ $data->runningOrderDeliveryAssignedTitle }}" placeholder="Delivery Assigned Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Assigned Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderDeliveryAssignedSub"
                            value="{{ $data->runningOrderDeliveryAssignedSub }}" placeholder="Delivery Assigned Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Canceled Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderCanceledTitle"
                            value="{{ $data->runningOrderCanceledTitle }}" placeholder="Order Canceled Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Canceled Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderCanceledSub"
                            value="{{ $data->runningOrderCanceledSub }}" placeholder="Order Canceled Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Ready for Pickup Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderReadyForPickup"
                            value="{{ $data->runningOrderReadyForPickup }}" placeholder="Order Ready for Pickup Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Ready for Pickup Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderReadyForPickupSub"
                            value="{{ $data->runningOrderReadyForPickupSub }}" placeholder="Order Ready for Pickup Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Delivered Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderDelivered"
                            value="@if(!empty($data->runningOrderDelivered)){{ $data->runningOrderDelivered }}@else{{ config('settings.runningOrderDelivered') }}@endif" placeholder="Order Delivered Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Delivered Sub Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderDeliveredSub"
                            value="@if(!empty($data->runningOrderDeliveredSub)){{ $data->runningOrderDeliveredSub }}@else{{ config('settings.runningOrderDeliveredSub') }}@endif" placeholder="Order Delivered Sub Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Refresh Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderRefreshButton"
                            value="{{ $data->runningOrderRefreshButton }}" placeholder="Refresh Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Guy Text after Name</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryGuyAfterName"
                            value="{{ $data->deliveryGuyAfterName }}" placeholder="Delivery Guy Text after Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Vehicle Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="vehicleText"
                            value="{{ $data->vehicleText }}" placeholder="Vehicle Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Call Now Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="callNowButton"
                            value="{{ $data->callNowButton }}" placeholder="Call Now Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Allow Location Access Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="allowLocationAccessMessage"
                            value="{{ $data->allowLocationAccessMessage }}" placeholder="Allow Location Access Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Track Order Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="trackOrderText"
                            value="{{ $data->trackOrderText }}" placeholder="Track Order Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Placed Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderPlacedStatusText"
                            value="{{ $data->orderPlacedStatusText }}" placeholder="Order Placed Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Preparing Order Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="preparingOrderStatusText"
                            value="{{ $data->preparingOrderStatusText }}" placeholder="Preparing Order Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Guy Assigned Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryGuyAssignedStatusText"
                            value="{{ $data->deliveryGuyAssignedStatusText }}" placeholder="Delivery Guy Assigned Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Picked Up Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderPickedUpStatusText"
                            value="{{ $data->orderPickedUpStatusText }}" placeholder="Order Picked Up Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivered Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveredStatusText"
                            value="{{ $data->deliveredStatusText }}" placeholder="Delivered Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Canceled Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="canceledStatusText"
                            value="{{ $data->canceledStatusText }}" placeholder="Canceled Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Ready For Pickup Status Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="readyForPickupStatusText"
                            value="{{ $data->readyForPickupStatusText }}" placeholder="Ready for Pickup Status Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant New Order Notification Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="restaurantNewOrderNotificationMsg"
                            value="{{ $data->restaurantNewOrderNotificationMsg }}" placeholder="Restaurant New Order Notification Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant New Order Notification Message Sub</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="restaurantNewOrderNotificationMsgSub"
                            value="{{ $data->restaurantNewOrderNotificationMsgSub }}" placeholder="Restaurant New Order Notification Message Sub">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Guy New Order Notification Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryGuyNewOrderNotificationMsg"
                            value="{{ $data->deliveryGuyNewOrderNotificationMsg }}" placeholder="Delivery Guy New Order Notification Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Guy New Order Notification Message Sub</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryGuyNewOrderNotificationMsgSub"
                            value="{{ $data->deliveryGuyNewOrderNotificationMsgSub }}" placeholder="Delivery Guy New Order Notification Message Sub">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Pin Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="runningOrderDeliveryPin"
                            value="{{ $data->runningOrderDeliveryPin }}" placeholder="Delivery Pin Text">
                    </div>
                </div>
                <!-- END Running Order Screen Settings -->
                <!-- Account Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Account Screen Settings </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>My Account Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="accountMyAccount"
                            value="{{ $data->accountMyAccount }}" placeholder="My Account Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Manage Address Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="accountManageAddress"
                            value="{{ $data->accountManageAddress }}" placeholder="Manage Address Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Does Not Deliver To Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="addressDoesnotDeliverToText"
                            value="{{ $data->addressDoesnotDeliverToText }}" placeholder="Does Not Deliver To Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>My Orders Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="accountMyOrders"
                            value="{{ $data->accountMyOrders }}" placeholder="My Orders Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Helo & FAQ Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="accountHelpFaq"
                            value="{{ $data->accountHelpFaq }}" placeholder="Helo & FAQ Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Logout Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="accountLogout"
                            value="{{ $data->accountLogout }}" placeholder="Logout Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>My Wallet Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="accountMyWallet"
                            value="{{ $data->accountMyWallet }}" placeholder="My Wallet Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No Orders Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="noOrdersText"
                            value="{{ $data->noOrdersText }}" placeholder="No Orders Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Canceled Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderCancelledText"
                            value="{{ $data->orderCancelledText }}" placeholder="Order Canceled Text">
                    </div>
                </div>
                <!-- END Account Screen Settings -->
                <!-- Search Location Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Search Location Screen Settings </button>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Search Location Placeholder Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="searchAreaPlaceholder"
                            value="{{ $data->searchAreaPlaceholder }}" placeholder="Search Location Placeholder Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Search Popular Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="searchPopularPlaces"
                            value="{{ $data->searchPopularPlaces }}" placeholder="Search Popular Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Use Current Location Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="useCurrentLocationText"
                            value="{{ $data->useCurrentLocationText }}" placeholder="Use Current Location Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>GPS Access not Granted Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="gpsAccessNotGrantedMsg"
                            value="{{ $data->gpsAccessNotGrantedMsg }}" placeholder="GPS Access not Granted Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Your Location Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="yourLocationText"
                            value="{{ $data->yourLocationText }}" placeholder="Your Location Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Address Field Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="editAddressAddress"
                            value="{{ $data->editAddressAddress }}" placeholder="Address Field Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Edit Address Tag</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="editAddressTag"
                            value="{{ $data->editAddressTag }}" placeholder="Edit Address Tag">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Address Tag Placeholder</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="addressTagPlaceholder"
                            value="{{ $data->addressTagPlaceholder }}" placeholder="Address Tag Placeholder">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Save Address Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="buttonSaveAddress"
                            value="{{ $data->buttonSaveAddress }}" placeholder="Save Address Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Saved Addresses (Location page)</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="locationSavedAddresses" value="@if (!empty($data->locationSavedAddresses)) {{ $data->locationSavedAddresses }}@else{{ config('settings.locationSavedAddresses') }}@endif" placeholder="Saved Addresses">
                    </div>
                </div>
                <!-- END Search Location Screen Settings -->
                <!--  Address Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Address Screen Settings </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delete Address Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deleteAddressText"
                            value="{{ $data->deleteAddressText }}" placeholder="Delete Address Button">
                    </div>
                </div>
                <!-- END Address Screen Settings -->
                <hr>
                <!--  Wallet Translations -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Wallet Translations </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No Wallet Transactions Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="noWalletTransactionsText"
                            value="{{ $data->noWalletTransactionsText }}" placeholder="No Wallet Transactions Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Deposit Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="walletDepositText"
                            value="{{ $data->walletDepositText }}" placeholder="Wallet Deposit Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Withdraw Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="walletWithdrawText"
                            value="{{ $data->walletWithdrawText }}" placeholder="Wallet Withdraw Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Pay Partial with Wallet Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="payPartialWithWalletText"
                            value="{{ $data->payPartialWithWalletText }}" placeholder="Pay Partial with Wallet Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet money Will be Deducted Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="willbeDeductedText"
                            value="{{ $data->willbeDeductedText }}" placeholder="Wallet money Will be Deducted Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Pay Full With Wallet Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="payFullWithWalletText"
                            value="{{ $data->payFullWithWalletText }}" placeholder="Pay Full With Wallet Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Comment - Payment for Order Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderPaymentWalletComment"
                            value="{{ $data->orderPaymentWalletComment }}" placeholder="Wallet Comment - Payment for Order Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Comment - Partial Payment for Order Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderPartialPaymentWalletComment"
                            value="{{ $data->orderPartialPaymentWalletComment }}" placeholder="Wallet Comment - Partial Payment for Order Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Comment - Order Refund Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderRefundWalletComment"
                            value="{{ $data->orderRefundWalletComment }}" placeholder="Wallet Comment - Order Refund Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Comment - Order Partial Refund Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderPartialRefundWalletComment"
                            value="{{ $data->orderPartialRefundWalletComment }}" placeholder="Wallet Comment - Order Partial Refund Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Wallet Redeem Button Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="walletRedeemBtnText"
                            value="{{ $data->walletRedeemBtnText }}" placeholder="Wallet Redeem Button Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Cancel - Cancel Order Main Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cancelOrderMainButton"
                            value="{{ $data->cancelOrderMainButton }}" placeholder="Order Cancel - Cancel Order Main Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Cancel - Will Be Refunded Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="willBeRefundedText"
                            value="{{ $data->willBeRefundedText }}" placeholder="Order Cancel - Will Be Refunded Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Cancel - Will Not Be Refunded Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="willNotBeRefundedText"
                            value="{{ $data->willNotBeRefundedText }}" placeholder="Order Cancel - Will Not Be Refunded Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Cancel - Do you want to cancel text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="orderCancellationConfirmationText"
                            value="{{ $data->orderCancellationConfirmationText }}" placeholder="Order Cancel - Do you want to cancel text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Cancel - Yes Cancel Order Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="yesCancelOrderBtn"
                            value="{{ $data->yesCancelOrderBtn }}" placeholder="Order Cancel - Yes Cancel Order Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Cancel - Go Back Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="cancelGoBackBtn"
                            value="{{ $data->cancelGoBackBtn }}" placeholder="Order Cancel - Go Back Button">
                    </div>
                </div>
                <!--  END Wallet Translations -->
                <hr>
                <!--  Delivery Screen Settings -->
                <button class="btn btn-primary translation-section-btn mt-4" type="button"> <i class="icon-mobile mr-1"></i>Delivery Screen Settings </button> 
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Welcome Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryWelcomeMessage"
                            value="{{ $data->deliveryWelcomeMessage }}" placeholder="Delivery Welcome Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Accepted Orders Title</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryAcceptedOrdersTitle"
                            value="{{ $data->deliveryAcceptedOrdersTitle }}" placeholder="Accepted Orders Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No Accepted Orders Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryNoOrdersAccepted"
                            value="{{ $data->deliveryNoOrdersAccepted }}" placeholder="No Accepted Orders Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>New Orders Title</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryNewOrdersTitle"
                            value="{{ $data->deliveryNewOrdersTitle }}" placeholder="New Orders Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>No New Orders Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryNoNewOrders"
                            value="{{ $data->deliveryNoNewOrders }}" placeholder="No New Orders Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Items</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryOrderItems"
                            value="{{ $data->deliveryOrderItems }}" placeholder="Order Items">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Restaurant Address</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryRestaurantAddress"
                            value="{{ $data->deliveryRestaurantAddress }}" placeholder="Restaurant Address">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Address</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryDeliveryAddress"
                            value="{{ $data->deliveryDeliveryAddress }}" placeholder="Delivery Address">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Get Direction Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryGetDirectionButton"
                            value="{{ $data->deliveryGetDirectionButton }}" placeholder="Get Direction Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Online Payment</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryOnlinePayment"
                            value="{{ $data->deliveryOnlinePayment }}" placeholder="Online Payment">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Cash on Delivery Payment</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryCashOnDelivery"
                            value="{{ $data->deliveryCashOnDelivery }}" placeholder="Delivery Cash on Delivery Payment">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Pin Placeholder</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryDeliveryPinPlaceholder"
                            value="{{ $data->deliveryDeliveryPinPlaceholder }}" placeholder="Delivery Pin Placeholder">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Accept to Deliver Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryAcceptOrderButton"
                            value="{{ $data->deliveryAcceptOrderButton }}" placeholder="Accept to Deliver Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Picked Up Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryPickedUpButton"
                            value="{{ $data->deliveryPickedUpButton }}" placeholder="Picked Up Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivered Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryDeliveredButton"
                            value="{{ $data->deliveryDeliveredButton }}" placeholder="Delivered Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Completed Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryOrderCompletedButton"
                            value="{{ $data->deliveryOrderCompletedButton }}" placeholder="Order Completed Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Already Accepted Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryAlreadyAccepted"
                            value="{{ $data->deliveryAlreadyAccepted }}" placeholder="Delivery Already Accepted Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Invalid Delivery Pin Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryInvalidDeliveryPin"
                            value="{{ $data->deliveryInvalidDeliveryPin }}" placeholder="Invalid Delivery Pin Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Logout Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryLogoutDelivery"
                            value="{{ $data->deliveryLogoutDelivery }}" placeholder="Delivery Logout Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Logout Confirmation</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryLogoutConfirmation"
                            value="{{ $data->deliveryLogoutConfirmation }}" placeholder="Delivery Logout Confirmation Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Orders Refresh Button</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryOrdersRefreshBtn"
                            value="{{ $data->deliveryOrdersRefreshBtn }}" placeholder="Delivery Orders Refresh Button">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Order Placed Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryOrderPlacedText"
                            value="{{ $data->deliveryOrderPlacedText }}" placeholder="Order Placed Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Footer New Orders</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryFooterNewTitle"
                            value="@if (!empty($data->deliveryFooterNewTitle)) {{ $data->deliveryFooterNewTitle }}@else{{ config('settings.deliveryFooterNewTitle') }}@endif" placeholder="Delivery Footer New Orders">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Footer Accepted</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryFooterAcceptedTitle"
                            value="@if (!empty($data->deliveryFooterAcceptedTitle)) {{ $data->deliveryFooterAcceptedTitle }}@else{{ config('settings.deliveryFooterAcceptedTitle') }}@endif" placeholder="Delivery Footer Accepted">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Footer My Account</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryFooterAccount"
                            value="@if (!empty($data->deliveryFooterAccount)) {{ $data->deliveryFooterAccount }}@else{{ config('settings.deliveryFooterAccount') }}@endif" placeholder="Delivery Footer My Account">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Account Earnings Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryEarningsText"
                            value="@if (!empty($data->deliveryEarningsText)) {{ $data->deliveryEarningsText }}@else{{ config('settings.deliveryEarningsText') }}@endif" placeholder="Delivery Account Earnings Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Account On-Going Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryOnGoingText"
                            value="@if (!empty($data->deliveryOnGoingText)) {{ $data->deliveryOnGoingText }}@else{{ config('settings.deliveryOnGoingText') }}@endif" placeholder="Delivery Account On-Going Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Account Completed Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryCompletedText"
                            value="@if (!empty($data->deliveryCompletedText)) {{ $data->deliveryCompletedText }}@else{{ config('settings.deliveryCompletedText') }}@endif" placeholder="Delivery Account Completed Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Delivery Commission Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="deliveryCommissionMessage"
                            value="@if (!empty($data->deliveryCommissionMessage)) {{ $data->deliveryCommissionMessage }}@else{{ config('settings.deliveryCommissionMessage') }}@endif" placeholder="Delivery Commission Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Updating System Message</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="updatingMessage"
                            value="@if (!empty($data->updatingMessage)) {{ $data->updatingMessage }}@else{{ config('settings.updatingMessage') }}@endif"
                            placeholder="Updating System Message">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Categories Page Filters Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="categoriesFiltersText" value="@if (!empty($data->categoriesFiltersText)) {{ $data->categoriesFiltersText }}@else{{ config('settings.categoriesFiltersText') }}@endif" placeholder="Categories Page Filters Text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Categories Page No Restaurant Found Text</strong></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control form-control-lg" name="categoriesNoRestaurantsFoundText" value="@if (!empty($data->categoriesNoRestaurantsFoundText)) {{ $data->categoriesNoRestaurantsFoundText }}@else{{ config('settings.categoriesNoRestaurantsFoundText') }}@endif" placeholder="Categories Page No Restaurant Found Text">
                    </div>
                </div>
                <!--  END Delivery Screen Settings -->
                <!-- END MOBILE -->
                @csrf
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                    Save Translation
                    <i class="icon-database-insert ml-1"></i>
                    </button>
                </div>
                <div class="text-left">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTranslationConfirmModal">
                    Delete Translation
                    <i class="icon-cancel-circle2 ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="deleteTranslationConfirmModal" class="modal fade mt-5" tabindex="-1">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="font-weight-bold">Are you sure?</span></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <span class="help-text">Attention!!! This change is permanent. <br> You can use the "<strong>DISABLE</strong>" feature to temporarily disable the translation.</span>
                <div class="modal-footer mt-4">
                    <a href="{{ route('admin.deleteTranslation', $translation_id) }}" class="btn btn-primary">Yes Delete</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.summernote-editor').summernote({
               height: 200,
               popover: {
                   image: [],
                   link: [],
                   air: []
                 }
        });
</script>
@endsection