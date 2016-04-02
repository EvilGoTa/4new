@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Creating new project</div>

                <div class="panel-body">
                    <form id="project-form" action="{{ url('home/project/') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Название</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="project-name" class="form-control">
                            </div>
                        </div>

                        @push('scripts_bottom')
                        <script src="/js/wisibb/jquery.wysibb.min.js"></script>
                        <script>
                            $(function() {
                                $("#project-content").wysibb();
                            })
                        </script>
                        @endpush
                        <link rel="stylesheet" href="/css/wisibb/theme/default/wbbtheme.css" />
                        <div class="form-group">
                            <label for="content" class="col-sm-3 control-label">Содержание</label>
                        </div>
                        <div class="form-group" style="padding: 0px 20px">
                            <textarea name="content" id="project-content" style="width: 100%; height: 400px"></textarea>
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