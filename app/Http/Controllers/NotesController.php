<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Action;

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

    public function  createAction(Request $request)
    {
      $record =  new Action;
      $record->action = $request->action;
      $record->save();
       //s return view('');

        return  $this->allAction();
    }

    public function  allAction()
    {
        $data = Action::paginate(15);
        return view('karina/index',['data' => $data]);
       // return view('karina/index');
    }



}
