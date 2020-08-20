@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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

                        <div class="links">
                            <a class="btn btn-sm btn-success" href="{{url('api/import/people')}}">Import People</a>
                            <a class="btn btn-sm btn-success" href="{{url('api/import/planets')}}">Import Planets</a>
                            <a class="btn btn-sm btn-success" href="{{url('api/import/species')}}">Import Species</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
