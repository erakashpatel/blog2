@extends('layouts.app')

@section('content')
	<div class="container">
		<form method="GET" action="/projects">
		<div class="row">
			<div class="col-sm-2 col-md-2 col-xl-2"><h2>Projects</h2></div>
			<div class="col-sm-2 col-md-2 col-xl-2">
		      <input type="text" placeholder="Search.." name="filter_search" value="{{ @$_GET['filter_search']}}">
		    </div>
			<div class="col-sm-2 col-md-2 col-xl-2">
				<select name="filter_duration">
					<option value="">Select Duration</option>
		    		<option {{ ( @$_GET['filter_duration'] == 1) ? 'selected' : '' }} value="1">1 Month</option>
		    		<option {{ ( @$_GET['filter_duration'] == 2) ? 'selected' : '' }} value="2">2 Month</option>
		    		<option {{ ( @$_GET['filter_duration'] == 3) ? 'selected' : '' }} value="3">3 Month</option>
		    		<option {{ ( @$_GET['filter_duration'] == 6) ? 'selected' : '' }} value="6">6 Month</option>
		    		<option {{ ( @$_GET['filter_duration'] == 12) ? 'selected' : '' }} value="12">12 Month</option>
		    	</select>
			</div>
			<div class="col-sm-3 col-md-3 col-xl-3">
				<select name="filter_difficulty">
					<option value="">Select Difficulty</option>
		    		<option {{ ( @$_GET['filter_difficulty'] == 'Beginner') ? 'selected' : '' }}  value="Beginner">Beginner</option>
		    		<option {{ ( @$_GET['filter_difficulty'] == 'Intermediate') ? 'selected' : '' }}  value="Intermediate">Intermediate</option>
		    		<option {{ ( @$_GET['filter_difficulty'] == 'Advanced') ? 'selected' : '' }}  value="Advanced">Advanced</option>
		    	</select>
			</div>
			<div class="col-sm-1 col-md-1 col-xl-1"><button  class="btn btn-primary" name="button" value="Filter">Filter</button></div>
			<div class="col-sm-2 col-md-2 col-xl-2"><a href="/projects/create" class="btn btn-primary" role="button">Create Project</a></div>
		</div>

		<div class="container">
			<table class="table table-condensed" width="100%">
				<thead>
					<tr>
						<th>Project Title</th>
						<th>Project Duration</th>
						<th>Project Difficulty</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projects as $project)
					<tr>
						<td><a href="/projects/{{$project->id}}" title="{{ $project->title }}">{{ $project->title }}</a></td>
						<td>{{$project->duration }} Month</td>
						<td>{{$project->difficulty }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		
		</div>
	{{-- 	<ul class="list-group">
			@foreach($projects as $project)
				<li class="list-group-item"><a href="/projects/{{$project->id}}" title="{{ $project->title }}">{{ $project->title }}</a></li>
			@endforeach
		</ul> --}}
	</form>
	</div>
@endsection