@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            <div class="col-md-12">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($data as $item)
                <tr>
                    <th> {{ $item->header }}</th>
                    <th> {{ $item->text }}</th>
                    <th> {{ $item->img }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
                <button type="button" class="btn btn-success"><a href="/form_add" >Success</a></button>
@endsection


