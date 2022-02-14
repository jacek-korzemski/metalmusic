@extends('layouts.front')

@section('top')
<div class="row">
    <div class="col-lg-2 col-md-1"></div>
    <div class="col-lg-8 col-md-10">
        <p class="front-text">
            MetalMusic.pl to amatorski, stronniczy, jednoosobowy portal poświęcony
            muzyce metalowej. Niskiej jakości recenzje, rzadkie aktualizacje i klimat
            internetowych lat dziewięćdziesiątych. Wszystko czego szukasz,
            znajdziesz pewnie gdzie indziej. Jeśli jednak nie szukasz niczego konkretnego,
            to z dużym prawdopodobieństwem nie trafiłeś aż tak najgorzej.
        </p>
    </div>
    <div class="col-lg-2 col-md-1"></div>
</div>
@endsection

@section('center')
<div class="row featured-articles no-gutters">
    @foreach($top_section_posts as $post)
    <div class="col-md-6 col-lg-4 no-gutters">
        <a href="{{ $post->path }}">
            <?php 
                $img = "/phpThumbnail/phpThumb.php?src=";
                $img.= $post->thumbnail;
                $img.= "&w=640";
            ?>
            <div class="article"
                style="background: url('{{$img}}'); background-size: cover; background-position: center;">
                <div class="overlay">
                    <h2>{{$post->title}}</h2>
                    <p class="date">{{$post->date}}</p>
                    <p class="exceprt">{{$post->excerpt}}</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="main-articles">
    <div class="container">
        <h2>
            Najnowsze artykuły
        </h2>
        <div class="row">
            @foreach($middle_section_posts as $post)
            <div class="col-lg-6 article-wrapper">
                <a href="{{ $post->path }}" class="article">
                    <div class="left">
                        <div class="img">
                            <?php 
                                $img = "/phpThumbnail/phpThumb.php?src=";
                                $img.= $post->thumbnail;
                                $img.= "&w=640";
                            ?>
                            <img src="{{$img}}" alt="{{ $post->title }}" />
                        </div>
                    </div>
                    <div class="right">
                        <h3>{{ $post->title }}</h3>
                        <p>{{$post->date}}</p>
                        <p>{{$post->excerpt}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="tags-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2>Tagi</h2>
                <p> |
                    @foreach($tags as $tag)
                    <a href="/tag/{{ $tag->slug }}">{{ $tag->display_name }}</a> |
                    @endforeach
                </p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<div class="sent-by-articles">
    <div class="container">
        <h2>Nadesłane przez czytelników</h2>
        <div class="row">
            @foreach($sent_by_section_posts as $post)
            <div class="col-md-6 article-wrapper">
                <a href="{{ $post->path }}" class="article">
                    <div class="img">
                        <?php 
                            $img = "/phpThumbnail/phpThumb.php?src=";
                            $img.= $post->thumbnail;
                            $img.= "&w=540";
                        ?>
                        <img src="{{$img}}" alt="{{ $post->title }}" />
                    </div>
                    <h3>{{ $post->title }}</h3>
                    <p>{{$post->date}}</p>
                    <p>{{$post->excerpt}}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection