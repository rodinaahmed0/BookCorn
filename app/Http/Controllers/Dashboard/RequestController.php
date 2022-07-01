<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;

class RequestController extends Controller
{
    public function index() {
        $requests = ModelsRequest::where('status' , 'Pending')->get();
        return view("dashboard.requests.index" , compact('requests'));
    }

    public function show($id) {
        $request = ModelsRequest::FindOrFail($id);
        return view("dashboard.requests.show" , compact('request'));
    }


    public function approve(Request $r , $id) {
        $r->validate(
            [
               'long' => 'required',
               'lat' => 'required',
            ]
        );

        $request = ModelsRequest::FindOrFail($id);

        DB::transaction(function () use ($request  , $r) {
            $request->user->assignRole('manager');
            $request->user->removeRole('user');
            Cinema::create(
                [
                   'user_id' => $request->user->id,
                   'name' => $request->cinema_name,
                   'location' => $request->cinema_location,
                   'owner_phone' => $request->phone,
                   'image' => $request->image,
                   'lat' => $r->lat,
                   'long' => $r->long,
                ]
            );
            $request->update([
                'status' => 'Approved'
            ]);

        });

        return redirect(route('requests.index'));
    }

    public function cancel($id) {

        $request = ModelsRequest::FindOrFail($id);

        $request->update([
            'status' => 'Rejected'
        ]);

        return redirect(route('requests.index'));
    }

}
