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
use Illuminate\Http\Request;
use Request as RequestFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;


use Authenticatable, CanResetPassword, EntrustUserTrait;

class FileUploadController extends Controller
{
    public function upload()
    {
        return view('adminpanel.upload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadpost(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xml']
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('storage'), $fileName);

        $url = Storage::url($fileName);
        $path = public_path($url);
        $fileContents = file_get_contents($path);
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        $fileContents = trim(str_replace('"', "'", $fileContents));
        $simpleXml = simplexml_load_string($fileContents);
        $json = json_encode($simpleXml);
        $outputarray = json_decode($json,TRUE);
        $hello = "hello";
    
        //dd($outputarray['parent']);
        
		foreach($outputarray["parent"] as $key => $outputarray1) {
           

            $values = User::firstOrCreate(
                ['name' => $outputarray1["name"]],
                ['email' => $outputarray1["email"]],
            );
            //dd( $values);

        }
        //dd( $outputarray);
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('path', $path)
            ->with('file',$fileName)
            ->with('outputarray',$outputarray);
            
   
    }
}

