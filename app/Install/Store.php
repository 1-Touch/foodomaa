<?php

namespace App\Install;

use App\PaymentGateway;
use App\Setting;
use App\Translation;

class Store
{
    /**
     * @param $data
     * @param $cache
     */
    public function setup($data, $cache)
    {
        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting != null) {
                $setting->value = $value;
                $setting->save();
            }
        }

        $setting = Setting::where('key', 'seoMetaTitle')->first();
        $setting->value = $data['storeName'];
        $setting->save();

        // $cache->forget('settings');

        //create payment gateways
        $paymentGateway = new paymentGateway();
        $paymentGateway->name = 'COD';
        $paymentGateway->description = 'Cash On Delivery Payment';
        $paymentGateway->is_active = 1;
        $paymentGateway->save();

        $paymentGateway = new paymentGateway();
        $paymentGateway->name = 'Stripe';
        $paymentGateway->description = 'Online Payment with Stripe';
        $paymentGateway->is_active = 0;
        $paymentGateway->save();

        $paymentGateway = new paymentGateway();
        $paymentGateway->name = 'Paypal';
        $paymentGateway->description = 'Paypal Express Checkout';
        $paymentGateway->is_active = 0;
        $paymentGateway->save();

        $paymentGateway = new paymentGateway();
        $paymentGateway->name = 'PayStack';
        $paymentGateway->description = 'PayStack Payment Gateway';
        $paymentGateway->is_active = 0;
        $paymentGateway->save();

        $paymentGateway = new paymentGateway();
        $paymentGateway->name = 'Razorpay';
        $paymentGateway->description = 'PayStack Payment Gateway';
        $paymentGateway->is_active = 0;
        $paymentGateway->save();

        //change domain name in react compiled files
        $this->changeDomainName();
        $this->saveTranslation();
    }

    protected function changeDomainName()
    {
        $jsFiles = glob(base_path('static/js') . '/*');
        foreach ($jsFiles as $file) {
            //read the entire string
            $str = file_get_contents($file);
            $baseUrl = substr(url('/'), 0, strrpos(url('/'), '/'));
            //replace string
            $str = str_replace('http://127.0.0.1/swiggy-laravel-react', $baseUrl, $str);
            //write the entire string
            file_put_contents($file, $str);
        }
    }

    protected function saveTranslation()
    {
        //create English Translation and save
        $translation = new Translation();
        $translation->language_name = 'English';
        $translation->data = file_get_contents(storage_path('language/english.json'));
        $translation->is_active = 1;
        $translation->is_default = 1;
        $translation->save();
    }

}
