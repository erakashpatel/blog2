@extends('layouts.app')

@section('content')

	<div class="container">
	<h2>Create New projects</h2>
		<form action="/projects" method="POST">
			@csrf
			<div class="form-group">
			    <label for="exampleFormControlInput1">Project Title</label>
			    <input type="text" class="form-control" placeholder="Project title" name="title">
			</div>
			<div class="form-group">
		    	<label for="project_description">Project Description</label>
		    	<textarea class="form-control" id="project_description" rows="3" name="description" placeholder="Project Description"></textarea>
		  	</div>
		  	<div class="form-group">
		    	<label for="project_duration">Project Duration</label>
		    	<select class="form-control" name="duration">
		    		<option value="">Select</option>
		    		<option value="1">1 Month</option>
		    		<option value="2">2 Month</option>
		    		<option value="3">3 Month</option>
		    		<option value="6">6 Month</option>
		    		<option value="12">12 Month</option>
		    	</select>
		  	</div>
		  		<div class="form-group">
		    	<label for="project_difficulty">Project Difficulty</label>
		    	<select class="form-control" name="difficulty">
		    		<option value="">Select Project Level</option>
		    		<option value="Beginner">Beginner</option>
		    		<option value="Intermediate">Intermediate</option>
		    		<option value="Advanced">Advanced</option>
		    	</select>
		  	</div>
		  	
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		@include('layouts.errors')
	</div>
@endsection