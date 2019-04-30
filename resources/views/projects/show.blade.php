@extends('layouts.app')

@section('content')
<header class="flex items-center mb-3 pb-4">
	<div class="flex justify-between items-end w-full">
		<p class="text-default text-sm font-normal">
			<a href="/projects" class="text-default text-sm font-normal no-underline">My Projects</a> / {{ $project->title }}
		</p>
		 <div class="flex items-center">
            @foreach ($project->members as $member)
                <img
                    src="{{ gravatar_url($member->email) }}"
                    alt="{{ $member->name }}'s avatar"
                    class="rounded-full w-8 mr-2">
            @endforeach

            <img
                src="{{ gravatar_url($project->owner->email) }}"
                alt="{{ $project->owner->name }}'s avatar"
                class="rounded-full w-8 mr-2">

            <a href="{{ $project->path().'/edit' }}" class="button ml-4">Edit Project</a>
        </div>
	</div>
</header>

<main>
	<div class="lg:flex -mx-3">
		<div class="lg:w-3/4 px-3 mb-6">
			<div class="mb-8">
				<h2 class="text-lg text-default font-normal mb-3">Tasks</h2>

				@foreach ($project->tasks as $task)
					<div class="card mb-3">
						<form method="post" action="{{ $task->path() }}">
						@method('PATCH')
						@csrf
						<div class="flex">
							<input name="body" value="{{ $task->body }}" class="bg-card text-default w-full {{ $task->completed ? 'text-default' : '' }}">
							<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
						</div>
						</form>
					</div>
				@endforeach

				<div class="card mb-3">
					<form action="{{ $project->path() . '/tasks' }}" method="post">
						@csrf

						<input placeholder="Begin adding tasks..." class="bg-card text-default w-full" name="body">
					</form>
				</div>
			</div>
			<div> 
				<h2 class="text-lg text-default font-normal mb-3">General Notes</h2>
				<form method="post" action="{{ $project->path() }}">
					@method('PATCH')
					@csrf
					<textarea name="notes" class="card w-full mb-4" style="min-height: 180px" placeholder="Anything special?">{{ $project->notes }}</textarea>
					<button type="submit" class="button">Save</button>
				</form>
				
				@include('errors')

			</div>
		</div>
		<div class="lg:w-1/4 px-3 py-8">
			@include ('projects.card')			
			@include ('projects.activity.card')
			{{-- @if (auth()->user()->is($project->owner))  --}}
			@can ('manage', $project)
				@include ('projects.invite')
			@endcan
			{{-- @endif --}}
		</div>
	</div>
</main>
@endsection
