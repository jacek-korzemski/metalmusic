@extends('layouts.front')

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
                    <div class="article" style="background: url('{{ "/phpThumbnail/phpThumb.php?src=" . $post->thumbnail . "&w=640"  }}'); background-size: cover; background-position: center;">
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