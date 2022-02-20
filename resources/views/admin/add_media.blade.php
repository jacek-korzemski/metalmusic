@extends(isset($full) ? 'admin.layout' : 'admin.ajax')

@section('top')
<div class="row no-gutters">
    <div class="col-12 top-button-wrapper">
        <h1>Dodaj media</h1>
        <hr />
    </div>
</div>
@endsection

@section('center')
<div class="row no-gutters">
    <div class="col-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="default-form" action="/admin/upload-media" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" />
            <br />
            <input type="submit" value="Dodaj media" class="btn btn-primary" />
        </form>
    </div>
</div>
@endsection