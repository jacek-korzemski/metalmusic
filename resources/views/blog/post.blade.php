@extends('layouts.front')

@section('center')
<div class="post-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="post-content">
                    <h1>
                        {{ $post->title }}
                    </h1>
                    <img src="{{$post->thumbnail}}" alt="{{$post->title}}" class="img-fluid" style="float: left;" />
                    {!! $post->content !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row main-articles">
                    @foreach($side_posts as $side_post)
                    <div class="col-lg-12 article-wrapper">
                        <a href="{{ $side_post->path }}" class="article">
                            <div class="left">
                                <div class="img">
                                    <img src="{{ " /phpThumbnail/phpThumb.php?src=" . $side_post->thumbnail . " &w=165"
                                        }}" alt="{{ $side_post->title }}" />
                                </div>
                            </div>
                            <div class="right">
                                <h3>{{ $side_post->title }}</h3>
                                <p>{{$side_post->date}}</p>
                                <p>{{$side_post->excerpt}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection