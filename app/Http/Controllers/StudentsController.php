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



class studentsController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');
        //dd($q);
        $data2['userCRUD'] =  Students::with('User', 'Classes')->where('student_name', 'like', '%' . $q . '%')
        ->orWhereHas('User', function($qx) use($q) {
            $qx->where('name', 'like', '%' . $q . '%');
        })
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('students.search',$data2, compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }

    public function index()
    {
        
        $data['userCRUD'] =  Students::with('User', 'Classes')->whereHas('User')->paginate(8);

        

        //dd($data);
        return view('students.list',$data);
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
        'userCRUD2'=> User::orderBy('id','desc')->paginate(30),
        ];
   
        //dd($params);
        return view('students.create',$params );
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
            $returnid = Students::create([
                'student_name' => $request->student_name,
               ]);
           $parent_id=$request->input('Parent');
           $parent = User::find($parent_id);
                $userid = $returnid->id;
                $user1 = Students::find($userid);
                
                $user1->User()->attach($parent);
                //dd($user1);

            return Redirect::to('students')
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
        'user_info' => Students::where('id', $id)->first(),
        'user_info2' => User::orderBy('id','desc')->paginate(30),
        ];
   
        //dd($params);

        
 
        return view('students.edit', $params);
    
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
        $request->validate([
            'student_name'   => 'required',
        ]);
        $update = [
            'student_name' => $request->student_name, 
        ];

        Students::where('id', $id)->update($update);
    ////////////////////////////////////////////////////////////////////////////////////////////

      $user_id=$request->input('Parent'); // get  Role id from request

        $users = User::find($user_id);
       $usersfind =  $users->name;
       $userX = Students::find($id);
       $userX->User()->sync($users);
     
   
      return Redirect::to('students')
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
        Students::where('id',$id)->delete();
   
        return Redirect::to('students')
        ->with('success','Product deleted successfully');
    }

    public function studentclass()
    {
        
        $data['userCRUD'] =  Students::with('Classes')->whereHas('Classes')->paginate(30);

        

        //dd($data);
        return view('students.Studentclass',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function studentclasscreate()
    {
        $params = [
        
        'userCRUD' => Students::orderBy('id','desc')->paginate(30),
        'userCRUD2'=> User::orderBy('id','desc')->paginate(30),
        'userCRUD3' => Classes::orderBy('id','desc')->paginate(30),
        ];
   
        //dd($params);
        return view('students.create',$params );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentclassstore(Request $request)
    {
        $request->validate([

            ]);
            $returnid = Students::create([
                'student_name' => $request->student_name,
               ]);
           
           $parent_id=$request->input('Parent');
           $class_id=$request->input('FormTutor'); 
      
           $parent = User::find($parent_id);
           $class = Classes::find($class_id);
            
                $userid = $returnid->id;
                $user1 = Students::find($userid);
                $user1->User()->attach($parent);
                $user1->Classes()->attach($class);

            return Redirect::to('students')
           ->with('success','Great! Race info created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


}
