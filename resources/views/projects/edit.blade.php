@extends('layouts.app')

@section('content')

	<div class="container">
	<h2>Edit Project {{ $project->title }}</h2>
		<form action="/projects/{{ $project->id }}" method="POST">
			@method('PATCH')
			@csrf
			<div class="form-group">
			    <label for="title">Project Title</label>
			    <input id="title" type="text" class="form-control" placeholder="Project title" name="title" value="{{ $project->title }}">
			</div>
			<div class="form-group">
		    	<label for="project_description">Project Description</label>
		    	<textarea class="form-control" id="project_description" rows="3" name="description" id="project_description" placeholder="Project Description">{{ $project->description}}</textarea>
		  	</div>
		  	<div class="form-group">
		    	<label for="project_duration">Project Duration</label>
		    	<select class="form-control" name="duration">
		    		<option value="">Select</option>
		    		<option {{ ( $project->duration == 1) ? 'selected' : '' }} value="1">1 Month</option>
		    		<option {{ ( $project->duration == 2) ? 'selected' : '' }} value="2">2 Month</option>
		    		<option {{ ( $project->duration == 3) ? 'selected' : '' }} value="3">3 Month</option>
		    		<option {{ ( $project->duration == 6) ? 'selected' : '' }} value="6">6 Month</option>
		    		<option {{ ( $project->duration == 12) ? 'selected' : '' }} value="12">12 Month</option>
		    	</select>
		  	</div>
		  		<div class="form-group">
		    	<label for="project_difficulty">Project Difficulty</label>
		    	<select class="form-control" name="difficulty">
		    		<option value="">Select Project Level</option>
		    		<option {{ ( $project->difficulty == 'Beginner') ? 'selected' : '' }} value="Beginner">Beginner</option>
		    		<option {{ ( $project->difficulty == 'Intermediate') ? 'selected' : '' }} value="Intermediate">Intermediate</option>
		    		<option {{ ( $project->difficulty == 'Advanced') ? 'selected' : '' }} value="Advanced">Advanced</option>
		    	</select>
		  	</div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		@include('layouts.errors')
	
		<form action="/projects/{{ $project->id }}" method="POST">
			@method('DELETE')
			@csrf
			
		  <button type="submit" class="btn btn-danger">Delete</button>
		</form>
		
	</div>
@endsection