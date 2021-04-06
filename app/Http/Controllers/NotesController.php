<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Action;
use Carbon\Carbon;

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

    public function  edit_note($id)
    {
       // return view('notes/add');
       $data = Note::find($id);
       return view('notes/edit',['data' => $data]);

    }

    public function  update_note(Request $request)
    {
       // return view('notes/add');
       $data = Note::find($request->id);

       $data->header = $request->header;
       $data->text = $request->text;
       $data->img = 'tt';
       //$data->img = $request->img;

       $data->save();
       return  $this->index();


    }





    public function  del_note($id)
    {
        $record = Note::find($id);

        $record->delete();

        return $this->index();
    }

    public function  createAction(Request $request)
    {

         $mutable = Carbon::now()->addHours(10);
         $record                  =  new Action;
         $record->action          = $request->action;
         $record->local_date_time = $mutable;
         $record->save();
         return  $this->allAction();
    }

    public function  allAction()
    {
        $date = Carbon::now()->addHours(10);
        $date = substr($date, 0, 10);
        $data = Action::where('local_date_time', 'like', $date.'%')->simplePaginate(15);
        return view('karina/index',['data' => $data]);

    }


    public function AmoCrm()
    {
       // echo 'hello';
        return view('notes/amo');
    }

    public function resume()
    {
        return view('notes/resume');
    }



}
