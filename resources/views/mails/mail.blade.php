<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

        <h1>Nuovo Progetto</h1>

        @if ($project->image)

            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width:300px; margin-bottom:15px">

        @endif

        <h2>{{ $project->title }}</h2>

        <p>{{ $project->description }}</p>

        @if ($project->tags)

            <p>{{ $project->tags }}</p>

        @endif
        
    </body>
</html>