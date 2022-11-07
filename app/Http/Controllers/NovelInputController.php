<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Chapter;

class NovelInputController extends Controller
{
    public function createinfo($novelId)
    {
        $data = Upload::findOrFail($novelId);
        return view('novelinfo', ['title' => 'Novel Info'])->with('data', $data);
    }  

    public function create()
    {
        //ambil data dari database
        $data = Upload::paginate(5);
        
        return view('input', ['title' => 'Input Novel'])->with('data', $data);
    }

    public function chapter(){

        $data = Chapter::paginate(5);
        return view('input-chapter', ['title' => 'Input Chapter'])->with('data', $data);
    }

    public function store(Request $request){

        //membuat validasi, jika tidak diisi maka akan menampilkan pesan error
        $this->validate($request, [
            'file'          => 'required',
            'title'         => 'required',
            'keterangan'    => 'required',
            'text'          => 'required'
        ]);

        //mengambil data file yang diupload
        $file           = $request->file('file');
        $text           = $request->file('text');
        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();
        $nama_text      = $text->getClientOriginalName();


        //memindahkan file ke folder tujuan
        $file->move('file_upload',$file->getClientOriginalName());
        $text->move('file_upload',$text->getClientOriginalName());


        $upload = new Upload;
        $upload->file = $nama_file;
        $upload->title = $request->input('title');
        $upload->keterangan = $request->input('keterangan');
        $upload->text = $nama_text;

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
            $upload->title = $request->input('title');

            $upload->chapter = $five[$i];
            
            $upload->save();
        }

        //kembali ke halaman sebelumnya
        return back();
    }
}