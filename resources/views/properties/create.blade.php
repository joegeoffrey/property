@extends('layouts.main')

@section('title', '| Create New Property')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Property Details</h4>
					{!! Form::model($property, array('url' => '/properties/create', 'data-parsley-validate', 'files' => true)) !!}
					{{ Form::hidden('id') }}
					{{ Form::hidden('uuid') }}

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('county', 'County:') }}</div>
						<div class="col-md-9">
							{{ Form::text('county', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('property_type_id', 'Property Type:') }}</div>
						<div class="col-md-9">
							{{ Form::select('property_type_id',  $types, null, array('class' => 'form-control', 'required')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('country', 'Country:') }}</div>
						<div class="col-md-9">
							{{ Form::text('country', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('town', 'Town:') }}</div>
						<div class="col-md-9">
							{{ Form::text('town', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('address', 'Displayable Address:') }}</div>
						<div class="col-md-9">
							{{ Form::text('address', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('num_bedrooms', 'Number of Bedrooms:') }}</div>
						<div class="col-md-9">
							{{ Form::select('num_bedrooms',  $numbers, null, array('class' => 'form-control', 'required')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('num_bathrooms', 'Number of Bathrooms:') }}</div>
						<div class="col-md-9">
							{{ Form::select('num_bathrooms', $numbers, null, array('class' => 'form-control', 'required')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('price', 'Price:') }}</div>
						<div class="col-md-9">
							{{ Form::text('price', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3 col-form-label">{{ Form::label('type', 'Property Type:') }}</div>
						<div class="col-md-9">
							{{ Form::text('type', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-3">{{ Form::label('type', 'Type:') }}</div>
						<div class="col-md-3">{{ Form::radio('type', 'sale', array('class' => 'form-control', 'required')) }} For Sale</div>
						<div class="col-md-3">{{ Form::radio('type', 'rent', array('class' => 'form-control', 'required')) }} For Rent</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-3">{{ Form::label('description', "Description:") }}</div>
						<div class="col-md-9">
							{{ Form::textarea('description', null, array('class' => 'form-control')) }}		
						</div>
					</div>

					{{ Form::label('image', 'File Upload') }}
					{{ Form::file('image') }}

					{{ Form::submit('Save Property', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;')) }}

					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>

@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection
