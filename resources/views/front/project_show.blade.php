@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $project->title }}</h1>
                <div>
                    {!! $project->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection