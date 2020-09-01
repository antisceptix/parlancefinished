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
*/Route::get('/', function () {
    return view('welcome');
    });
Auth::routes();



Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['role:admin']], function () {
        // ----------------------non-admin------------------------------------
        Route::group(['prefix' => 'documentation'], function () {
            Route::get('adminhelp',['as' => 'documentation.adminhelp', 'uses' => 'DocumentationController@admin'] );
            Route::get('teacherhelp',['as' => 'documentation.teacherhelp', 'uses' => 'DocumentationController@teacher'] );
            Route::get('parenthelp',['as' => 'documentation.parenthelp', 'uses' => 'DocumentationController@parent'] );
        });
        Route::group(['prefix' => 'messages'], function () {
            Route::post('/admininboxsearch',['as' => 'messages.admininboxsearch', 'uses' => 'MessagesController@admininboxsearch'] );
            Route::get('admininbox', ['as' => 'messages.admininbox', 'uses' => 'MessagesController@admininbox']);
            });
            Route::group(['prefix' => 'posts'], function () {
                
                Route::get('create',['as' => 'posts.create', 'uses' => 'PostController@create'] );
                Route::post('/',['as' => 'posts.store', 'uses' => 'PostController@store'] );
                Route::get('{post}/edit',['as' => 'posts.edit', 'uses' => 'PostController@edit'] );
                Route::patch('{post}',['as' => 'posts.update', 'uses' => 'PostController@update'] );
                Route::delete('{post}',['as' => 'posts.destroy', 'uses' => 'PostController@destroy'] );
            });
            Route::resource('adminpanel', 'UsersController');
            Route::group(['prefix' => 'adminpanel'], function () {
                Route::post('search',['as' => 'adminpanel.search', 'uses' => 'UsersController@search'] );
                Route::get('upload', ['as' => 'adminpanel.upload', 'uses' => 'FileUploadController@upload']);
                Route::post('upload', ['as' => 'adminpanel.uploadpost', 'uses' => 'FileUploadController@uploadpost']);
                
                });
                Route::group(['prefix' => 'studentsclass'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'StudentsclassController@index']);
                    Route::post('/search',['as' => 'studentsclass.search', 'uses' => 'StudentsclassController@search'] )->middleware('admin');
                    Route::get('create',['as' => 'studentsclass.create', 'uses' => 'StudentsclassController@create'] )->middleware('admin');
                    Route::post('/',['as' => 'studentsclass.store', 'uses' => 'StudentsclassController@store'] )->middleware('admin');
                    Route::get('{studentsclass}/{classesclass}/edit',['as' => 'studentsclass.edit', 'uses' => 'StudentsclassController@edit'] )->middleware('admin');
                    Route::patch('{studentsclass}/{classesclass}',['as' => 'studentsclass.update', 'uses' => 'StudentsclassController@update'] )->middleware('admin');
                    Route::delete('{studentsclass}/{classesclass}',['as' => 'studentsclass.destroy', 'uses' => 'StudentsclassController@destroy'])->middleware('admin');
                    });
                    Route::group(['prefix' => 'teacherclasses'], function () {
                        Route::post('/search',['as' => 'teacherclasses.search', 'uses' => 'TeacherclassesController@search'] )->middleware('admin');
                        Route::post('/',['as' => 'teacherclasses.store', 'uses' => 'TeacherclassesController@store'] )->middleware('admin');
                        Route::get('/',['as' => 'teacherclasses.index', 'uses' => 'TeacherclassesController@index'] )->middleware('admin');
                        Route::get('create',['as' => 'teacherclasses.create', 'uses' => 'TeacherclassesController@create'] )->middleware('admin');
                        Route::get('{tclass}/edit',['as' => 'teacherclasses.edit', 'uses' => 'TeacherclassesController@edit'] )->middleware('admin');
                        Route::patch('{tclass}',['as' => 'teacherclasses.update', 'uses' => 'TeacherclassesController@update'] )->middleware('admin');
                        Route::delete('{tclass}',['as' => 'teacherclasses.destroy', 'uses' => 'TeacherclassesController@destroy'])->middleware('admin');
                        });
                        Route::resource('classes', 'ClassesController')->middleware('admin');
                   
                    
                
    });
// ----------------------non-admin------------------------------------
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
\UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', ['as' => 'posts.index', 'uses' => 'PostController@index']);
    Route::get('{post}', ['as' => 'posts.show', 'uses' => 'PostController@show']);
    });

Route::group(['prefix' => 'messages'], function () {
Route::post('/messagesearch',['as' => 'messages.messagesearch', 'uses' => 'MessagesController@messagesearch'] );
Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::group(['prefix' => 'studentsclass'], function () {
Route::post('/teacherlistsearch',['as' => 'studentsclass.teacherlistsearch', 'uses' => 'StudentsclassController@teacherlistsearch'] );
Route::get('/teacherlist',['as' => 'studentsclass.teacherlist', 'uses' => 'StudentsclassController@teacherlist'] );
});

Route::post('students/search',['as' => 'students.search', 'uses' => 'StudentsController@search'] );
Route::resource('students', 'StudentsController');

Route::get('/userprofile/{user}', 'ProfilesController@show');

Route::group(['prefix' => 'documentation'], function () {
Route::get('teacherhelp',['as' => 'documentation.teacherhelp', 'uses' => 'DocumentationController@teacher'] );
Route::get('parenthelp',['as' => 'documentation.parenthelp', 'uses' => 'DocumentationController@parent'] );
});
// ----------------------------------------------------------
});