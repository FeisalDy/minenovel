@extends('layouts.master')

@section('content')
<div class="container">
<div class="row border-0">
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

<div class="row justify-content-md-center">
    <div class="col border-0 col-lg-11">
        {!! nl2br(e($data->chapter)) !!}
    </div>
</div>
<br>

<div class="row border-0">
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
</div>




@endsection
    