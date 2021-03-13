<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }



    public function index()
    {
        $data = Note::paginate(15);
        return view('notes/index',['data' => $data]);
    }


    public  function  createNote(Request $request)
    {
        $record = $request->all();
        Note::create($record);
        //return view('notes/index');
        return  $this->index();

    }

    public function  getAll()
    {
        $data = Note::paginate(15);
        return view('notes/all',['data' => $data]);
    }


    public function  form_add()
    {

        return view('notes/add');
    }

    public function  createAction()
    {

       //s return view('');
    }

    public function  allAction()
    {

        return view('karina/index');
    }



}
