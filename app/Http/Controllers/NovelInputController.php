<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;


class NovelInputController extends Controller
{
    public function createinfo($novelId)
    {
        $data = Upload::findOrFail($novelId);
        $data2 = Chapter::all();

        return view('novelinfo', ['title' => $data->title])->with('data', $data)->with('data2', $data2);  
    }  

    public function create()
    {
        //ambil data dari database
        $data = Upload::paginate(5);
        
        return view('input', ['title' => 'Input Novel'])->with('data', $data);
    }

    public function chapter($novelId){

        $data = DB::table('chapters')->join('uploads', 'chapters.judul', '=', 'uploads.title')->
        where('uploads.title', $novelId)->paginate(10);
        $data2 = DB::table('uploads')->where('title', $novelId)->first();

        return view('input-chapter', ['title' => 'Input Chapter'])->with('data', $data)->with('data2', $data2);
    }

    public function store(Request $request){

        //membuat validasi, jika tidak diisi maka akan menampilkan pesan error
        $this->validate($request, [
            'file'          => 'required',
            'title'         => 'required',
            'keterangan'    => 'required',
        ]);

        //mengambil data file yang diupload
        $file           = $request->file('file');
        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();


        //memindahkan file ke folder tujuan
        $file->move('file_upload',$file->getClientOriginalName());


        $upload = new Upload;
        $upload->file = $nama_file;
        $upload->title = $request->input('title');
        $upload->keterangan = $request->input('keterangan');

        //menyimpan data ke database
        $upload->save();

        //kembali ke halaman sebelumnya
        return back();
    }

    public function storechapter(Request $request){

        //membuat validasi, jika tidak diisi maka akan menampilkan pesan error
        $this->validate($request, [
            'title'         => 'required',
            'text'          => 'required'
        ]);

        //mengambil data file yang diupload
        $text           = $request->file('text');
        //mengambil nama file
        $nama_chapter      = $text->getClientOriginalName();

        $text->move('file_upload',$text->getClientOriginalName());

        $myFile = public_path('file_upload/'. $nama_chapter);
        $content_text = file_get_contents($myFile);
        $names = explode("\n", $content_text);

        $five = array();
        for($i = 0; $i < count($names); $i++)
            if ($i % 200 == 0)
                $five[count($five)] = $names[$i];
            else
                $five[count($five) - 1] .= "\n" . $names[$i];
        

        for($i = 0; $i < count($five); $i++){
            $upload = new Chapter;
            $upload->judul = $request->input('title');
            $upload->part = $i + 1;

            $upload->chapter = $five[$i];
            
            $upload->save();
        }

        //kembali ke halaman sebelumnya
        return back();
    }
}