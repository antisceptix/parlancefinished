<?php

namespace App\Http\Controllers;

use App\User;
use App\Students;
use App\Classes;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Request;
use Request as RequestFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Purifier;

use Authenticatable, CanResetPassword, EntrustUserTrait;

class MessagesController extends Controller
{
    
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function messagesearch(Request $request)
    {
        $q = $request->input('q');
        //dd($q);
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->where('subject', 'like', '%' . $q . '%')->orWhere('user_id', 'like', '%' . $q . '%')
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('messenger.messagesearch',$threads,compact('threads'), compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }

    public function admininboxsearch(Request $request)
    {
        $q = $request->input('q');
        $user = User::where('name', 'admininbox')->firstOrFail();

        $threads = Thread::forUser($user->id)->latest('updated_at')->where('subject', 'like', '%' . $q . '%')
        ->paginate(8);
        //dd($data2);
        if($q != ''){
        return view('messenger.admininboxsearch',$threads,compact('threads'), compact('q'));}
        else{
        return redirect()->back()->withErrors(['name' => 'Search is empty']);}
        
    }
    public function index(User $user)
    {
        // All threads, ignore deleted/archived participants
        

            //$threads = Thread::getAllLatest()->get();
           
            //dd($threads);
           
        

        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->paginate(10);

        // All threads that user is participating in, with new messages
         //$threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
        
        return view('messenger.index', compact('threads'));
        
    }

    public function admininbox(User $user)
    {
        $user = User::where('name', 'admininbox')->firstOrFail();
        
        $threads = Thread::forUser($user->id)->latest('updated_at')->paginate(15);
            //dd($threads);
           

        return view('messenger.admininbox', compact('threads'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();

        // don't show the current user in list
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);
        

        return view('messenger.show', compact('thread', 'users'));
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create(User $user)
    {
            $profileUser =  Auth::user();
            

            $allusers = User::where('id', '!=', Auth::id())->get();
            $alladmin =  User::with('Roles')->role('admin')->paginate(30);
            $allparents =  User::with('Roles')->role('parent')->paginate(30);
            $allteachers = User::with('Roles', 'Classes')->role('teacher')->whereHas('Classes')->paginate(30);
            
            $parentstoteacher = Students::with('Classes')->has('User')-> get();

            $teachertoparent = Students::with('Classes', 'User')-> get();
            $currentteacher = User::where('id', '=', Auth::id())->with('Classes')->get();
            
            //dd($teachertoparent);
            
        
       
        //dd($users, $allparents);

        return view('messenger.create',  compact('profileUser','allusers', 'allparents', 'allteachers', 'alladmin', 'parentstoteacher','teachertoparent', 'currentteacher'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = request()->all();

        $this->validate(request(), [
            'subject' => 'required',
            'message' => 'required',
            
        ]);

        $thread = Thread::create([
            'subject' => $input['subject'],
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Purifier::clean($input['message']),
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);

        // Recipients
        if (request()->has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        return redirect()->route('messages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages');
        }

        $thread->activateAllParticipants();

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Request::input('message'),
        ]);

        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if (Request::has('recipients')) {
            $thread->addParticipant(Request::input('recipients'));
        }


        return redirect()->route('messages.show', $id);
    }

}