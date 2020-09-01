<?php

namespace App\Http\Controllers;

use App\User;
use App\Students;
use App\Classes;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Post;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;


use Authenticatable, CanResetPassword, EntrustUserTrait;

class ProfilesController extends Controller
{
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function show(User $user,Students $students)
    {
        $data['userCRUD'] =  User::with('roles')->paginate(30);
        $data['userCRUD2'] =  User::with('Roles', 'Classes')->role('teacher')->whereHas('Classes')->paginate(30);
        $data['userCRUD3'] =  Students::with('Classes')->whereHas('Classes')->simplePaginate(6, ['*'],' ');
        $data['userCRUD4'] =  Students::with('User')->paginate(30);
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->simplePaginate(4, ['*'],'latestmessages');
        $posts = Post::latest()->simplePaginate(1, ['*'],'latestposts');

        $profileUser =  Auth::user();
            

        $allusers = User::where('id', '!=', Auth::id())->get();
        $alladmin =  User::with('Roles')->role('admin')->paginate(30);
        $allparents =  User::with('Roles')->role('parent')->paginate(30);
        $allteachers = User::with('Roles', 'Classes')->role('teacher')->whereHas('Classes')->paginate(30);
        $parentstoteacher = Students::with('Classes')->has('User')-> get();
        $teachertoparent = Students::with('Classes', 'User')-> get();
        $currentteacher = User::where('id', '=', Auth::id())->with('Classes')->get();
       
        //dd($threads);

        return view('userprofile.show', $data, [
            'profileUser' => $profileUser,
            'allusers' => $allusers,
            'allparents' => $allparents,
            'allteachers' => $allteachers,
            'alladmin' => $alladmin,
            'parentstoteacher' => $parentstoteacher,
            'teachertoparent' => $teachertoparent,
            'currentteacher' => $currentteacher,
            'threads' => $threads,
            'profileUser' => $user,
            'profileStudents' => $students,
            'sposts' => $posts
            
        ]);
        //dd($user);
    }




}
