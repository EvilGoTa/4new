<figure class="effect-oscar  wowload fadeIn">
    <img src="{{ $p->title_image or '/theme/images/portfolio/6.jpg' }}" alt="img01"/>
    <figcaption>
        <h2>{{ $p->title }}</h2>
        <p>{{ $p->brief_description }}<br>
            <a href="{{ route('project_show', $p->id) }}" title="1">Смотреть ещё</a></p>
    </figcaption>
</figure>