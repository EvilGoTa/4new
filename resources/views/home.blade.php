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

    <style>
        .animated-list li {
            position: relative;
        }

        .animated-list li span {
            transition: opacity 0.35s;
        }

        .animated-list li:hover span {
            opacity: .3;
        }

        .animated-list li figcaption {
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            position: absolute;
            padding: 1.5em!important;
            padding-top: 2.4em!important;
            color: white;
        }

        .animated-list li figcaption a {
            color: white;
            border: 1px solid white;
            text-decoration: none;
            padding: 1px 5px 3px 5px;
        }

        .animated-list li figcaption::before {
            border-radius: 50%;
            top: 0px!important;
            bottom: 0px!important;
            left: 0px!important;
            right: 0px!important;
        }


    </style>

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
</div>
<!-- #Cirlce Ends -->
@endsection
