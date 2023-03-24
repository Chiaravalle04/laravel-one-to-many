@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Modifica progetto') }}</div>

                <div class="card">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>

                <form class="p-4" action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo*</label>
                        <input type="text" 
                            class="form-control" 
                            id="title" 
                            name="title"
                            value="{{ old('title', $project->title) }}"
                            placeholder="Inserisci il titolo..."
                            required
                            maxlength="120"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione*</label>
                        <textarea 
                            class="form-control" 
                            id="description" 
                            name="description"
                            rows="3" 
                            placeholder="Inserisci la descrizione..."
                            required
                        >{{ old('description', $project->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Framework utilizzato</label>                     
                        <input type="text" 
                            class="form-control" 
                            id="tags" 
                            name="tags"
                            value="{{ old('tags', $project->tags) }}"
                            placeholder="Inserisci il framework..."
                        >
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Immagine progetto
                        </label>

                        @if ($project->image)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image">
                                <label class="form-check-label" for="delete_image">
                                    Cancella immagine in evidenza
                                </label>
                            </div>

                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $project->image) }}" style="width:300px;" alt="{{ $project->title }}">
                            </div>
                        @endif

                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            accept="image/*">
                    </div>

                    <button class="btn btn-warning" type="submit">Modifica</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection