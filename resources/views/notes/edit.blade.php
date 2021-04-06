@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <form  method="post" action="/update_note">
                        @csrf
                        <label for="form_name">{{ $data->header }}</label>
                        <input id="form_name" type="text" name="header" class="form-control" value="{{ $data->header }}" required="required" data-error="Firstname is required.">
                        <br><br>
                        <input id="" type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                        <label for="form_message">Сообщение</label>
                      
                        <textarea id="form_message" name="text" class="form-control" rows="4" required="required" data-error="">{{ $data->text }}</textarea>
                        <br><br>
                        <input type="hidden" name="img"  value="" >
                        <input type="submit" class="btn btn-success btn-send" value="Update message">
                    </form>
                </div>
            </div>
        </div>





@endsection



