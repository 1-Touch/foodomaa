<?php

/* Installation Routes */
Route::get('install/start', 'InstallController@start');
Route::get('install/pre-installation', 'InstallController@preInstallation');
Route::get('install/configuration', 'InstallController@getConfiguration');
Route::post('install/configuration', 'InstallController@postConfiguration');
Route::get('install/complete', 'InstallController@complete');
/* END Installation Routes */

Route::get('/', 'PageController@indexPage')->name('get.index');

/* Admin Helpers Route ***TEMP USE*** */
// Route::get('/create-role-permission', [
//     'as' => 'create-role-permission',
//     'uses' => 'HelperController@createRolePermission',
// ]);

// Route::get('/create-restaurant-placeholder', [
//     'as' => 'create-restaurant-placeholder',
//     'uses' => 'HelperController@createRestaurantPlaceholder',
// ]);

// Route::get('/create-item-placeholder', [
//     'as' => 'create-item-placeholder',
//     'uses' => 'HelperController@createItemPlaceholder',
// ]);
/* END Admin Helpers Route */

/* Auth Routes */
Route::get('/auth/login', 'PageController@loginPage')->name('get.login');
Route::post('/auth/login', 'Auth\LoginController@login')->name('post.login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('auth/register', 'RegisterController@registerRestaurantDelivery')->name('registerRestaurantDelivery');

/* END Auth Routes */

/* Restaurant Order Routes */
Route::group(['prefix' => 'restaurant-owner', 'middleware' => 'restaurantowner'], function () {

    Route::get('/orders', 'RestaurantOwnerController@orders')->name('restaurant.orders');
    Route::get('/orders/get-new-orders', 'RestaurantOwnerController@getNewOrders')->name('restaurant.getNewOrders');

    Route::get('/orders/accept-order/{id}', 'RestaurantOwnerController@acceptOrder')->name('restaurant.acceptOrder');
    Route::get('/orders/mark-order-ready/{id}', 'RestaurantOwnerController@markOrderReady')->name('restaurant.markOrderReady');
    Route::get('/orders/mark-selfpickup-order-completed/{id}', 'RestaurantOwnerController@markSelfPickupOrderAsCompleted')->name('restaurant.markSelfPickupOrderAsCompleted');

    Route::get('/orders/cancel-order/{id}', 'RestaurantOwnerController@cancelOrder')->name('restaurant.cancelOrder');

    Route::get('/restaurants', 'RestaurantOwnerController@restaurants')->name('restaurant.restaurants');
    Route::get('/restaurant/edit/{id}', 'RestaurantOwnerController@getEditRestaurant')->name('restaurant.get.editRestaurant');
    Route::post('/restaurant/new/save', 'RestaurantOwnerController@saveNewRestaurant')->name('restaurant.saveNewRestaurant');
    Route::get('/restaurant/disable/{id}', 'RestaurantOwnerController@disableRestaurant')->name('restaurant.disableRestaurant');
    Route::post('/restaurant/edit/save', 'RestaurantOwnerController@updateRestaurant')->name('restaurant.updateRestaurant');
    Route::post('/restaurant/new/save', 'RestaurantOwnerController@saveNewRestaurant')->name('restaurant.saveNewRestaurant');

    Route::get('/itemcategories', 'RestaurantOwnerController@itemcategories')->name('restaurant.itemcategories');
    Route::post('/itemcategories/new/save', 'RestaurantOwnerController@createItemCategory')->name('restaurant.createItemCategory');
    Route::get('/itemcategory/disable/{id}', 'RestaurantOwnerController@disableCategory')->name('restaurant.disableCategory');

    Route::get('/addoncategories', 'RestaurantOwnerController@addonCategories')->name('restaurant.addonCategories');
    Route::get('/addoncategories/searchAddonCategories', 'RestaurantOwnerController@searchAddonCategories')->name('restaurant.post.searchAddonCategories');
    Route::get('/addoncategory/edit/{id}', 'RestaurantOwnerController@getEditAddonCategory')->name('restaurant.editAddonCategory');
    Route::post('/addoncategory/edit/save', 'RestaurantOwnerController@updateAddonCategory')->name('restaurant.updateAddonCategory');
    Route::post('/addoncategory/new/save', 'RestaurantOwnerController@saveNewAddonCategory')->name('restaurant.saveNewAddonCategory');

    Route::get('/addons', 'RestaurantOwnerController@addons')->name('restaurant.addons');
    Route::get('/addons/searchAddons', 'RestaurantOwnerController@searchAddons')->name('restaurant.post.searchAddons');
    Route::get('/addon/edit/{id}', 'RestaurantOwnerController@getEditAddon')->name('restaurant.editAddon');
    Route::post('/addon/edit/save', 'RestaurantOwnerController@updateAddon')->name('restaurant.updateAddon');
    Route::post('/addon/new/save', 'RestaurantOwnerController@saveNewAddon')->name('restaurant.saveNewAddon');

    Route::get('/items', 'RestaurantOwnerController@items')->name('restaurant.items');
    Route::get('/restaurants/searchItems', 'RestaurantOwnerController@searchItems')->name('restaurant.post.searchItems');
    Route::get('/items/edit/{id}', 'RestaurantOwnerController@getEditItem')->name('restaurant.get.editItem');
    Route::get('/item/disable/{id}', 'RestaurantOwnerController@disableItem')->name('restaurant.disableItem');
    Route::post('/item/edit/save', 'RestaurantOwnerController@updateItem')->name('restaurant.updateItem');
    Route::post('/item/new/save', 'RestaurantOwnerController@saveNewItem')->name('restaurant.saveNewItem');
    Route::post('/item/bulk/save', 'BulkUploadController@itemBulkUploadFromRestaurant')->name('restaurant.itemBulkUpload');

    Route::get('/orders', 'RestaurantOwnerController@orders')->name('restaurant.orders');
    Route::get('/orders/searchOrders', 'RestaurantOwnerController@postSearchOrders')->name('restaurant.post.searchOrders');
    Route::get('/order/{order_id}', 'RestaurantOwnerController@viewOrder')->name('restaurant.viewOrder');

    Route::get('/earnings/{restaurant_id?}', 'RestaurantOwnerController@earnings')->name('restaurant.earnings');
    Route::post('/earnings/send-payout-request', 'RestaurantOwnerController@sendPayoutRequest')->name('restaurant.sendPayoutRequest');

    Route::post('/save-restaurant-owner-notification-token', 'NotificationController@saveRestaurantOwnerNotificationToken')->name('saveRestaurantOwnerNotificationToken');

    Route::get('/dashboard', 'RestaurantOwnerController@dashboard')->name('restaurant.dashboard');

});
/* END Restaurant Owner Routes */

/* Admin Routes */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/processPayment', 'AdminController@processPayment')->name('admin.processPayment');

    Route::get('/manage-delivery-guys', 'AdminController@manageDeliveryGuys')->name('admin.manageDeliveryGuys');
    Route::get('/manage-delivery-guys-restaurants/{id}', 'AdminController@getManageDeliveryGuysRestaurants')->name('admin.get.manageDeliveryGuysRestaurants');
    Route::post('/update-delivery-guys-restaurants', 'AdminController@updateDeliveryGuysRestaurants')->name('admin.updateDeliveryGuysRestaurants');

    Route::get('/manage-restaurant-owners', 'AdminController@manageRestaurantOwners')->name('admin.manageRestaurantOwners');
    Route::get('/manage-restaurant-owners-restaurants/{id}', 'AdminController@getManageRestaurantOwnersRestaurants')->name('admin.get.getManageRestaurantOwnersRestaurants');
    Route::post('/update-restaurant-owners-restaurants', 'AdminController@updateManageRestaurantOwnersRestaurants')->name('admin.updateManageRestaurantOwnersRestaurants');

    Route::get('/users', 'AdminController@users')->name('admin.users');

    Route::post('/saveNewUser', 'AdminController@saveNewUser')->name('admin.saveNewUser');

    Route::get('/users/searchUsers', 'AdminController@postSearchUsers')->name('admin.post.searchUsers');

    Route::get('/user/edit/{id}', 'AdminController@getEditUser')->name('admin.get.editUser');
    Route::post('/user/edit/save', 'AdminController@updateUser')->name('admin.updateUser');

    Route::post('/user/add-money-to-wallet', 'AdminController@addMoneyToWallet')->name('admin.addMoneyToWallet');
    Route::post('/user/substract-money-from-wallet', 'AdminController@substractMoneyFromWallet')->name('admin.substractMoneyFromWallet');

    Route::get('/wallet/transactions', 'AdminController@walletTransactions')->name('admin.walletTransactions');
    Route::get('/wallet/searchWalletTransactions', 'AdminController@searchWalletTransaction')->name('admin.searchWalletTransactions');

    Route::get('/settings', 'SettingController@settings')->name('admin.settings');
    Route::post('/settings', 'SettingController@saveSettings')->name('admin.saveSettings');
    Route::post('/settings/send-test-mail', 'SettingController@sendTestmail')->name('admin.sendTestmail');
    Route::post('/settings/payment-gateways-toggle', 'PaymentController@togglePaymentGateways')->name('admin.togglePaymentGateways');

    Route::get('/orders', 'AdminController@orders')->name('admin.orders');
    Route::get('/orders/searchOrders', 'AdminController@postSearchOrders')->name('admin.post.searchOrders');
    Route::get('/order/{order_id}', 'AdminController@viewOrder')->name('admin.viewOrder');
    Route::post('/order/cancel-order', 'AdminController@cancelOrderFromAdmin')->name('admin.cancelOrderFromAdmin');

    Route::get('/sliders', 'AdminController@sliders')->name('admin.sliders');
    Route::get('/sliders/disable/{id}', 'AdminController@disableSlider')->name('admin.disableSlider');
    Route::get('/sliders/delete/{id}', 'AdminController@deleteSlider')->name('admin.deleteSlider');
    Route::get('/sliders/{id}', 'AdminController@getEditSlider')->name('admin.get.editSlider');
    Route::post('/slider/create', 'AdminController@createSlider')->name('admin.createSlider');
    Route::post('/slider/save', 'AdminController@saveSlide')->name('admin.saveSlide');
    Route::get('/slider/delete/{id}', 'AdminController@deleteSlide')->name('admin.deleteSlide');
    Route::get('/slider/disable/{id}', 'AdminController@disableSlide')->name('admin.disableSlide');

    Route::get('/restaurants', 'AdminController@restaurants')->name('admin.restaurants');
    Route::get('/restaurants/pending-acceptance', 'AdminController@pendingAcceptance')->name('admin.pendingAcceptance');
    Route::get('/restaurants/pending-acceptance/accept/{id}', 'AdminController@acceptRestaurant')->name('admin.acceptRestaurant');
    Route::get('/restaurants/searchRestaurants', 'AdminController@searchRestaurants')->name('admin.post.searchRestaurants');
    Route::get('/restaurant/edit/{id}', 'AdminController@getEditRestaurant')->name('admin.get.editRestaurant');
    Route::get('/restaurant/disable/{id}', 'AdminController@disableRestaurant')->name('admin.disableRestaurant');
    Route::get('/restaurant/delete/{id}', 'AdminController@deleteRestaurant')->name('admin.deleteRestaurant');
    Route::post('/restaurant/edit/save', 'AdminController@updateRestaurant')->name('admin.updateRestaurant');
    Route::post('/restaurant/new/save', 'AdminController@saveNewRestaurant')->name('admin.saveNewRestaurant');
    Route::post('/restaurant/bulk/save', 'BulkUploadController@restaurantBulkUpload')->name('admin.restaurantBulkUpload');
    Route::get('/restaurant/{restaurant_id}/items', 'AdminController@getRestaurantItems')->name('admin.getRestaurantItems');

    Route::post('/restaurant/schedule/save', 'AdminController@updateRestaurantScheduleData')->name('admin.updateRestaurantScheduleData');

    Route::get('/addoncategories', 'AdminController@addonCategories')->name('admin.addonCategories');
    Route::get('/addoncategories/searchAddonCategories', 'AdminController@searchAddonCategories')->name('admin.post.searchAddonCategories');
    Route::get('/addoncategory/edit/{id}', 'AdminController@getEditAddonCategory')->name('admin.editAddonCategory');
    Route::post('/addoncategory/edit/save', 'AdminController@updateAddonCategory')->name('admin.updateAddonCategory');
    Route::post('/addoncategory/new/save', 'AdminController@saveNewAddonCategory')->name('admin.saveNewAddonCategory');

    Route::get('/addons', 'AdminController@addons')->name('admin.addons');
    Route::get('/addons/searchAddons', 'AdminController@searchAddons')->name('admin.post.searchAddons');
    Route::get('/addon/edit/{id}', 'AdminController@getEditAddon')->name('admin.editAddon');
    Route::post('/addon/edit/save', 'AdminController@updateAddon')->name('admin.updateAddon');
    Route::post('/addon/new/save', 'AdminController@saveNewAddon')->name('admin.saveNewAddon');

    Route::get('/items', 'AdminController@items')->name('admin.items');
    Route::get('/items/searchItems', 'AdminController@searchItems')->name('admin.post.searchItems');
    Route::get('/item/edit/{id}', 'AdminController@getEditItem')->name('admin.get.editItem');
    Route::get('/item/disable/{id}', 'AdminController@disableItem')->name('admin.disableItem');
    Route::post('/item/edit/save', 'AdminController@updateItem')->name('admin.updateItem');
    Route::post('/item/new/save', 'AdminController@saveNewItem')->name('admin.saveNewItem');
    Route::post('/item/bulk/save', 'BulkUploadController@itemBulkUpload')->name('admin.itemBulkUpload');

    Route::get('/itemcategories', 'AdminController@itemcategories')->name('admin.itemcategories');
    Route::post('/itemcategories/new/save', 'AdminController@createItemCategory')->name('admin.createItemCategory');
    Route::get('/itemcategory/disable/{id}', 'AdminController@disableCategory')->name('admin.disableCategory');

    Route::get('/coupons', 'CouponController@coupons')->name('admin.coupons');
    Route::post('/coupon/new/save', 'CouponController@saveNewCoupon')->name('admin.post.saveNewCoupon');
    Route::get('/coupon/edit/{id}', 'CouponController@getEditCoupon')->name('admin.get.getEditCoupon');
    Route::post('/coupon/edit/save', 'CouponController@updateCoupon')->name('admin.updateCoupon');
    Route::get('/coupon/delete/{id}', 'CouponController@deleteCoupon')->name('admin.deleteCoupon');

    Route::get('/notifications', 'NotificationController@notifications')->name('admin.notifications');
    Route::post('/notifications/upload', 'NotificationController@uploadNotificationImage')->name('admin.uploadNotificationImage');
    Route::post('/notifications/send', 'NotificationController@sendNotifiaction')->name('admin.sendNotifiaction');
    Route::post('/notification-to-users/send', 'NotificationController@sendNotificationToSelectedUsers')->name('admin.sendNotificationToSelectedUsers');

    Route::get('/locations', 'AdminController@locations')->name('admin.locations');
    Route::post('/locations/new/save', 'AdminController@saveNewLocation')->name('admin.saveNewLocation');
    Route::get('/locations/edit/{id}', 'AdminController@editLocation')->name('admin.editLocation');
    Route::post('/locations/edit/save', 'AdminController@updateLocation')->name('admin.updateLocation');
    Route::get('/locations/disable/{id}', 'AdminController@disableLocation')->name('admin.disableLocation');
    Route::post('/location/bulk/save', 'BulkUploadController@locationBulkUpload')->name('admin.locationBulkUpload');

    Route::get('/popular-geo-locations', 'AdminController@popularGeoLocations')->name('admin.popularGeoLocations');
    Route::post('/popular-geo-location/new/save', 'AdminController@saveNewPopularGeoLocation')->name('admin.saveNewPopularGeoLocation');
    Route::get('/popular-geo-location/disable/{id}', 'AdminController@disablePopularGeoLocation')->name('admin.disablePopularGeoLocation');
    Route::get('/popular-geo-location/delete/{id}', 'AdminController@deletePopularGeoLocation')->name('admin.deletePopularGeoLocation');

    Route::get('/pages', 'AdminController@pages')->name('admin.pages');
    Route::post('/page/new/save', 'AdminController@saveNewpage')->name('admin.saveNewPage');
    Route::get('/page/edit/{id}', 'AdminController@getEditPage')->name('admin.getEditPage');
    Route::post('/page/edit/save', 'AdminController@updatePage')->name('admin.updatePage');
    Route::get('/page/delete/{id}', 'AdminController@deletePage')->name('admin.deletePage');

    Route::get('/restaurant-payouts', 'AdminController@restaurantpayouts')->name('admin.restaurantpayouts');
    Route::get('/restaurant-payouts/{id}', 'AdminController@viewRestaurantPayout')->name('admin.viewRestaurantPayout');
    Route::post('/restaurant-payouts/save', 'AdminController@updateRestaurantPayout')->name('admin.updateRestaurantPayout');

    Route::get('/update/check', '\pcinaglia\laraupdater\LaraUpdaterController@check')->name('admin.checkForUpdates');
    Route::get('/update/perform-update', '\pcinaglia\laraupdater\LaraUpdaterController@update')->name('admin.performUpdate');

    Route::get('/translations', 'AdminController@translations')->name('admin.translations');
    Route::get('/translation/new', 'AdminController@newTranslation')->name('admin.newTranslation');
    Route::post('/translation/new/save', 'AdminController@saveNewTranslation')->name('admin.saveNewTranslation');
    Route::get('/translation/edit/{id}', 'AdminController@editTranslation')->name('admin.editTranslation');
    Route::post('/translation/edit/save', 'AdminController@updateTranslation')->name('admin.updateTranslation');
    Route::get('/translation/disable/{id}', 'AdminController@disableTranslation')->name('admin.disableTranslation');
    Route::get('/translation/delete/{id}', 'AdminController@deleteTranslation')->name('admin.deleteTranslation');
    Route::get('/translation/make-default/{id}', 'AdminController@makeDefaultLanguage')->name('admin.makeDefaultLanguage');

    Route::get('/delivery-collections', 'DeliveryCollectionController@deliveryCollections')->name('admin.deliveryCollections');
    Route::post('/delivery-collection/collect/{id}', 'DeliveryCollectionController@collectDeliveryCollection')->name('admin.collectDeliveryCollection');

    Route::get('/delivery-collection-logs', 'DeliveryCollectionController@deliveryCollectionLogs')->name('admin.deliveryCollectionLogs');
    Route::get('/delivery-collection-logs/{id}', 'DeliveryCollectionController@deliveryCollectionLogsForSingleUser')->name('admin.deliveryCollectionLogsForSingleUser');

    Route::get('/restaurant-category-slider', 'RestaurantCategoryController@restaurantCategorySlider')->name('admin.restaurantCategorySlider');
    Route::get('/restaurant-category-slider/delete/{id}', 'RestaurantCategoryController@deleteRestaurantCategorySlide')->name('admin.deleteRestaurantCategorySlide');
    Route::get('/restaurant-category-slider/disable/{id}', 'RestaurantCategoryController@disableRestaurantCategorySlide')->name('admin.disableRestaurantCategorySlide');
    Route::post('/restaurant-category-slider/new', 'RestaurantCategoryController@newRestaurantCategory')->name('admin.newRestaurantCategory');
    Route::post('/restaurant-category-slider/update', 'RestaurantCategoryController@updateRestaurantCategory')->name('admin.updateRestaurantCategory');
    Route::post('/restaurant-category-slider/save-settings', 'RestaurantCategoryController@saveRestaurantCategorySliderSettings')->name('admin.saveRestaurantCategorySliderSettings');

    Route::post('/create-restaurant-category-slide', 'RestaurantCategoryController@createRestaurantCategorySlide')->name('admin.createRestaurantCategorySlide');

    Route::get('/modules', 'ModuleController@modules')->name('admin.modules');
    Route::post('/module/upload', 'ModuleController@uploadModuleZipFile')->name('admin.uploadModuleZipFile');
    Route::get('/module/install', 'ModuleController@installModule')->name('admin.installModule');
    Route::get('/module/disable/{id}', 'ModuleController@disableModule')->name('admin.disableModule');
    Route::get('/module/enable/{id}', 'ModuleController@enableModule')->name('admin.enableModule');

    Route::get('/fix-update-issues', 'AdminController@fixUpdateIssues')->name('admin.fixUpdateIssues');

    Route::get('/update-foodomaa', 'UpdateController@updateFoodomaa')->name('admin.updateFoodomaa');
    Route::get('/update-foodomaa-now', 'UpdateController@updateFoodomaaNow')->name('admin.updateFoodomaaNow');
    Route::post('/update-foodomaa/upload', 'UpdateController@uploadUpdateZipFile')->name('admin.uploadUpdateZipFile');

    Route::post('/force-clear', 'SettingController@forceClear')->name('admin.forceClear');

    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

});
/* END Admin Routes */

/* EXTRAS */
// Route::get('/init', 'InitController@init')->name('init');
