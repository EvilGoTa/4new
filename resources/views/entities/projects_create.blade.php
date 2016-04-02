@extends('layouts.admin')

@section('content')
    <h1 class="page-header">{{ $top_header or 'Заголовок' }}</h1>
    {{--<div class="panel-body">--}}
    @include('common.errors')
        <form id="project-from" action="{{ url('admin/projects/') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#main">Главная</a></li>
                <li role="presentation"><a href="#contacts">Контакты</a></li>
            </ul>

            <div id="main">
                <br>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Название</label>

                    <div class="col-sm-6">
                        <input type="text" name="title" id="project-name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Описание</label>

                    <div class="col-sm-6">
                        <textarea name="description" id="project-description" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user" class="col-sm-3 control-label">Автор</label>

                    <div class="col-sm-6">
                        <select name="user" id="project-user" class="form-control">
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}">{{ $u->alias }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div id="contacts" style="display: none">
                <br>
                <div class="form-group">
                    <label for="adress" class="col-sm-3 control-label">Адрес</label>

                    <div class="col-sm-6">
                        <input type="text" name="adress" id="contact-adress" class="form-control">
                        <br>
                        <div class="well" id="ymap-1" style="height: 330px"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Телефон</label>

                    <div class="col-sm-6">
                        <input type="text" name="phone" id="contact-phone" class="form-control">
                    </div>
                </div>
            </div>

            {{--<div class="form-group">--}}
                {{--<div class="col-sm-offset-3 col-sm-6">--}}
                    {{--<button type="submit" class="btn btn-default">--}}
                        {{--<i class="fa fa-plus"></i> Добавить проект--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        </form>


        <div class="row bottom-pad">
            <div class="col-md-6">
                <button type="submit" form="project-from" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить проект
                </button>
            </div>
        </div>

    {{--</div>--}}

    @push('scripts_bottom')
    <script>
        $('li[role="presentation"] a').on('click', function(e) {
            e.preventDefault();
            var target = $('li.active[role="presentation"] a').attr('href');
            $(target).hide();
            console.log('hiding '+target);
            $('li[role="presentation"]').removeClass('active');
            $(this).parent().addClass('active');
            $($(this).attr('href')).show();
            console.log('showing '+$(this).attr('href'));
        })
    </script>

    <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"> </script>

    <script>
        var contact_map;
        ymaps.ready(function(){
            moscow_map = new ymaps.Map("ymap-1", {
                center: [55.76, 37.64],
                zoom: 10
            });

            moscow_map.controls.add(
                    new ymaps.control.ZoomControl()
            );

            moscow_map.setCenter([ymaps.geolocation.latitude, ymaps.geolocation.longitude]);

            moscow_map.geoObjects.add(
                    new ymaps.Placemark(
                            [ymaps.geolocation.latitude, ymaps.geolocation.longitude],
                            {
                                balloonContentHeader: ymaps.geolocation.country,
                                balloonContent: ymaps.geolocation.city,
                                balloonContentFooter: ymaps.geolocation.region
                            }
                    )
            );

            var gc = ymaps.geocode([ymaps.geolocation.latitude, ymaps.geolocation.longitude]);

//            console.log(ymaps.geocode([ymaps.geolocation.latitude, ymaps.geolocation.longitude]))
//            $('#contact-adress').val(ymaps.geocode([ymaps.geolocation.latitude, ymaps.geolocation.longitude]))
        });
    </script>
    @endpush
@endsection