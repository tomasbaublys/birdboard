<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Birdboard</h1>
	<ul>
		@foreach ($projects as $project)
			<li>
				<a href="{{ $project->path() }}">{{ $project->title }}</a>
			</li>
		@endforeach
	</ul>
</body>
</html>