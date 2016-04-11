@extends('layouts.app')

@section('content')
    <style>
        .row .project-thumb {
            margin-left: 10px;
        }
        .row .project-thumb:first-child {
            margin-left: 0px;
        }
        .project-thumb {
            border: 2px solid #E9E9E9;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                @foreach($projects as $key => $p)
                    @if($key % 4 == 0 && $key > 0)
                        </div>
                        <div class="row">
                    @endif
                    <div class="col-md-3 project-thumb">
                        <a href="{{ route('project_show', $p->id) }}">{{ $p->title }}</a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection