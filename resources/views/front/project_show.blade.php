@extends('layouts.app')

@section('content')
    <style>
        #main img {
            max-width: 100%;
        }

        .nav-tabs {
            margin-bottom: 10px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $project->title }}</h1>
                <ul id="project-tabs" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#main">Главная</a></li>
                    <li role="presentation"><a href="#contacts">Контакты</a></li>
                    <li role="presentation"><a href="#comments">Коментарии</a></li>
                </ul>
                <div id="main">
                    {!! $project->description !!}
                </div>
                <div id="contacts" style="display: none">
                    <div>
                        тут будет карта
                    </div>
                    <div>
                        <strong>Адрес:</strong> {{ $project->adress }}
                        <br>
                        <strong>Телефон:</strong> {{ $project->phone }}
                    </div>
                </div>
                <div id="comments" style="display: none">comments</div>
            </div>
            <div class="col-md-12 spacer"></div>
            <div class="col-md-12 text-center">
                @if ($rated)
                    {{--*/ $disabled = 'disabled' /*--}}
                @else
                    {{--*/ $disabled = '' /*--}}
                @endif
                <div class="col-md-4">
                    <a class="btn btn-primary btn-block {{ $disabled }}" href="{{ route('project_rate', ['project' => $project->id, 'updown' => 'up']) }}">+</a>
                </div>
                <div class="col-md-4">
                    <h4>{{ $rating_value }}</h4>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-danger btn-block {{ $disabled }}" href="{{ route('project_rate', ['project' => $project->id, 'updown' => 'down']) }}">-</a>
                </div>
            </div>
            <div class="col-md-12 spacer"></div>
            @push('scripts_bottom')
            <script>
                $('#project-tabs li[role="presentation"] a').on('click', function(e) {
                    e.preventDefault();
                    var target = $('#project-tabs li.active[role="presentation"] a').attr('href');
                    $(target).hide();
                    console.log('hiding '+target);
                    $('#project-tabs li[role="presentation"]').removeClass('active');
                    $(this).parent().addClass('active');
                    $($(this).attr('href')).show();
                    console.log('showing '+$(this).attr('href'));
                })
            </script>
            @endpush
        </div>
    </div>
@endsection