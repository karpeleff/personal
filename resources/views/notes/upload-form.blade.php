@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <form method="post" action="{{ route('upload_file') }}" enctype="multipart/form-data">
                        @csrf
                       <!-- <input name="_token" type="hidden" value="{{ csrf_token() }}">-->
                        <input type="file" multiple name="file[]">
                        <button type="submit">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>





@endsection

