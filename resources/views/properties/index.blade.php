@extends('layouts.main')

@section('title', '| All Properties')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">All Properties</h4>
				<table class="table table-striped" id="datatable">
					<thead>
						<tr>
							<th>Image</th>
							<th>Type</th>
							<th>Location</th>
							<th>Description</th>
							<th>Bed / Baths</th>
							<th>Price</th>
							<th>Actions</th>
						</tr>
					</thead>
					@foreach($properties as $property)
					  <tr>
					  	<td><img src="{{$property->thumbnail_url}}" class="thumbnail" /></td>
					    <td class="no-wrap">{{$property->propertytype->title}}</td> 
					    <td>
					    	{{$property->town}}</br>
					    	{{$property->county}}</br>
					    	{{$property->country}}</br>
					    	<a href="https://maps.google.com/?q={{$property->latitude}},{{$property->longitude}}" target="_blank"><i class="fa fa-external-link"></i> Map Location</a>
					    </td>
					    <td>{{$property->description}}</td>
					    <td class="no-wrap" data-sort="{{$property->num_bedrooms}}">{{$property->num_bedrooms}} beds / {{$property->num_bathrooms}} baths</td>
						<td class="no-wrap" data-sort="{{$property->price}}">
							{{$property->formatted_price}}</br>
							<span class="badge badge-{{$property->type_class}}">{{$property->type}}</span>
						</td>
						<td class="no-wrap actions">
							<a href="/properties/edit?uuid={{$property->uuid}}"><i class="fa fa-pencil-square-o"></i></a>
							{!! Form::open(['url' => '/properties/delete', 'method' => 'DELETE']) !!}
							{{Form::hidden('uuid', $property->uuid)}}
							<a href="#" class="delete text-danger"><i class="fa fa-trash-o"></i></a>

							{!! Form::close() !!}
						</td>
					  </tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection