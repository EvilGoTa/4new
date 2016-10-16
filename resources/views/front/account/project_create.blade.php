@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Creating new project</div>

                <div class="panel-body">
                    @if (isset($project))
                        <form id="project-form" action="{{ route('home.project.update', ['id' => $project->id]) }}" method="POST" class="form-horizontal">
                            {!! method_field('PATCH') !!}
                    @else
                        <form id="project-form" action="{{ route('home.project.store') }}" method="POST" class="form-horizontal">
                    @endif
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Название</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="project-name" class="form-control" value="{{ $project->title or old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-sm-3 control-label">Изображения</label>

                            <div class="col-sm-6">
                                @include('common.fileupload')
                            </div>
                        </div>

                        @push('scripts_bottom')
                        <script src="/js/wisibb/jquery.wysibb.min.js"></script>
                        <script>
                            $(function() {
                                window.wisibb = $("#project-description").wysibb();
                            })
                        </script>
                        @endpush
                        <link rel="stylesheet" href="/css/wisibb/theme/default/wbbtheme.css" />
                        <div class="form-group">
                            <label for="content" class="col-sm-3 control-label">Содержание</label>
                        </div>

                        <div class="form-group" style="padding: 0px 20px">
                            <textarea name="description" id="project-description" style="width: 100%; height: 400px">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="adress" class="col-sm-3 control-label">Адрес</label>

                            <div class="col-sm-6">
                                <input type="text" name="adress" id="project-adress" class="form-control" value="{{ $project->adress or  old('adress') }}">
                                @if (isset($project->description))
                                    @push('scripts_bottom')
                                    <script>
                                        $(function() {
                                            window.wisibb.htmlcode('{!! $project->description !!}');
                                        });
                                    </script>
                                    @endpush
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Телефон</label>

                            <div class="col-sm-6" >
                                <div id="phone-container">
                                    <input type="text" name="phone[]"  class="form-control" value="">
                                </div>
                                <a class="btn btn-default" onclick="add_phone()">
                                    <i class="fa fa-plus"></i> Add phone
                                </a>

                                @push('scripts_bottom')
                                <script>
                                    function add_phone() {
                                        var sample = $('#phone-container input:first');
                                        console.log(sample[0].outerHTML);
                                        console.log('!!!');
                                        $('#phone-container').append(sample[0].outerHTML+'<br>');
                                        console.log('test');
                                        return false;
                                    }
                                </script>
                                @endpush
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection