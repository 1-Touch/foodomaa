<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Image;
use Importer;

class BulkUploadController extends Controller
{
    /**
     * @param Request $request
     */
    public function restaurantBulkUpload(Request $request)
    {
        if ($request->hasFile('restaurant_csv')) {
            $filepath = $request->file('restaurant_csv')->getRealPath();

            $excel = Importer::make('Csv');
            $excel->hasHeader(true);
            $excel->load($filepath);
            $data = $excel->getCollection();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key) {

                    if ($key['name'] == 'NULL') {
                        $name = null;
                    } else {
                        $name = $key['name'];
                    }

                    if ($key['description'] == 'NULL') {
                        $description = null;
                    } else {
                        $description = $key['description'];
                    }

                    if ($key['location_id'] == 'NULL') {
                        $location_id = null;
                    } else {
                        $location_id = $key['location_id'];
                    }

                    if ($key['image'] == 'NULL') {
                        $image = null;
                        $placeholder_image = null;
                    } else {
                        $imageName = $key['image'];
                        $rand_name = time() . str_random(10);

                        $filename = $rand_name . '.' . $imageName;
                        $filename_sm = $rand_name . '-sm.' . $imageName;

                        Image::make(base_path('assets/img/restaurants/bulk-upload/' . $imageName))
                            ->resize(160, 117)
                            ->save(base_path('assets/img/restaurants/' . $filename));

                        $image = '/assets/img/restaurants/' . $filename;

                        Image::make(base_path('assets/img/restaurants/bulk-upload/' . $imageName))
                            ->resize(20, 20)
                            ->save(base_path('assets/img/restaurants/small/' . $filename_sm));

                        $placeholder_image = '/assets/img/restaurants/small/' . $filename;
                    }

                    if ($key['rating'] == 'NULL') {
                        $rating = null;
                    } else {
                        $rating = $key['rating'];
                    }

                    if ($key['delivery_time'] == 'NULL') {
                        $delivery_time = null;
                    } else {
                        $delivery_time = $key['delivery_time'];
                    }

                    if ($key['price_range'] == 'NULL') {
                        $price_range = null;
                    } else {
                        $price_range = $key['price_range'];
                    }

                    if ($key['address'] == 'NULL') {
                        $address = null;
                    } else {
                        $address = $key['address'];
                    }

                    if ($key['pincode'] == 'NULL') {
                        $pincode = null;
                    } else {
                        $pincode = $key['pincode'];
                    }

                    if ($key['landmark'] == 'NULL') {
                        $landmark = null;
                    } else {
                        $landmark = $key['landmark'];
                    }

                    if ($key['latitude'] == 'NULL') {
                        $latitude = null;
                    } else {
                        $latitude = $key['latitude'];
                    }

                    if ($key['longitude'] == 'NULL') {
                        $longitude = null;
                    } else {
                        $longitude = $key['longitude'];
                    }

                    if ($key['certificate'] == 'NULL') {
                        $certificate = null;
                    } else {
                        $certificate = $key['certificate'];
                    }

                    if ($key['restaurant_charges'] == 'NULL') {
                        $restaurant_charges = null;
                    } else {
                        $restaurant_charges = $key['restaurant_charges'];
                    }

                    if ($key['delivery_charges'] == 'NULL') {
                        $delivery_charges = null;
                    } else {
                        $delivery_charges = $key['delivery_charges'];
                    }

                    if ($key['is_pureveg'] == 'NULL') {
                        $is_pureveg = null;
                    } else {
                        $is_pureveg = $key['is_pureveg'];
                    }

                    if ($key['is_featured'] == 'NULL') {
                        $is_featured = null;
                    } else {
                        $is_featured = $key['is_featured'];
                    }

                    if ($key['delivery_type'] == 'NULL') {
                        $delivery_type = 1;
                    } else {
                        $is_featured = $key['delivery_type'];
                    }

                    $slug = str_slug($name) . '-' . str_random(15);

                    $sku = time() . str_random(10);

                    $insert[] = [
                        'name' => $name,
                        'description' => $description,
                        'location_id' => $location_id,
                        'image' => $image,
                        'rating' => $rating,
                        'delivery_time' => $delivery_time,
                        'price_range' => $price_range,
                        'address' => $address,
                        'pincode' => $pincode,
                        'landmark' => $landmark,
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                        'certificate' => $certificate,
                        'restaurant_charges' => $restaurant_charges,
                        'delivery_charges' => $delivery_charges,
                        'is_pureveg' => $is_pureveg,
                        'slug' => $slug,
                        'placeholder_image' => $placeholder_image,
                        'sku' => $sku,
                        'is_accepted' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ];
                }
                if (!empty($insert)) {
                    try {
                        DB::table('restaurants')->insert($insert);
                        return redirect()->back()->with(['success' => 'Operation Successful']);
                    } catch (\Illuminate\Database\QueryException $qe) {
                        return redirect()->back()->with(['message' => $qe->getMessage()]);
                    } catch (Exception $e) {
                        return redirect()->back()->with(['message' => $e->getMessage()]);
                    } catch (\Throwable $th) {
                        return redirect()->back()->with(['message' => $th]);
                    }
                }
            }
        }
    }

    /**
     * @param Request $request
     */
    public function itemBulkUpload(Request $request)
    {
        if ($request->hasFile('item_csv')) {
            $filepath = $request->file('item_csv')->getRealPath();

            $excel = Importer::make('Csv');
            $excel->hasHeader(true);
            $excel->load($filepath);
            $data = $excel->getCollection();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key) {

                    if ($key['name'] == 'NULL') {
                        $name = null;
                    } else {
                        $name = $key['name'];
                    }

                    if ($key['restaurant_id'] == 'NULL') {
                        $restaurant_id = null;
                    } else {
                        $restaurant_id = $key['restaurant_id'];
                    }

                    if ($key['item_category_id'] == 'NULL') {
                        $item_category_id = null;
                    } else {
                        $item_category_id = $key['item_category_id'];
                    }

                    if ($key['price'] == 'NULL') {
                        $price = null;
                    } else {
                        $price = $key['price'];
                    }

                    if ($key['image'] == 'NULL') {
                        $image = null;
                        $placeholder_image = null;
                    } else {
                        $imageName = $key['image'];
                        $rand_name = time() . str_random(10);

                        $filename = $rand_name . '.' . $imageName;
                        $filename_sm = $rand_name . '-sm.' . $imageName;

                        Image::make(base_path('assets/img/items/bulk-upload/' . $imageName))
                            ->resize(486, 355)
                            ->save(base_path('assets/img/items/' . $filename));

                        $image = '/assets/img/items/' . $filename;

                        Image::make(base_path('assets/img/items/bulk-upload/' . $imageName))
                            ->resize(25, 18)
                            ->save(base_path('assets/img/items/small/' . $filename_sm));

                        $placeholder_image = '/assets/img/items/small/' . $filename;
                    }

                    if ($key['is_recommended'] == 'NULL') {
                        $is_recommended = null;
                    } else {
                        $is_recommended = $key['is_recommended'];
                    }

                    if ($key['is_popular'] == 'NULL') {
                        $is_popular = null;
                    } else {
                        $is_popular = $key['is_popular'];
                    }

                    if ($key['is_new'] == 'NULL') {
                        $is_new = null;
                    } else {
                        $is_new = $key['is_new'];
                    }

                    $insert[] = [
                        'name' => $name,
                        'restaurant_id' => $restaurant_id,
                        'item_category_id' => $item_category_id,
                        'price' => $price,
                        'image' => $image,
                        'placeholder_image' => $placeholder_image,
                        'is_recommended' => $is_recommended,
                        'is_popular' => $is_popular,
                        'is_new' => $is_new,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ];
                }
                if (!empty($insert)) {
                    try {
                        DB::table('items')->insert($insert);
                        return redirect()->back()->with(['success' => 'Operation Successful']);
                    } catch (\Illuminate\Database\QueryException $qe) {
                        return redirect()->back()->with(['message' => $qe->getMessage()]);
                    } catch (Exception $e) {
                        return redirect()->back()->with(['message' => $e->getMessage()]);
                    } catch (\Throwable $th) {
                        return redirect()->back()->with(['message' => $th]);
                    }
                }
            }
        }
    }

    /**
     * @param Request $request
     */
    public function locationBulkUpload(Request $request)
    {
        if ($request->hasFile('location_csv')) {
            $filepath = $request->file('location_csv')->getRealPath();

            $excel = Importer::make('Csv');
            $excel->hasHeader(true);
            $excel->load($filepath);
            $data = $excel->getCollection();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key) {

                    if ($key['name'] == 'NULL') {
                        $name = null;
                    } else {
                        $name = $key['name'];
                    }

                    if ($key['description'] == 'NULL') {
                        $description = null;
                    } else {
                        $description = $key['description'];
                    }

                    if ($key['is_popular'] == 'NULL') {
                        $is_popular = null;
                    } else {
                        $is_popular = $key['is_popular'];
                    }

                    if ($key['is_active'] == 'NULL') {
                        $is_active = null;
                    } else {
                        $is_active = $key['is_active'];
                    }

                    $insert[] = [
                        'name' => $name,
                        'description' => $description,
                        'is_active' => $is_active,
                    ];
                }
                if (!empty($insert)) {
                    try {
                        DB::table('locations')->insert($insert);
                        return redirect()->back()->with(['success' => 'Operation Successful']);
                    } catch (\Illuminate\Database\QueryException $qe) {
                        return redirect()->back()->with(['message' => $qe->getMessage()]);
                    } catch (Exception $e) {
                        return redirect()->back()->with(['message' => $e->getMessage()]);
                    } catch (\Throwable $th) {
                        return redirect()->back()->with(['message' => $th]);
                    }
                }
            }
        }
    }

    /**
     * @param Request $request
     */
    public function itemBulkUploadFromRestaurant(Request $request)
    {
        $user = Auth::user();
        $restaurantIds = $user->restaurants->pluck('id')->toArray();

        if ($request->hasFile('item_csv')) {
            $filepath = $request->file('item_csv')->getRealPath();

            $excel = Importer::make('Csv');
            $excel->hasHeader(true);
            $excel->load($filepath);
            $data = $excel->getCollection();

            if (!empty($data) && $data->count()) {
                foreach ($data as $key) {

                    if ($key['name'] == 'NULL') {
                        $name = null;
                    } else {
                        $name = $key['name'];
                    }

                    if ($key['restaurant_id'] == 'NULL') {
                        $restaurant_id = null;
                    } else {
                        if (in_array($key['restaurant_id'], $restaurantIds)) {
                            $restaurant_id = $key['restaurant_id'];

                        } else {
                            $restaurant_id = null;
                        }

                    }

                    if ($key['item_category_id'] == 'NULL') {
                        $item_category_id = null;
                    } else {
                        $item_category_id = $key['item_category_id'];
                    }

                    if ($key['price'] == 'NULL') {
                        $price = null;
                    } else {
                        $price = $key['price'];
                    }

                    if ($key['image'] == 'NULL') {
                        $image = null;
                        $placeholder_image = null;
                    } else {
                        $imageName = $key['image'];
                        $rand_name = time() . str_random(10);

                        $filename = $rand_name . '.' . $imageName;
                        $filename_sm = $rand_name . '-sm.' . $imageName;

                        Image::make(base_path('assets/img/items/bulk-upload/' . $imageName))
                            ->resize(162, 118)
                            ->save(base_path('assets/img/items/' . $filename));

                        $image = '/assets/img/items/' . $filename;

                        Image::make(base_path('assets/img/items/bulk-upload/' . $imageName))
                            ->resize(25, 18)
                            ->save(base_path('assets/img/items/small/' . $filename_sm));

                        $placeholder_image = '/assets/img/items/small/' . $filename;
                    }

                    if ($key['is_recommended'] == 'NULL') {
                        $is_recommended = null;
                    } else {
                        $is_recommended = $key['is_recommended'];
                    }

                    if ($key['is_popular'] == 'NULL') {
                        $is_popular = null;
                    } else {
                        $is_popular = $key['is_popular'];
                    }

                    if ($key['is_new'] == 'NULL') {
                        $is_new = null;
                    } else {
                        $is_new = $key['is_new'];
                    }

                    $insert[] = [
                        'name' => $name,
                        'restaurant_id' => $restaurant_id,
                        'item_category_id' => $item_category_id,
                        'price' => $price,
                        'image' => $image,
                        'placeholder_image' => $placeholder_image,
                        'is_recommended' => $is_recommended,
                        'is_popular' => $is_popular,
                        'is_new' => $is_new,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ];
                }
                if (!empty($insert)) {
                    try {
                        DB::table('items')->insert($insert);
                        return redirect()->back()->with(['success' => 'Operation Successful']);
                    } catch (\Illuminate\Database\QueryException $qe) {
                        return redirect()->back()->with(['message' => $qe->getMessage()]);
                    } catch (Exception $e) {
                        return redirect()->back()->with(['message' => $e->getMessage()]);
                    } catch (\Throwable $th) {
                        return redirect()->back()->with(['message' => $th]);
                    }
                }
            }
        }
    }
}
