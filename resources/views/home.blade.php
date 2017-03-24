@extends('layouts.app')



@section('content')
        <!-- Cirlce Starts -->
<div id="about"  class="container spacer about">
    <h2 class="text-center wowload fadeInUp">Пафосный заголовок, побуждающий к действию</h2>
    <div class="row">
        <div class="col-sm-6 wowload fadeInLeft">
            <h4><i class="fa fa-paint-brush"></i> Создавай</h4>
            <p>Самосогласованная модель предсказывает, что при определенных условиях рыночная информация расщепляет из ряда вон выходящий газ. Продуктовый ассортимент, в рамках сегодняшних воззрений, масштабирует наносекундный комплексный анализ ситуации по мере распространения сигнала в среде с инверсной населенностью.</p>


        </div>
        <div class="col-sm-6 wowload fadeInRight">
            <h4><i class="fa fa-code"></i> Развавай</h4>
            <p>Химическое соединение усиливает типичный пульсар при любом их взаимном расположении. В ряде недавних экспериментов баннерная реклама синхронизует векторный департамент маркетинга и продаж как при нагреве, так и при охлаждении. Молекула вращает пул лояльных изданий. Продвижение проекта, как принято считать, решительно охватывает вихревой анализ зарубежного опыта. Имидж, согласно Ф.Котлеру, индуцирует экзотермический бозе-конденсат.</p>
        </div>
    </div>


    <div class="row-fluid">
        <div class="col-md-2 col-md-offset-1 chapter">
            <h3><i class="fa fa-history"></i> <b>Проекты</b></h3>
            <p>
                <b>Всего: {{ App\Project::count() }}</b>
                <br>Моих: {{ Auth::user()->projects()->count() }}
                <br>
                <a class="ghost-btn" href="{{ route('home.project.index') }}">управление</a>
            </p>
        </div>
        <div class="col-md-2 chapter">
            <h3><i class="fa fa-puzzle-piece"></i> <b>Блог</b></h3>
            <p>
                <b>Всего: %d</b>
                <br>Моих: %d
                <br>
                <a class="ghost-btn" href="#">к управлению</a>
            </p>
        </div>
        <div class="col-md-2 chapter">
            <h3><i class="fa fa-database"></i> <b>Услуги</b></h3>
            <p>
                <b>Всего: %d</b>
                <br>Моих: %d
                <br>
                <a class="ghost-btn" href="#">к управлению</a>
            </p>
        </div>
        <div class="col-md-2 chapter">
            <h3><i class="fa fa-magic"></i> <b>Вакансии</b></h3>
            <p>
                <b>Всего: %d</b>
                <br>Моих: %d
                <br>
                <a class="ghost-btn" href="#">к управлению</a>
            </p>
        </div>
        <div class="col-md-2 chapter">
            <h3><i class="fa fa-cloud-upload"></i> <b>Кадры</b></h3>
            <p>
                <b>Всего: %d</b>
                <br>Моих: %d
                <br>
                <a class="ghost-btn" href="#">к управлению</a>
            </p>
        </div>
    </div>
    <!--
    <div class="process">
        <h3 class="text-center wowload fadeInUp">Рубрики</h3>
        <ul class="row text-center list-inline  wowload bounceInUp animated-list">
            <li>
                <figure class="effect-chico">
                    <span><i class="fa fa-history"></i><b>Проекты</b></span>
                    <figcaption>
                        <p>
                            <b>Всего: %d</b>
                            <br>Моих: %d
                            <br>
                            <a href="/home/project">к управлению</a>
                        </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="effect-chico">
                    <span><i class="fa fa-puzzle-piece"></i><b>Блог</b></span>
                    <figcaption>
                        <p>
                            <b>Всего: %d</b>
                            <br>Моих: %d
                            <br>
                            <a href="#">к управлению</a>
                        </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="effect-chico">
                    <span><i class="fa fa-database"></i><b>Услуги</b></span>
                    <figcaption>
                        <p>
                            <b>Всего: %d</b>
                            <br>Моих: %d
                            <br>
                            <a href="#">к управлению</a>
                        </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="effect-chico">
                    <span><i class="fa fa-magic"></i><b>Вакансии</b></span>
                    <figcaption>
                        <p>
                            <b>Всего: %d</b>
                            <br>Моих: %d
                            <br>
                            <a href="#">к управлению</a>
                        </p>
                    </figcaption>
                </figure>
            </li>
            <li>
                <figure class="effect-chico">
                    <span><i class="fa fa-cloud-upload"></i><b>Кадры</b></span>
                    <figcaption>
                        <p>
                            <b>Всего: %d</b>
                            <br>Моих: %d
                            <br>
                            <a href="#">к управлению</a>
                        </p>
                    </figcaption>
                </figure>
            </li>
        </ul>
    </div>
    -->
</div>
<!-- #Cirlce Ends -->
@endsection
