<?php

namespace App\Http\Controllers;


use App\User;
use App\Students;
use App\Classes;
use App\users_has_students;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

class StudentsclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function teacherlist()
    {
        $profileUser =  Auth::user();
        $data['userCRUD'] =  Students::with('Classes')->whereHas('Classes')->simplePaginate(10);

        //dd($data);
        return view('studentsclass.teacherlist',$data,['profileUser' => $profileUser]);
    }

    public function teacherlistsearch(Request $request)
    {
        $profileUser =  Auth::user();
        $q = $request->input('q');
        //dd($q);
        $data2['userCRUD'] =  Students::with('Classes')->where('student_name', 'like', '%' . $q . '%')
        ->orWhereHas('classes', function($qx) use($q) {
            $qx->where('classes_name', 'like', '%' . $q . '%');
        })
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('studentsclass.teacherlistsearch',$data2, ['profileUser' => $profileUser], compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        //dd($q);
        $data2['userCRUD'] =  Students::with('Classes')->where('student_name', 'like', '%' . $q . '%')
        ->orWhereHas('classes', function($qx) use($q) {
            $qx->where('classes_name', 'like', '%' . $q . '%');
        })
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('studentsclass.search',$data2, compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }
    
    public function index()
    {
        $data['userCRUD'] =  Students::with('Classes')->whereHas('Classes')->paginate(30);

        

        //dd($data);
        return view('studentsclass.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
        
            'userCRUD' => Students::orderBy('id','desc')->paginate(30),
            'userCRUD2' => Classes::orderBy('id','desc')->paginate(30),
            ];
       
            //dd($params);
            return view('studentsclass.create',$params );
        }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            ]);
           
           $parent_id=$request->input('Parent');
           $class_id=$request->input('FormTutor'); 
      
           $parent = Students::find($parent_id);
           $class = Classes::find($class_id);
            
            $parent->Classes()->attach($class);

            return Redirect::to('studentsclass')
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
            'user_info' => Students::findOrFail($where)->first(),
            'user_info2' =>Classes::orderBy('id','desc')->paginate(30),
            'user_info3' =>Classes::findOrFail($where2)->first(),
            ];
       

        //dd($params);
 
        return view('studentsclass.edit', $params);

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
            $user1 = Students::find($id);
            //dd($role);
            $user1->Classes()->detach($where);
            $user1->Classes()->attach($role_id);
    
     
           
            return Redirect::to('studentsclass')
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
        $user1 = Students::find($id);
        //dd($user1);
        $user1->Classes()->detach($where);

        return Redirect::to('studentsclass')
            ->with('success','Product deleted successfully');
    }
}