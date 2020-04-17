<?php

namespace App\Http\Controllers;

use App\PaymentGateway;
use App\Setting;
use DotenvEditor;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use Mail;

class SettingController extends Controller
{
    public function getSettings()
    {
        $settings = Setting::whereNotIn('key', ['categoriesFiltersText', 'categoriesNoRestaurantsFoundText', 'exlporeByRestaurantText', 'setNewPasswordButtonText', 'newPasswordLabelText', 'enterNewPasswordText', 'dontHaveResetOtpButtonText', 'verifyResetOtpButtonText', 'enterResetOtpMessageText', 'alreadyHaveResetOtpButtonText', 'sendOtpOnEmailButtonText', 'resetPasswordPageSubTitle', 'resetPasswordPageTitle', 'invalidOtpErrorMessage', 'userNotFoundErrorMessage', 'updatingMessage', 'exploreNoResults', 'stripeSecretKey', 'paystackPrivateKey', 'twilioSid', 'twilioAccessToken', 'twilioServiceId', 'razorpayKeySecret', 'deliveryAcceptTimeThreshold', 'restaurantAcceptTimeThreshold', 'enDevMode', 'deliveryGuyCommissionFrom', 'itemPercentageDiscountText', 'itemsMenuButtonText', 'itemSearchPlaceholder', 'itemSearchNoResultText', 'itemSearchText', 'deliveryCommissionMessage', 'deliveryCompletedText', 'deliveryOnGoingText', 'deliveryEarningsText', 'deliveryFooterAccount', 'deliveryFooterAcceptedTitle', 'deliveryFooterNewTitle', 'changeLanguageText', 'searchAtleastThreeCharsMsg', 'orderCancelledText', 'socialLoginOrText', 'deliveryCashOnDelivery', 'deliveryOrderPlacedText', 'cancelOrderMainButton', 'cancelGoBackBtn', 'yesCancelOrderBtn', 'orderCancellationConfirmationText', 'exploreItemsText', 'exploreRestautantsText', 'notAcceptingOrdersMsg', 'yourLocationText', 'gpsAccessNotGrantedMsg', 'useCurrentLocationText', 'addressDoesnotDeliverToText', 'cartRestaurantNotOperational', 'willNotBeRefundedText', 'willBeRefundedText', 'cartCouponOffText', 'deliveryGuyNewOrderNotificationMsgSub', 'deliveryGuyNewOrderNotificationMsg', 'restaurantNewOrderNotificationMsgSub', 'restaurantNewOrderNotificationMsg', 'walletRedeemBtnText', 'orderPartialRefundWalletComment', 'orderRefundWalletComment', 'orderPartialPaymentWalletComment', 'orderPaymentWalletComment', 'payFullWithWalletText', 'willbeDeductedText', 'payPartialWithWalletText', 'walletWithdrawText', 'walletDepositText', 'noWalletTransactionsText', 'accountMyWallet', 'showLessButtonText', 'showMoreButtonText', 'certificateCodeText', 'pureVegText', 'readyForPickupStatusText', 'canceledStatusText', 'deliveredStatusText', 'orderPickedUpStatusText', 'deliveryGuyAssignedStatusText', 'preparingOrderStatusText', 'orderPlacedStatusText', 'trackOrderText', 'ongoingOrderMsg', 'itemsRemovedMsg', 'taxText', 'deliveryOrdersRefreshBtn', 'allowLocationAccessMessage', 'checkoutRazorpaySubText', 'checkoutRazorpayText', 'callNowButton', 'deliveryGuyAfterName', 'vehicleText', 'selectedSelfPickupMessage', 'noRestaurantMessage', 'deliveryTypeSelfPickup', 'deliveryTypeDelivery', 'runningOrderReadyForPickupSub', 'runningOrderReadyForPickup', 'emailPassDonotMatch', 'socialWelcomeText', 'verifyOtpBtnText', 'resendOtpCountdownMsg', 'resendOtpMsg', 'otpSentMsg', 'invalidOtpMsg', 'enterPhoneToVerify', 'emailPhoneAlreadyRegistered', 'minimumLengthValidationMessage', 'phoneValidationMsg', 'emailValidationMsg', 'nameValidationMsg', 'fieldValidationMsg', 'paystackPayText', 'customizationDoneBtnText', 'customizableItemText', 'customizationHeading', 'deliveryLogoutConfirmation', 'deliveryLogoutDelivery', 'deliveryAlreadyAccepted', 'deliveryInvalidDeliveryPin', 'deliveryOrderCompletedButton', 'deliveryDeliveredButton', 'deliveryPickedUpButton', 'deliveryAcceptOrderButton', 'deliveryDeliveryPinPlaceholder', 'deliveryOnlinePayment', 'deliveryDeliveryAddress', 'deliveryGetDirectionButton', 'deliveryRestaurantAddress', 'deliveryOrderItems', 'deliveryWelcomeMessage', 'deliveryAcceptedOrdersTitle', 'deliveryNewOrdersTitle', 'restaurantFeaturedText', 'gdprConfirmButton', 'gdprMessage', 'runningOrderDeliveredSub', 'runningOrderDelivered', 'deliveryNoNewOrders', 'deliveryNoOrdersAccepted', 'runningOrderDeliveryPin', 'desktopFooterAddress', 'desktopFooterSocialHeader', 'desktopAchievementFourSub', 'desktopAchievementFourTitle', 'desktopAchievementThreeSub', 'desktopAchievementThreeTitle', 'desktopAchievementTwoSub', 'desktopAchievementTwoTitle', 'desktopAchievementOneSub', 'desktopAchievementOneTitle', 'desktopUseAppButton', 'desktopSubHeading', 'desktopHeading', 'accountMyAccount', 'regsiterAlreadyHaveAccount', 'loginDontHaveAccount', 'firstScreenRegisterBtn', 'registerRegisterSubTitle', 'registerRegisterTitle', 'registerErrorMessage', 'loginLoginNameLabel', 'loginLoginPhoneLabel', 'checkoutCodSubText', 'checkoutCodText', 'checkoutStripeSubText', 'checkoutStripeText', 'checkoutPaymentInProcess', 'cartSetYourAddress', 'cartToPayText', 'cartCouponText', 'cartDeliveryCharges', 'cartRestaurantCharges', 'cartItemTotalText', 'cartBillDetailsText', 'cartItemsInCartText', 'floatCartViewCartText', 'floatCartItemsText', 'itemsPageRecommendedText', 'homePageForTwoText', 'homePageMinsText', 'loginLoginPasswordLabel', 'loginLoginEmailLabel', 'loginLoginSubTitle', 'loginLoginTitle', 'pleaseWaitText', 'loginErrorMessage', 'firstScreenLoginBtn', 'firstScreenWelcomeMessage', 'runningOrderCanceledSub', 'runningOrderCanceledTitle', 'runningOrderDeliveryAssignedSub', 'runningOrderDeliveryAssignedTitle', 'checkoutSelectPayment', 'checkoutPaymentListTitle', 'orderTextTotal', 'noOrdersText', 'runningOrderRefreshButton', 'runningOrderOnwaySub', 'runningOrderOnwayTitle', 'runningOrderPreparingSub', 'runningOrderPreparingTitle', 'runningOrderPlacedSub', 'runningOrderPlacedTitle', 'checkoutPlaceOrder', 'checkoutPageTitle', 'cartPageTitle', 'cartSetAddressText', 'noAddressText', 'deleteAddressText', 'editAddressText', 'cartSuggestionPlaceholder', 'cartInvalidCoupon', 'cartApplyCoupon', 'addressTagPlaceholder', 'editAddressTag', 'editAddressLandmark', 'editAddressHouse', 'editAddressAddress', 'buttonSaveAddress', 'buttonNewAddress', 'cartChangeLocation', 'cartDeliverTo', 'cartLoginButtonText', 'cartLoginSubHeader', 'cartLoginHeader', 'cartMakePayment', 'accountLogout', 'accountHelpFaq', 'accountMyOrders', 'accountManageAddress', 'restaurantSearchPlaceholder', 'cartEmptyText', 'newBadgeText', 'popularBadgeText', 'recommendedBadgeText', 'searchPopularPlaces', 'searchAreaPlaceholder', 'restaurantCountText', 'footerAccount', 'footerCart', 'footerExplore', 'footerNearme', 'firstScreenLoginText', 'firstScreenSetupLocation', 'firstScreenSubHeading', 'firstScreenHeading', 'registrationPolicyMessage', 'locationSavedAddresses', 'restaurantMinOrderMessage', 'footerAlerts', 'markAllAlertReadText', 'noNewAlertsText'])->get(['key', 'value']);
        return response()->json($settings);
    }

    /**
     * @param Request $request
     */
    public function settings(Request $request)
    {
        $paymentGateways = PaymentGateway::all();
        $activePaymentGateways = PaymentGateway::where('is_active', '1')->get();

        /*Version Info */
        $versionFile = File::get(base_path('version.txt'));
        if ($versionFile) {
            $versionMsg = 'v' . $versionFile;
        } else {
            $versionMsg = null;
        }

        $versionJson = File::get(base_path('version.json'));
        if ($versionJson) {
            $versionJson = json_decode($versionJson);
        } else {
            $versionJson = null;
        }

        return view('admin.settings', array(
            'paymentGateways' => $paymentGateways,
            'activePaymentGateways' => $activePaymentGateways,
            'versionMsg' => $versionMsg,
            'versionJson' => $versionJson,
        ));
    }

    /**
     * @param Request $request
     * @param Factory $cache
     */
    public function saveSettings(Request $request, Factory $cache)
    {
        // dd($request->all());
        $allSettings = $request->except(['logo', 'favicon', 'splashLogo', 'seoOgImage', 'seoTwitterImage', 'firstScreenHeroImage', 'showPromoSlider', 'showMap', 'enablePushNotification', 'enablePushNotificationOrders', 'showGdpr', 'enableGoogleAnalytics', 'taxApplicable', 'enSOV', 'enSPU', 'enableFacebookLogin', 'enableGoogleLogin', 'enableDeliveryPin', 'timezone', 'enDevMode', 'hidePriceWhenZero', 'enableDeliveryGuyEarning', 'enPassResetEmail', 'showPercentageDiscount', 'showVegNonVegBadge', 'showFromNowDate']);
        // dd($allSettings);
        foreach ($allSettings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting != null) {
                $setting->value = $value;
                $setting->save();
            }
        }

        if ($request->hasFile('favicon')) {
            $setting = Setting::where('key', 'favicon-16x16')->first();
            $image = $request->file('favicon');
            $filename = 'favicon-16x16.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(16, 16)->save(base_path('/assets/img/favicons/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();

            $setting = Setting::where('key', 'favicon-32x32')->first();
            $image = $request->file('favicon');
            $filename = 'favicon-32x32.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(32, 32)->save(base_path('/assets/img/favicons/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();

            $setting = Setting::where('key', 'favicon-96x96')->first();
            $image = $request->file('favicon');
            $filename = 'favicon-96x96.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(96, 96)->save(base_path('/assets/img/favicons/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();

            $setting = Setting::where('key', 'favicon-128x128')->first();
            $image = $request->file('favicon');
            $filename = 'favicon-128x128.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(128, 128)->save(base_path('/assets/img/favicons/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();

            /* For PWA Manifest*/
            $image = $request->file('favicon');
            $filename = 'favicon-36x36.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(36, 36)->save(base_path('/assets/img/favicons/' . $filename));

            $image = $request->file('favicon');
            $filename = 'favicon-48x48.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(48, 48)->save(base_path('/assets/img/favicons/' . $filename));

            $image = $request->file('favicon');
            $filename = 'favicon-144x144.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(144, 144)->save(base_path('/assets/img/favicons/' . $filename));

            $image = $request->file('favicon');
            $filename = 'favicon-192x192.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(192, 192)->save(base_path('/assets/img/favicons/' . $filename));

            $image = $request->file('favicon');
            $filename = 'favicon-512x512.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(512, 512)->save(base_path('/assets/img/favicons/' . $filename));
        }

        if ($request->hasFile('logo')) {
            $setting = Setting::where('key', 'storeLogo')->first();
            $image = $request->file('logo');
            $filename = 'logo.' . strtolower($image->getClientOriginalExtension());
            $smallFile = 'logo-sm.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(320, 89)->save(base_path('/assets/img/logos/' . $filename));
            Image::make($image)->resize(120, 33)->save(base_path('/assets/img/logos/' . $smallFile));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();
        }

        if ($request->hasFile('splashLogo')) {
            $setting = Setting::where('key', 'splashLogo')->first();
            $image = $request->file('splashLogo');
            $filename = 'splash.jpg';
            Image::make($image)->resize(480, 853)->encode('jpg', 65)->save(base_path('/assets/img/splash/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();
        }

        if ($request->hasFile('seoOgImage')) {
            $setting = Setting::where('key', 'seoOgImage')->first();
            $image = $request->file('seoOgImage');
            $filename = 'ogimage.png';
            Image::make($image)->resize(1200, 630)->encode('png', 65)->save(base_path('/assets/img/social/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();
        }

        if ($request->hasFile('seoTwitterImage')) {
            $setting = Setting::where('key', 'seoTwitterImage')->first();
            $image = $request->file('seoTwitterImage');
            $filename = 'twitterimage.png';
            Image::make($image)->resize(600, 335)->encode('png', 65)->save(base_path('/assets/img/social/' . $filename));
            $setting->value = $filename . '?v=' . time() . str_random(5);
            $setting->save();
        }

        if ($request->hasFile('firstScreenHeroImage')) {
            $setting = Setting::where('key', 'firstScreenHeroImage')->first();
            $image = $request->file('firstScreenHeroImage');
            $random = str_random(10);
            $filename = time() . $random . '.' . strtolower($image->getClientOriginalExtension());
            $filenameSm = time() . $random . '-sm.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(592, 640)->save(base_path('/assets/img/various/' . $filename));
            Image::make($image)->resize(75, 81)->save(base_path('/assets/img/various/' . $filenameSm));
            $setting->value = 'assets/img/various/' . $filename . '?v=' . time() . str_random(5);
            $setting->save();
            $setting = Setting::where('key', 'firstScreenHeroImageSm')->first();
            $setting->value = 'assets/img/various/' . $filenameSm . '?v=' . time() . str_random(5);
            $setting->save();
        }

        //checkboxes settings (true/false)
        $checkboxesSettings = ['showPromoSlider', 'showMap', 'enablePushNotification', 'enablePushNotificationOrders', 'showGdpr', 'enableGoogleAnalytics', 'taxApplicable', 'enSOV', 'enSPU', 'enableFacebookLogin', 'enableGoogleLogin', 'enableDeliveryPin', 'hidePriceWhenZero', 'enableDeliveryGuyEarning', 'enPassResetEmail', 'showPercentageDiscount', 'showVegNonVegBadge', 'showFromNowDate'];

        foreach ($checkboxesSettings as $checkboxSetting) {
            $setting = Setting::where('key', $checkboxSetting)->first();
            if ($request->$checkboxSetting == 'true') {
                $setting->value = 'true';
                $setting->save();
            } else {
                $setting->value = 'false';
                $setting->save();
            }
        }

        if ($request->enDevMode == 'true') {
            $env = DotenvEditor::load();
            $env->setKey('APP_ENV', 'local');
            $env->setKey('APP_DEBUG', 'true');
            $env->save();
            $setting = Setting::where('key', 'enDevMode')->first();
            $setting->value = 'true';
            $setting->save();
        } else {
            $env = DotenvEditor::load();
            $env->setKey('APP_ENV', 'production');
            $env->setKey('APP_DEBUG', 'false');
            $env->save();
            $setting = Setting::where('key', 'enDevMode')->first();
            $setting->value = 'false';
            $setting->save();
        }

        $env = DotenvEditor::load();
        $env->setKey('APP_TIMEZONE', $request->timezone);
        $env->setKey('GOOGLE_MAPS_GEOCODING_API_KEY', $request->googleApiKeyIP);
        $env->setKey('MAIL_HOST', $request->mail_host);
        $env->setKey('MAIL_PORT', $request->mail_port);
        $env->setKey('MAIL_USERNAME', $request->mail_username);
        $env->setKey('MAIL_PASSWORD', $request->mail_password);
        $env->setKey('MAIL_ENCRYPTION', $request->mail_encryption);
        $env->save();

        $cache->forget('settings'); //reset cache

        //reset setting cache for frontend
        $versionJson = File::get(base_path('version.json'));
        $versionJson = json_decode($versionJson);
        $fileData = [
            'forceNewSettingsVersion' => strtolower(str_random(30)),
            'forceCacheClearVersion' => $versionJson->forceCacheClearVersion,
        ];
        File::put(base_path('version.json'), json_encode($fileData));

        return redirect(route('admin.settings') . $request->window_redirect_hash)->with(['success' => 'Settings saved successfully.']);
    }

    /**
     * @param Request $request
     */
    public function forceClear(Request $request)
    {
        $versionJson = File::get(base_path('version.json'));
        $versionJson = json_decode($versionJson);

        switch ($request->type) {
            case 'CACHE':
                $fileData = [
                    'forceNewSettingsVersion' => $versionJson->forceNewSettingsVersion,
                    'forceCacheClearVersion' => strtolower(str_random(30)),
                ];

                File::put(base_path('version.json'), json_encode($fileData));

                $response = [
                    'success' => true,
                    'newVersion' => json_decode($versionJson = File::get(base_path('version.json'))),
                ];
                return response()->json($response);
                break;
            case 'SETTINGS':
                $fileData = [
                    'forceNewSettingsVersion' => strtolower(str_random(30)),
                    'forceCacheClearVersion' => $versionJson->forceCacheClearVersion,
                ];

                File::put(base_path('version.json'), json_encode($fileData));

                $response = [
                    'success' => true,
                    'newVersion' => json_decode($versionJson = File::get(base_path('version.json'))),
                ];
                return response()->json($response);
            default:
                $response = [
                    'success' => false,
                ];
                return response()->json($response, 400);
                break;
        }
    }

    /**
     * @param Request $request
     */
    public function sendTestmail(Request $request)
    {
        // sleep(5);
        try {
            $data = [
                'email' => $request->email,
            ];
            Mail::send('emails.testEmail', $data, function ($message) use ($data) {
                $message->subject('SMTP Mail Test');
                $message->from('do-not-reply@mailtest.com');
                $message->to($data['email']);
            });

            $response = [
                'success' => true,
            ];
            return response()->json($response);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 401);
        }
    }
}
