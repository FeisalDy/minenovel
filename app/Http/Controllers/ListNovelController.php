<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;

class ListNovelController extends Controller
{
    public function index()
    {

        $data = Upload::all();
        return view('list-novel', ['title' => 'List Novel'])->with('data', $data);
    }

    public function createinfo($novelId)
    {
        $data = Upload::findOrFail($novelId);
        return view('novelinfo', ['title' => $data->title])->with('data', $data);
    }
}
