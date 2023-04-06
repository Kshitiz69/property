<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ListingController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Properties';
        $this->resources = 'admin.listings.';
        parent::__construct();
        $this->route = 'admin-listings.';
    }

    public function index()
    {
        $info = $this->crudInfo();
        $info['hideCreate'] = true;
        $info['items'] = Listing::orderBy('id', 'desc')->paginate(10);
        return view($this->indexResource(), $info);
    }
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
     * @param  \App\Models\Listing  $listing
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
            'type' => $request->purpose,
            'features' => json_encode($features, true),
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

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();
        $listing->clearMediaCollection('listings');
        $listing->clearMediaCollection('video');
        return redirect()->back()->with('success', 'Listings Deleted Successfully.');
    }
    public function deleteFile(Request $request)
    {
//        dd($request->id);
        $media = Media::findOrFail($request->id);
        $media->delete();
        return response()->json(['status' => true, 'message' => 'Deleted Successfully']);
    }
}
