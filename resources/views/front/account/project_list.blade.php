@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page['title'] }}</div>

                <div class="panel-body">
                    <p>{{ $page['top_info'] }}</p>

                    @if(count($projects) > 0)
                        projects ....
                    @else
                        no projects!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection