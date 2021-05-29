<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Action;
use Carbon\Carbon;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class NotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
//записки
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
//записки
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
//api
public function  testapi(Request $request)
{
//$data = Document::create($request->all());
//return response()->json($data,201);

 dd($request);

}

public  function apiForm()
{
    return view('notes/apiform');
}

    public function resume()
    {
        return view('notes/resume');
    }
//  загрузка файла
    public function getForm()
    {
        return view('notes/upload-form');
    }

    public function upload(Request $request)
    {
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
            }
        }
        return "Успех";
    }
//загрузка файла


}
