@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <form  method="post" action="/notes">
                        @csrf
                        <label for="form_name">Заголовок</label>
                        <input id="form_name" type="text" name="header" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                        <br><br>
                        <label for="form_message">Сообщение</label>
                      
                        <textarea id="form_message" name="text" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                        <br><br>
                        <input type="hidden" name="img"  value="link" >
                        <input type="submit" class="btn btn-success btn-send" value="Send message">
                    </form>
                </div>
            </div>
        </div>





@endsection



