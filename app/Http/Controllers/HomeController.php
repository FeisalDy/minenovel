<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('uploads')->paginate(5);
        $data2 = DB::table('chapters')->orderBy('part', 'DESC')->get();


 



        return view('home', ['title' => 'Home'])->with('data',$data)->with('data2',$data2);

    }
}