<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
	use SoftDeletes;

    protected $guarded = ['id'];

    public function propertytype(){
    	return $this->belongsTo('App\PropertyType', 'property_type_id');
    }

    public function getThumbnailUrlAttribute(){
    	$exists = Storage::exists($this->image_thumbnail);

    	if($exists){
    		return url(Storage::url($this->image_thumbnail));
    	}

    	return $this->image_thumbnail;
    }

    public function getTypeClassAttribute(){
        $class = 'info';
        switch($this->type){
            case 'sale':
                $class = 'success';
                break;
            case 'rent':
                $class = 'warning';
                break;
        }

        return $class;
    }

    public function getFormattedPriceAttribute(){
        return number_format($this->price, 0);
    }
}
