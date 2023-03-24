@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Progetto') }}</div>

                <div class="card p-4">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if ($project->image)

                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width:300px; margin-bottom:15px">

                    @endif
                    
                    <h2>{{ $project->title }}</h2>

                    <p>{{ $project->description }}</p>

                    <p>{{ $project->tags }}</p>

                    <div>

                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning d-inline-block ">Modifica</i></a>

                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}" method="post"  onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
                            @csrf
                                
                            @method('DELETE')

                            <button class="btn btn-danger">Elimina</i></button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection