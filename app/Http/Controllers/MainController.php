<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function yazOkulu(){
        //echo $request -> method();
        return view('student_pages.yaz_okulu');
    }
    public function yatayGecis(){
        //echo $request -> method();
        return view('student_pages.yatay_gecis');
    }
    public function dgs(){
        //echo $request -> method();
        return view('student_pages.dgs');
    }
    public function cap(){
        //echo $request -> method();
        return view('student_pages.cap');
    }
    public function dersIntibak(){
        //echo $request -> method();
        return view('student_pages.ders_intibaki');
    }

    public function yazOkuluAdmin(){
        //echo $request -> method();
        return view('admin_pages.yaz_okulu');
    }
    public function yatayGecisAdmin(){
        //echo $request -> method();
        return view('admin_pages.yatay_gecis');
    }
    public function dgsAdmin(){
        //echo $request -> method();
        return view('admin_pages.dgs');
    }
    public function capAdmin(){
        //echo $request -> method();
        return view('admin_pages.cap');
    }
    public function dersIntibakAdmin(){
        //echo $request -> method();
        return view('admin_pages.ders_intibaki');
    }

    public function toProfile(){
        //echo $request -> method();
        return view('student_pages.profile');
    }
}
