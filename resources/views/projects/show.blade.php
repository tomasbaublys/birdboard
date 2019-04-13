@extends('layouts.app')

@section('content')
<header class="flex items-center mb-3 pb-4">
	<div class="flex justify-between items-end w-full">
		<p class="text-grey text-sm font-normal">
			<a href="/projects" class="text-grey text-sm font-normal no-underline">My Projects</a> / {{ $project->title }}
		</p>
		<a href="{{ $project->path() . '/edit' }}" class="button">Edit Project</a>
	</div>
</header>

<main>
	<div class="lg:flex -mx-3">
		<div class="lg:w-3/4 px-3 mb-6">
			<div class="mb-8">
				<h2 class="text-lg text-grey font-normal mb-3">Tasks</h2>

				@foreach ($project->tasks as $task)
					<div class="card mb-3">
						<form method="post" action="{{ $task->path() }}">
						@method('PATCH')
						@csrf
						<div class="flex">
							<input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
							<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
						</div>
						</form>
					</div>
				@endforeach

				<div class="card mb-3">
					<form action="{{ $project->path() . '/tasks' }}" method="post">
						@csrf

						<input placeholder="Begin adding tasks..." class="w-full" name="body">
					</form>
				</div>
			</div>
			<div> 
				<h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>
				<form method="post" action="{{ $project->path() }}">
					@method('PATCH')
					@csrf
					<textarea name="notes" class="card w-full mb-4" style="min-height: 180px" placeholder="Anything special?">{{ $project->notes }}</textarea>
					<button type="submit" class="button">Save</button>
				</form>
				
				@if ($errors->any())
				    <div class="field mt-6">
				        @foreach ($errors->all() as $error)
				            <li class="text-sm text-red ">{{ $error }}</li>
				        @endforeach
				    </div>
				@endif

			</div>
		</div>
		<div class="lg:w-1/4 px-3 py-8">
			@include ('projects.card')			
			@include ('projects.activity.card')
		</div>
	</div>
</main>
@endsection
