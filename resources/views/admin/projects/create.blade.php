@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Aggiungi progetto') }}</div>

                <div class="card">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>

                <form class="p-4" action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo*</label>
                        <input type="text" 
                            class="form-control" 
                            id="title" 
                            name="title"
                            value="{{ old('title') }}"
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
                            value="{{ old('description') }}"
                            rows="3" 
                            placeholder="Inserisci la descrizione..."
                            required
                        ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Framework utilizzato</label>                     
                        <input type="text" 
                            class="form-control" 
                            id="tags" 
                            name="tags"
                            value="{{ old('tags') }}"
                            placeholder="Inserisci il framework..."
                        >
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Immagine progetto
                        </label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            accept="image/*">
                    </div>

                    <button class="btn btn-primary" type="submit">Aggiungi</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection