<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog\Category;
use App\Models\Blog\Record;
use App\Models\Blog\Tag;
use App\Models\Blog\Type;


class BlogController extends Controller
{
    public function index()
    {
        $data =  null;
        return view('blog/list-materials',['data' => $data]);
    }

    public function create_material()
    {
        $data =  null;
        return view('blog/create-material',['data' => $data]);
    }

    public function list_category()
    {
        $data =  Category::all();
        return view('blog/list-category',['data' => $data]);
    }

    public function create_category()
    {
        $data =  null;
        return view('blog/create-category',['data' => $data]);
    }

    public function list_tag()
    {
        $data =  Tag::all();
        return view('blog/list-tag',['data' => $data]);
    }

    public function create_tag()
    {
        $data =  null;
        return view('blog/create-tag',['data' => $data]);
    }

    public  function add_tag(Request $request)
    {
        $record = $request->all();
        Tag::create($record);
        return  $this->create_tag();
    }

    public  function add_category(Request $request)
    {
        $record = $request->all();
        Category::create($record);
        return  $this->create_category();
    }

}
