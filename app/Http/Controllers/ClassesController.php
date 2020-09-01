<?php

namespace App\Http\Controllers;

use App\User;
use App\Students;
use App\Classes;
use App\users_has_students;
use Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

use Authenticatable, CanResetPassword, EntrustUserTrait;


class classesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $data['userCRUD'] =  Classes::orderBy('classes_name','asc')->paginate(8);

       //dd($data);
        return view('classes.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
        
            'userCRUD' => Classes::orderBy('id','desc')->paginate(30),
            ];
       
            //dd($params);
            return view('classes.create',$params );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $class_id=$request->input('classname'); 

        Classes::create(array('classes_name' => $class_id));

        return Redirect::to('classes')
        ->with('success','Great! Race info created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $params = [
            $where = array('id' => $id),
            'user_info' => Classes::findOrFail($where)->first(),
            ];
       

        //dd($params);
 
        return view('classes.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

           $user_info = Classes::find($id);
           $user_info->classes_name = $request->input('classesname'); 
           //dd($role_id);
           $user_info->update();

            return Redirect::to('classes')
            ->with('success','Product deleted successfully');
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $del = Classes::findOrFail($id);
        $del->delete();
   
        return Redirect::to('classes')
        ->with('success','Product deleted successfully');
    }
}
