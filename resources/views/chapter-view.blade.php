@extends('layouts.master')

@section('content')
<div class="row border border-secondary">
    <div class="col">
        <div class="card border-0">
            <ul class="pagination">
                <div class="col text-center-left">
                    <li class="page-item">
                        <a class="page-link border-0"  href="{{ route('view', ['partId' => $back, 'novelId' => $data->judul]) }}">Previous</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="page-item ">
                        <a class="page-link border-0" href="{{ route('create', ['novelId' => $data->judul]) }}">Index</a>
                    </li>
                </div>
                <div class="col">
                    <li class="page-item text-right">
                        <a class="page-link border-0" href="{{ route('view', ['partId' => $next, 'novelId' => $data->judul]) }}">Previous</a>
                    </li>
                </div>
            </ul>
        </div>
     </div>
</div>

<div class="row border border-secondary">
        {!! nl2br(e($data->chapter)) !!}
        {{$data->chapter}}
        <?php
        $coba = "               kok bisa                    sih                     "; 
        $coba2 = $data->chapter;
        $ro = preg_replace('/\s+/', ' ', $data->chapter);
        $text = preg_replace("/[\r\n]+/", "\n", $data->chapter);
        $text2 = preg_replace("/[\r\n]+/", "\n", $coba2);

        
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>HAHAHAHAHAHAHAHAHA</h1>
                {!! nl2br(e($text2)) !!}
</div>

<div class="row border border-secondary">
    <div class="col">
        <div class="card border-0">
            <ul class="pagination">
                <div class="col text-center-left">
                    <li class="page-item">
                        <a class="page-link border-0"  href="{{ route('view', ['partId' => $back, 'novelId' => $data->judul]) }}">Previous</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="page-item ">
                        <a class="page-link border-0" href="{{ route('create', ['novelId' => $data->judul]) }}">Index</a>
                    </li>
                </div>
                <div class="col">
                    <li class="page-item text-right">
                        <a class="page-link border-0" href="{{ route('view', ['partId' => $next, 'novelId' => $data->judul]) }}">Previous</a>
                    </li>
                </div>
            </ul>
        </div>
     </div>
</div>




@endsection
    