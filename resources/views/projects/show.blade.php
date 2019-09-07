@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-md-10 col-xl-10"><h2>Project {{ $project->title }}</h2></div>
			<div class="col-sm-2 col-md-2 col-xl-2"><a href="/projects/{{ $project->id }}/edit" class="btn btn-primary" role="button">Edit Project</a></div>
		</div>
		{{ $project->description }}
	
	</div>
@endsection