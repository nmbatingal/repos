<?php

namespace App\Http\Controllers;

use App\Hotel;
use Geocoder\Geocoder;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Hotel::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $hotel = new Hotel;

        $hotel->name = $request->input('name');
        $hotel->description = $request->input('description');
        $hotel->type = $request->input('type');
        $hotel->image = $request->input('image');
        $hotel->save();

        return 'Hotel record successfully created with id ' . $hotel->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Hotel::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $hotel = Hotel::find($id);

        $hotel->name = $request->input('name');
        $hotel->description = $request->input('description');
        $hotel->type = $request->input('type');
        $hotel->image = $request->input('image');
        $hotel->save();

        return "Sucess updating hotel #" . $hotel->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return "Hotel record successfully deleted #" . $id;
    }

}