<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;

class ListNovelController extends Controller
{
    public function index()
    {

        $data = Upload::all();
        return view('list-novel', ['title' => 'List Novel'])->with('data',$data);
    }

    public function createinfo($novelId)
    {
        $data = DB::table('uploads')->where('title', $novelId)->first();
        $data2 = DB::table('chapters')->where('judul', $novelId)->get();
        $jumlah = DB::table('chapters')->where('judul', $novelId)->count();
        return view('novelinfo',['title' => 'Novel Info'])->with('data',$data)->with('data2',$data2);
    }

    public function viewchapter($partId, $novelId)
    {
        $data = DB::table('chapters')->where('part', $partId)->where('judul', $novelId)->first();
        return view('chapter-view',['title' => 'Chapter View'])->with('data',$data);
    }
}
