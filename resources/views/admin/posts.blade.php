@extends('admin.layout')

@section('top')
<div class="row no-gutters">
    <div class="col-12 top-button-wrapper">
        <h1>Wszystkie posty</h1>
        <hr />
        <a href="/admin/posts/create" class="btn btn-primary">Dodaj post</a>
    </div>
</div>
@endsection

@section('center')
<div class="row no-gutters">
    <div class="col-12">
        <table class="content-table">
            <thead>
                <th>ID</th>
                <th>Tytuł</th>
                <th>Data</th>
                <th>Akcje</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->date}}</td>
                    <td>
                        <a href="/admin/posts/edit/{{$post->id}}">Edytuj</a> |
                        <a href="">Usuń</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection