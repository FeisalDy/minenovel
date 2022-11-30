<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;

class ListNovelController extends Controller
{
    public function index()
    {
        $data = Upload::paginate(10);
        return view('list-novel', ['title' => 'List Novel'])->with('data',$data);
    }

    public function createinfo($novelId)
    {
        $data = DB::table('uploads')->where('id', $novelId)->first();
        $data2 = DB::table('chapters')->where('upload_id', $novelId)->get();
        return view('novelinfo',['title' => 'Novel Info'])->with('data',$data)->with('data2',$data2);

        
    }

    public function viewchapter($partId, $novelId)
    {
        $data = DB::table('chapters')->where('part', $novelId)->where('upload_id', $partId)->first();
        $jumlahpart = DB::table('chapters')->where('upload_id', $partId)->count();
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
    public function search(Request $request)
    {
        $cari = $request->cari;

        $data = DB::table('uploads')
        ->where('title','like',"%".$cari."%")
        ->paginate(5);

        

        return view('list-novel-search', ['title' => 'Search'])->with('data',$data);

    }
}
