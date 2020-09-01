<?php

namespace App\Http\Controllers;

use App\User;
use App\Students;
use App\users_has_students;
use Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use Authenticatable, CanResetPassword, EntrustUserTrait;



class UsersController extends Controller
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
        $data2['userCRUD'] =  User::with('roles')->where('name', 'like', '%' . $q . '%')
        ->orWhere('email', 'like', '%' . $q . '%')
        ->orWhereHas('roles', function($qx) use($q) {
            $qx->where('name', 'like', '%' . $q . '%');
        })
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('adminpanel.search',$data2, compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }

    public function index()
    {
        $data['userCRUD'] =  User::with('roles')->paginate(8);

        //dd($data);
        return view('adminpanel.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data['userCRUD'] = Role::orderBy('id','desc')->paginate(30);
        $data2['userCRUD2'] = User::orderBy('id','desc')->paginate(30);
   
        return view('adminpanel.create',$data,$data2);
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
       
        $role_id=$request->input('role'); // get  Role id from post request
  
       $role = Role::find($role_id);
  
        $returnid = User::create([
             'name'     => $request->name,
             'email'    => $request->email,
             'password' =>  bcrypt($request['password']),
            ]);
            $userid = $returnid->id;
            $user1 = User::find($userid);
            $user1->roles()->attach($role);
   
        return Redirect::to('adminpanel')
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
        $where = array('id' => $id);
        $data['user_info'] = User::where($where)->first();
        $data2['user_info2'] = Role::orderBy('id','desc')->paginate(30);


        //dd($data);
 
        return view('adminpanel.edit', $data,$data2);
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

            'name'   => 'required',
            'email'  => 'required',
        ]);

        $update = [
            'name' => $request->name, 
            'email' => $request->email, 
        ];

        User::where('id',$id)->update($update);
    ////////////////////////////////////////////////////////////////////////////////////////////

       $role_id=$request->input('role'); // get  Role id from request

       $role = Role::find($role_id);
       $rolefind = $role->name;
       $user1 = User::find($id);
       $user1->syncRoles([$rolefind]);

 
       
        return Redirect::to('adminpanel')
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
        User::where('id',$id)->delete();
   
        return Redirect::to('adminpanel')
        ->with('success','Product deleted successfully');
    }
}
