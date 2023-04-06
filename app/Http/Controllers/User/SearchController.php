<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Search';
        $this->route = "search.";
        $this->resources = "user.buy.";
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info = $this->crudInfo();
        $lat = 28.209538;
        $lon = 83.991402;
        $distance = 10;
        $properties =  Listing::select(
                DB::Raw("(6371 * acos( cos( radians('$lat') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$lon') ) + sin( radians('$lat') ) * sin( radians(latitude) ) ) ) AS distance"),
                'id',
                'title',
                'description',
                'type',
                'location',
                'latitude',
                'longitude',
                'price',
                'features',
                'photo_url'

            )
                ->whereRaw("(6371 * acos( cos( radians('$lat') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$lon') ) + sin( radians('$lat') ) * sin( radians(latitude) ) ) ) <= $distance");
        if(auth()->user())
        {
            $properties = $properties->whereNot('user_id', auth()->user()->id);
            $info['favorites'] = Favorite::where('user_id', auth()->user()->id)->get();
//            dd()
        }
        $properties = $properties->where('type', 'sale')->get();
        $info['listings'] = $properties;


        if($request->ajax())
        {

//            dd($request->all());
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $favorites = [];
//            $distance = 10;
            $listings = Listing::select(
                    DB::Raw("(6371 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) AS distance"),
                    'id',
                    'title',
                    'description',
                    'type',
                    'location',
                    'latitude',
                    'longitude',
                    'price',
                    'features',
                    'photo_url'
                )
                ->whereRaw("(6371 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) <= $distance")
                ->where('type', $request->purpose);
            if(auth()->user())
            {
                $listings = $listings->whereNot('user_id', auth()->user()->id);
                $favorites = Favorite::where('user_id', auth()->user()->id)->pluck('listing_id');
            }
            if($request->type)
            {
                $listings = $listings->whereJsonContains('features->type', $request->type);
            }
            if($request->price)
            {
                $price = explode("-", $request->price);
//                dd($price);
                $listings = $listings->whereBetween('price', [$price[0], $price[1]]);
            }
            $listings = $listings->orderBy('distance', 'asc')
                ->get();
            $data = [
                'status' => true,
                'listings' => $listings,
                'favorites' => $favorites,
            ];
            return $data;
        }
        return view($this->indexResource(), $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'latitude' => 'required',
                'longitude' => 'required',
            ]);
            if ($validator->fails()) {
                $response['message'] = $validator->messages()->first();
                $response['success'] = false;
                return $response;
            }

            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $distance = 10;

            $vendors = Vendor::select(
                DB::Raw("(6371 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) AS distance"),
                'id',
                'name',
                'email',
                'phone',
                'address',
                'free_delivery',
                'latitude',
                'longitude',
                'tags',
                'legal_type',
                'is_featured',
                'registration_number',
                'legal_number',
                'short_description',
                'long_description'
            )
                ->whereRaw("(6371 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) <= $distance")
                ->where('status', 'active')
                ->orderBy('distance', 'asc')
                ->paginate(10);
            return response()->json([
                'success' => true,
                'data' => ['vendors' => $vendors]
            ]);

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
