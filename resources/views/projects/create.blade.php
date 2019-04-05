@extends('layouts.app')

@section('content')

	<h1>Create a Project</h1>
	<form action="/projects" method="POST">
		{{ csrf_field() }}
		<div class="field">
			<label class="label" for="title">Project Title</label>
			<div class="control">
				<input type="text" class="input" name="title" value="">
			</div>
		</div>
		<div class="field">
			<label class="label" for="description">Description</label>

			<div class="control">
				<textarea name="description" class="textarea"></textarea>
			</div>
		</div>		
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Create Project</button>
				<button type="submit" class="button is-link">Cancel</button>
			</div>
		</div>		
	</form>

@endsection
