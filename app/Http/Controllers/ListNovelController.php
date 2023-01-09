<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use App\Models\Users_Bookmark;
use Laravel\Sail\Console\PublishCommand;

class ListNovelController extends Controller
{
    public function index()
    {
        $data = Upload::paginate(10);
        $data2 = Users_Bookmark::get();

        return view('list-novel', ['title' => 'List Novel'])->with('data', $data)->with('data2', $data2);
    }

    public function createinfo($novelId)
    {
        $data = DB::table('uploads')->where('id', $novelId)->first();
        $data2 = DB::table('chapters')->where('upload_id', $novelId)->get();
        return view('novelinfo', ['title' => 'Novel Info'])->with('data', $data)->with('data2', $data2);
    }

    public function viewchapter($partId, $novelId)
    {
        $data = DB::table('chapters')->where('part', $novelId)->where('upload_id', $partId)->first();
        $jumlahpart = DB::table('chapters')->where('upload_id', $partId)->count();
        if ($novelId > 1) {
            $back = $novelId - 1;
        } else {
            $back = $novelId;
        }
        if ($novelId < $jumlahpart) {
            $next = $novelId + 1;
        } else {
            $next = $novelId;
        }
        return view('chapter-view', ['title' => 'Chapter View'])->with('data', $data)
            ->with('back', $back)->with('next', $next);
    }
    public function search(Request $request)
    {
        $cari = $request->cari;

        $data = DB::table('uploads')
            ->where('title', 'like', "%" . $cari . "%")
            ->paginate(5);
        $data2 = Users_Bookmark::get();



        return view('list-novel-search', ['title' => 'Search'])->with('data', $data)->with('data2', $data2);
    }

    public function bookmark($userId, $novelId)
    {
        $data = Users_Bookmark::where('user_id', $novelId)->where('novel_id', $userId)->first();
        if ($data == null) {
            Users_Bookmark::insert([
                'user_id' => $novelId,
                'novel_id' => $userId
            ]);
        } else {
            Users_Bookmark::where('user_id', $novelId)->where('novel_id', $userId)->delete();
        }
        return back();
    }

    public function viewbookmark($userId)
    {
        $data = DB::table('users_bookmark')
            ->join('uploads', 'users_bookmark.novel_id', '=', 'uploads.id')
            ->where('users_bookmark.user_id', $userId)
            ->get();

        return view('bookmark', ['title' => 'Bookmark'])->with('data', $data);
    }
}
