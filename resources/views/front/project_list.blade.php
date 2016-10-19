@extends('layouts.app')

@section('content')
        <!-- works -->
<div id="works"  class=" clearfix grid">
    @foreach($projects as $key => $p)
        <figure class="effect-oscar  wowload fadeIn">
            <img src="{{ $p->title_image or '/theme/images/portfolio/6.jpg' }}" alt="img01"/>
            <figcaption>
                <h2>{{ $p->title }}</h2>
                <p>{{ $p->brief_description }}<br>
                    <a href="{{ route('project_show', $p->id) }}" title="1">Смотреть ещё</a></p>
            </figcaption>
        </figure>
    @endforeach
</div>
@push('scripts_bottom')
<script src="/theme/assets/wow/wow.min.js"></script>
<script src="/theme/assets/mobile/touchSwipe.min.js"></script>
<script src="/theme/assets/respond/respond.js"></script>
<script src="/theme/assets/script.js"></script>
@endpush
<!-- works -->
    {{-- старая версия
    <style>
        .row .project-thumb {
            margin-left: 10px;
            margin-bottom: 10px;
            padding: 5px;
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
                    <div class="col-md-3">
                        <div class="project-thumb">
                            <a href="{{ route('project_show', $p->id) }}">{{ $p->title }}</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    --}}
@endsection