@extends('layouts.app')

@section('content')

<div class="flex items-center mb-3">
	<h1 class="mr-auto">Birdboard</h1>
	<a href="/projects/create">Create New Project</a>
</div>
	<ul>
		@foreach ($projects as $project)
			<li>
				<a href="{{ $project->path() }}">{{ $project->title }}</a>
			</li>
		@endforeach
	</ul>

@endsection
