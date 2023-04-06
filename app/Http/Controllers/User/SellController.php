<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class SellController extends BaseController
{
    public function __construct()
    {
        $this->title = "Sell";
        $this->route = 'sell.';
        $this->resources = 'user.sell.';
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = $this->crudInfo();
        $info['listings'] = Listing::where('user_id', auth()->user()->id)->where('type', 'sale')->get();
        return view($this->indexResource(), $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = $this->crudInfo();
        return view($this->createResource(), $info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        $features = [
            "deposit" => $request->deposit,
            "duration" => $request->duration,
            "area" => $request->area,
            "bedroom" => $request->bedroom,
            "bathroom" => $request->bathroom,
            "livingroom" => $request->livingroom,
            "kitchen" => $request->kitchen,
            "rent_date" => $request->rent_date,
            "no_of_stories" => $request->no_of_stories,
            "road_width" => $request->road_width,
            "parking" => $request->parking,
            "type" => $request->type,
        ];

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description?:null,
            'location' => $request->location?:null,
            'latitude' => $request->latitude?:null,
            'longitude' => $request->longitude?:null,
            'user_id' => auth()->user()->id,
            'features' => json_encode($features, true),
            'type' =>'sale',
        ];

        $listing = new Listing($data);
        $listing->save();
        if ($request->file('files') && count($request->file('files')) > 0) {
            foreach ($request->file('files') as $document) {
                $name = round(microtime(true) * 1000) . '-' . rand(111, 999);
                $fileName = $name . '.' . $document->extension();
                $media = $listing->addMedia($document)
                    ->usingName($name)
                    ->usingFileName($fileName)
                    ->toMediaCollection('listings');
                $media->save();
            }
        }
        if($request->video_url)
        {
            $listing->addMediaFromRequest('video_url')
                ->toMediaCollection('video');
        }
        return redirect()->route($this->indexRoute())->with('success', 'Listing Saved Successfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info['item'] = Listing::findOrFail($id);
        return view($this->showResource(), $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = $this->crudInfo();
        $info['item'] = Listing::findOrFail($id);
        return view($this->editResource(), $info);
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
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        $features = [
            "deposit" => $request->deposit,
            "duration" => $request->duration,
            "area" => $request->area,
            "bedroom" => $request->bedroom,
            "bathroom" => $request->bathroom,
            "livingroom" => $request->livingroom,
            "kitchen" => $request->kitchen,
            "rent_date" => $request->rent_date,
            "no_of_stories" => $request->no_of_stories,
            "road_width" => $request->road_width,
            "parking" => $request->parking,
            "type" => $request->type,
        ];

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description?:null,
            'location' => $request->location?:null,
            'latitude' => $request->latitude?:null,
            'longitude' => $request->longitude?:null,
            'user_id' => auth()->user()->id,
            'features' => json_encode($features, true),
            'type' => 'sale',
        ];

        $listing = Listing::findOrFail($id);
        $listing->update($data);
        if ($request->file('files') && count($request->file('files')) > 0) {
            foreach ($request->file('files') as $document) {
                $name = round(microtime(true) * 1000) . '-' . rand(111, 999);
                $fileName = $name . '.' . $document->extension();
                $media = $listing->addMedia($document)
                    ->usingName($name)
                    ->usingFileName($fileName)
                    ->toMediaCollection('listings');
                $media->save();
            }
        }
        if($request->video_url)
        {
            $listing->clearMediaCollection('video');
            $listing->addMediaFromRequest('video_url')
                ->toMediaCollection('video');
        }
        return redirect()->route($this->indexRoute())->with('success', 'Listing Saved Successfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();
        $listing->clearMediaCollection('listings');
        $listing->clearMediaCollection('video');
        return redirect()->back()->with('success', 'Listings Deleted Successfully.');
    }
}
