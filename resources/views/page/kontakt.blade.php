@extends('layouts.front')

@section('center')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form>
                <input type="text" name="mail" />
                <textarea></textarea>
                <input type="submit" name="submit" value="wyślij" />
            </form>
        </div>
    </div>
</div>
@endsection