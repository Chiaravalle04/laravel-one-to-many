@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Progetti') }}</div>

                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-3 m-3">
                        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Aggiungi progetto</a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Tags</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        
                        @foreach ($projects as $project)
                            
                        <tr>
                            <th class="col-1 align-middle">{{ $project->id }}</th>
                            <td class="col-2 align-middle">{{ $project->title }}</td>
                            <td class="col-6 align-middle">{{ $project->description }}</td>
                            <td class="col-1 align-middle">{{ $project->tags }}</td>
                            <td class="col-2 align-middle">
                                
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">Visualizza</a>
                                                    
                            </td>
                        </tr>

                      @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection