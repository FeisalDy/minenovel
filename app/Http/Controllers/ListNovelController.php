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
        $data = DB::table('chapters')->where('part', $novelId)->where('judul', $partId)->first();
        $jumlahpart = DB::table('chapters')->where('part', $novelId)->where('judul', $partId)->count();
        if($novelId>1){
            $back = $novelId-1;
        }else{
            $back = $novelId;
        }
        if($novelId<$jumlahpart){
            $next = $novelId+1;
        }else{
            $next = $novelId;
        }
        return view('chapter-view',['title' => 'Chapter View'])->with('data',$data)
        ->with('back',$back)->with('next',$next);
    }
}
