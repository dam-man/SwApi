@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Take a look at these awesome Starwars peeps!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('failure'))
                            <div class="alert alert-warning">
                                {{ session('failure') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="links">
                                    <a class="btn btn-sm btn-success" href="{{url('api/import/people')}}">Import People</a>
                                    <a class="btn btn-sm btn-success" href="{{url('api/import/planets')}}">Import Planets</a>
                                    <a class="btn btn-sm btn-success" href="{{url('api/import/species')}}">Import Species</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Born</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Height</th>
                                        <th scope="col">Planet</th>
                                        <th scope="col">Population</th>
                                        <th scope="col">Terrain</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($people as $person)
                                        <tr>
                                            <td>{{$person->name}}</td>
                                            <td>{{$person->birth_year}}</td>
                                            <td>{{$person->gender}}</td>
                                            <td>{{$person->height}}</td>
                                            <td>{{$person->planet->name}}</td>
                                            <td>{{$person->planet->population}}</td>
                                            <td>{{$person->planet->terrain}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        {{$people->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
