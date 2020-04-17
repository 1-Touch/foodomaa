<?php

namespace App\Http\Controllers;

use App\AcceptDelivery;
use App\DeliveryCollection;
use App\DeliveryCollectionLog;
use App\User;
use Illuminate\Http\Request;

class DeliveryCollectionController extends Controller
{
    public function deliveryCollections()
    {
        $count = DeliveryCollection::get()->count();
        $deliveryCollections = DeliveryCollection::paginate();

        return view('admin.deliveryCollections', array(
            'count' => $count,
            'deliveryCollections' => $deliveryCollections,
        ));
    }

    /**
     * @param Request $request
     */
    public function collectDeliveryCollection(Request $request)
    {
        // dd($request->all());

        $deliveryCollection = DeliveryCollection::where('id', $request->delivery_collection_id)->first();

        if ($deliveryCollection) {

            $deliveryCollectionLog = new DeliveryCollectionLog();
            $deliveryCollectionLog->delivery_collection_id = $deliveryCollection->id;
            if ($request->type == 'FULL') {
                $deliveryCollectionLog->amount = $deliveryCollection->amount;
                $deliveryCollectionLog->type = 'FULL';

                $deliveryCollection->amount = 0;
            }
            if ($request->type == 'CUSTOM') {
                $deliveryCollectionLog->amount = $request->custom_amount;
                $deliveryCollectionLog->type = 'CUSTOM';

                if ((float) $request->custom_amount > (float) $deliveryCollection->amount) {
                    $deliveryCollection->amount = 0;
                } else {
                    $deliveryCollection->amount = (float) $deliveryCollection->amount - (float) $request->custom_amount;
                }
            }

            $deliveryCollectionLog->message = $request->message;

            try {
                $deliveryCollectionLog->save();

                $deliveryCollection->save();
                return redirect()->back()->with(['success' => 'Amount Collected']);
            } catch (\Illuminate\Database\QueryException $qe) {
                return redirect()->back()->with(['message' => $qe->getMessage()]);
            } catch (Exception $e) {
                return redirect()->back()->with(['message' => $e->getMessage()]);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['message' => $th]);
            }
        } else {
            return redirect()->back()->with(['message' => 'Not Found']);
        }
    }

    public function deliveryCollectionLogs()
    {
        $count = DeliveryCollectionLog::get()->count();
        $logs = DeliveryCollectionLog::paginate();

        return view('admin.deliveryCollectionLogs', array(
            'count' => $count,
            'logs' => $logs,
        ));
    }

    /**
     * @param $id
     */
    public function deliveryCollectionLogsForSingleUser($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            //check if user is delivery/check if DeliveryCollection has user_id of $id
            $hasSomeCollection = DeliveryCollection::where('user_id', $id)->first();
            if ($hasSomeCollection) {
                $count = DeliveryCollectionLog::where('delivery_collection_id', $hasSomeCollection->id)->count();
                $logs = DeliveryCollectionLog::where('delivery_collection_id', $hasSomeCollection->id)->paginate(100);
                return view('admin.deliveryCollectionLogs', array(
                    'count' => $count,
                    'logs' => $logs,
                ));
            }
        } else {
            return redirect()->route('admin.deliveryCollections')->with(['message' => 'Not Found']);
        }
    }
};
