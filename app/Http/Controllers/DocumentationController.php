<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function admin()
    {
     

        return view('documentation.adminhelp');
    }

    public function parent()
    {
     

        return view('documentation.parenthelp');
    }

    public function teacher()
    {
     

        return view('documentation.teacherhelp');
    }
}
