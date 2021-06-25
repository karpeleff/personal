<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    phpinfo();
});



Route::get('/courses', 'CourseController@index')->name('course_index');
Route::get('/contact', 'CourseController@contact')->name('course_contact');

Route::get('/notes', 'NotesController@index')->name('index');
Route::get('/edit_note/{id}', 'NotesController@edit_note')->name('edit_note');
Route::get('/del_note/{id}', 'NotesController@del_note')->name('del_note');
Route::get('/form_add', 'NotesController@form_add')->name('form_add');
Route::get('/ajax', 'NotesController@ajax')->name('ajax');

Route::get('/all_notes', 'NotesController@all_notes')->name('all_notes');
//Route::get('/fixit', 'CourseController@fixit')->name('fixit ');
Route::post('/notes', 'NotesController@createNote')->name('create_note');
Route::post('/update_note', 'NotesController@update_note')->name('update_note');
Route::post('/karina', 'NotesController@createAction')->name('create_action');
Route::get('/karina', 'NotesController@allAction')->name('all_action');
Route::get('/amo', 'NotesController@AmoCrm')->name('amo');
Route::post('/amo', 'NotesController@AmoCrm')->name('amo');
Route::get('/get_key', 'NotesController@AuthRequest')->name('get_key');
Route::get('/resume', 'NotesController@resume')->name('resume');

Route::post('/testApi', 'NotesController@Atestapi')->name('testapi');
Route::get('/apiForm', 'NotesController@apiForm')->name('apiForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('upload',['as' => 'upload_form', 'uses' => 'NotesController@getForm']);
Route::post('upload',['as' => 'upload_file','uses' => 'NotesController@upload']);

Route::get('/amo', 'AmoController@amo')->name('amo');

///////////feedback

Route::get('/feedback_form', 'FeedbackController@index')->name('index');
Route::post('/feedback_save', 'FeedbackController@save')->name('save');

/////////vue axios  lesson

Route::get('/post_index','PostController@index');

///staff

Route::get('/staff_index', 'StoreController@index')->name('store_index');


//blog
 Route::get('/blog_index', 'BlogController@index')->name('blog_index');
Route::get('/blog_create_category', 'BlogController@create_category')->name('blog_create_category');
Route::get('/blog_create_material', 'BlogController@create_material')->name('blog_create_material');
Route::get('/blog_create_tag', 'BlogController@create_tag')->name('blog_create_tag');
Route::get('/blog_list_category', 'BlogController@list_category')->name('blog_list_category');
Route::get('/blog_list_tag', 'BlogController@list_tag')->name('blog_list_tag');
Route::get('/blog_view_material', 'BlogController@view_material')->name('blog_view_material');
Route::post('/blog_add_tag', 'BlogController@add_tag')->name('blog_add_tag');
Route::post('/blog_add_category', 'BlogController@add_category')->name('blog_add_category');

