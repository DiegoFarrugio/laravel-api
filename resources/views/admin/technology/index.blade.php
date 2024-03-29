@extends('layouts.app')

@section('page-title', 'Tutti i Technology')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        Tutti i Technology!
                    </h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.technologies.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Creato il</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologies as $technology)
                            <tr>
                                <th scope="row">{{$technology->id}} </th>
                                <td>{{$technology->title}}</td>
                                <td>{{$technology->created_at->format('H:i d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('admin.technologies.show', ['technology' => $technology->id ])}}" class="btn btn-primary ">
                                        PULSANTE
                                    </a>

                                    <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-xs btn-warning">
                                        Modifica
                                    </a>

                                    <form class="d-inline-block" action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>

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