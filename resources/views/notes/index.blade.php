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
                <th>Edit</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($data as $item)
                <tr>
                    <th> {{ $item->header }}</th>
                    <th> {{substr($item->text,0,20)  }}</th>
                  <th>
                  <a href="/edit_note/{{ $item->id }}" title=""><i class="fas fa-edit" ></i></a>
                      <br>
                  <a href="/del_note/{{ $item->id }}"  title=""><i class="fas fa-trash"></i></a>
                  </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
                <button type="button" class="btn btn-success"><a href="/form_add" >New_one</a></button>
@endsection


