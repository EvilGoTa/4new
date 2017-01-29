@extends('layouts.app')

@section('content')
    <div class="container spacer">
        <h1>Поиск</h1>
        <form action="/search" method="GET">
        @if ($query)
            <input type="text" name="q" value="{{ $query }}">
        @else
            <input type="text" name="q">
        @endif
        </form>
        <br>
        @if (count($items) < 1)
            <div>
                Ничего не найдено
            </div>
        @else
            <div id="works"  class=" clearfix grid">
                @each('front.project_list_item', $items, 'p')
            </div>
        @endif
    </div>
@endsection