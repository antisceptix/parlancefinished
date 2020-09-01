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


class TeacherclassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        //dd($q);
        $data2['userCRUD'] =  $data['userCRUD'] =  Classes::with('user')->where('classes_name', 'like', '%' . $q . '%')
        ->orWhereHas('user', function($qx) use($q) {
            $qx->where('name', 'like', '%' . $q . '%');
        })
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('teacherclasses.search',$data2, compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }

    public function index()
    {
         
        $data['userCRUD'] =  Classes::with('user')->paginate(30);

       //dd($data);
        return view('teacherclasses.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'userCRUD'=> User::with('Roles')->role('teacher')->paginate(30),
            'userCRUD2' => Classes::orderBy('id','desc')->paginate(30),
            ];
       
            //dd($params);
            return view('teacherclasses.create',$params );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $teacher_id=$request->input('Teacher');
            $class_id=$request->input('Class'); 
       
            $teacher = User::find($teacher_id);
            $class = Classes::find($class_id);
             //dd($class);
              
             $teacher->Classes()->attach($class);
                return Redirect::to('teacherclasses')
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
    
    public function edit(Request $request, $id)
    {
        $oldclass= $request->query('classesclass');
        $params = [
            $where = array('id' => $id),
            $where2 = array('id' => $oldclass),
            'user_info' => User::findOrFail($where)->first(),
            'user_info2' =>Classes::orderBy('id','desc')->paginate(30),
            'user_info3' =>Classes::findOrFail($where2)->first(),
            ];
       

        //dd($params);
 
        return view('teacherclasses.edit', $params);

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
        $neww = $request->query('classesclass');
        $where = array('id' => $neww);
        //dd($where);
            $request->validate([
            ]);
            $role_id=$request->input('Studentclassdropdown'); // get  Role id from request
            $role = Classes::find($role_id);
            //dd($role_id);
            $user1 = User::find($id);
            //dd($role);
            $user1->Classes()->detach($where);
            $user1->Classes()->attach($role_id);
    
     
           
            return Redirect::to('teacherclasses')
            ->with('success','Product deleted successfully');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $neww = $request->query('classesclass');
        $where = array('id' => $neww);
        //dd($where);
        $user1 = User::find($id);
        //dd($user1);
        $user1->Classes()->detach($where);

        return Redirect::to('teacherclasses')
        ->with('success','Product deleted successfully');
    }
}
