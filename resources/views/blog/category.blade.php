@extends('layouts.front')

@section('head')
<title>Kategoria: {{ $category_data->title }}</title>
<meta name="description" content="{{ $category_data->description }}" />
@endsection

@section('top')
<div class="category-data">
    <h1>
        {{ $category_data->title }}
    </h1>
    <p>{{ $category_data->description }}</p>
</div>
@endsection

@section('center')
<div class="row featured-articles show-default no-gutters">
    @foreach($posts as $post)
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
@endsection

@section('bottom')
@if (count($pages) > 1)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="pagination">
                @foreach($pages as $page)
                <li class="page">
                    <?php if ($page == 1) { ?>
                    <a href="/{{$category_data->slug}}" <?php if ($page==$current_page) {?> class="active"
                        <?php } ?>>{{$page}}
                    </a>
                    <?php } else { ?>
                    <a href="/{{$category_data->slug}}/{{$page}}" <?php if ($page==$current_page) {?> class="active"
                        <?php } ?>>{{$page}}
                    </a>
                    <?php } ?>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
@endsection