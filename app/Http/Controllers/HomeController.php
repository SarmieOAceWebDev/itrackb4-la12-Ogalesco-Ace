<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\category;

class HomeController extends Controller
{
    public function index()
    {
        

        return view ('home', [
              'subjectCount' => Subject::count(),
                'categoryCount' => Category::count(),
            

           
        ]);

    }
}
