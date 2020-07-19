<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\PropertyType;
use App\Property;

class FetchPropertiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'properties:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes property inventory';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('http://trialapi.craig.mtcdevserver.com/api/properties', [
            'api_key' => '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug'
        ]);

        if($response->successful()){
            $response = $response->json();
            $data = $response['data'];

            foreach($data as $d){
                $type = $d['property_type'];

                $propertyType = PropertyType::findOrNew($type['id']);
                $propertyType->id = $type['id'];
                $propertyType->title = $type['title'];
                $propertyType->description = $type['description'];
                $propertyType->save();

                $property = Property::where('uuid', $d['uuid'])->firstOrNew();
                $property->uuid = $d['uuid'];
                $property->property_type_id = $d['property_type_id'];
                $property->county = $d['county'];
                $property->country = $d['country'];
                $property->town = $d['town'];
                $property->description = $d['description'];
                $property->address = $d['address'];
                $property->image_full = $d['image_full'];
                $property->image_thumbnail = $d['image_thumbnail'];
                $property->latitude = $d['latitude'];
                $property->longitude = $d['longitude'];
                $property->num_bedrooms = $d['num_bedrooms'];
                $property->num_bathrooms = $d['num_bathrooms'];
                $property->price = $d['price'];
                $property->type = $d['type'];
                $property->created_at = $d['created_at'];
                $property->updated_at = $d['updated_at'];

                $property->save();
            }
            
            Log::info('===== Updated '.count($data).' properties =====');
        }

        return 0;
    }
}
