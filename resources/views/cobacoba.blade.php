@extends('layouts.master')

@section('content')
<?php header("Content-Type: text/plain; charset=UTF-8");
?>
        <h1>{{ $title }}</h1>

        <p>This is the home page for an example Laravel web application.</p>

    
        <?php
        $file = $data->text;
        $myFile = public_path('file_upload/'. $file);
        $contents = file_get_contents($myFile);

        $encoding = mb_detect_encoding($myFile, mb_detect_order(), false);
        if($encoding == "UTF-8"){
            $myFile = mb_convert_encoding($myFile, 'UTF-8', 'UTF-8');    
        }

        $out = iconv(mb_detect_encoding($myFile, mb_detect_order(), false), "UTF-8//IGNORE", $myFile);
        $contents = file_get_contents($myFile);
        $contents = mb_convert_encoding($contents, 'UTF-8', 'UTF-8');

        $linecount = 0;
        $handle = fopen($myFile, "r");
            while(!feof($handle)){
                $line = fgets($handle);
                $linecount++;
            }
        fclose($handle);

         ?>








        {{$linecount}}
        <br>
        {!! nl2br(e($contents)) !!}

@endsection
    