@extends(isset($full) ? 'admin.layout' : 'admin.ajax')

@section('top')
<div class="row no-gutters">
    <div class="col-12 top-button-wrapper">
        <h1>Media</h1>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <hr />
        <a href="/admin/media/add" class="btn btn-primary">Dodaj media</a>
    </div>
</div>
@endsection

@section('center')
<div class="row no-gutters">
    <div class="col-12">
        <div class="flex-grid">
            @foreach($media as $img)
            <div class="img-element">
                <img src="/uploads/images/{{$img->file_name}}" alt="image" />
                <p>{{$img->file_name}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection