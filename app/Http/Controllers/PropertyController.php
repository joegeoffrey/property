<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Property;
use App\PropertyType;

class PropertyController extends Controller
{
    public function index(Request $request){
    	$properties = Property::all();

    	return view('properties.index', compact('properties'));
    }

    public function create(Request $request){
    	$property = Property::where('uuid', $request->uuid)->firstOrNew();

    	if($request->isMethod('post')){    		
    		$property->fill($request->except(['_token', 'image']));

    		if($request->hasFile('image')) {
			    $image = $request->file('image');
			    $image_url = $image->store('public');
			    
			    $img = Image::make(Storage::get($image_url));
				$img->resize(320, 240);

				$thumbname = $property->uuid.'-thumb.jpeg';
				$path = storage_path('app/public/'.$thumbname);
				$thumb = $img->save($path);

			    $property->image_full = $image_url;
			    $property->image_thumbnail = 'storage/'.$thumbname;
			}

    		$property->save();

    		return redirect('properties')->with('message', 'Property has been saved');
    	}

    	$numbers = range(0, 10);

    	$types = [];

    	$propertyTypes = PropertyType::all();
    	foreach($propertyTypes as $type){
    		$types[$type->id] = $type->title;
    	}

    	return view('properties.create', compact('property', 
    		'numbers', 'types'));
    }

    public function delete(Request $request) {
    	$property = Property::where('uuid', $request->uuid)->firstOrFail();

        $property->delete();

        return redirect('properties')->with('message', 'Property has been deleted');
    }
}
