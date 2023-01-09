@extends('layouts.master')

@section('content')
<div class="container text-dark">
<h3 style="text-align: center;">Section {{$data->part}}</h3>

<div class="row border-0">
    <div class="col">
        <div class="card border-0" style="background-color: #Dee8e8;">
            <ul class="pagination justify-content-center">
                <div class="col text-center">
                    <li class="page-item">
                        <a class="page-link border-0 text-info"  href="{{ route('view', ['partId' => $back, 'novelId' => $data->upload_id]) }}" style="background-color: #Dee8e8;">Previous</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="page-item ">
                        <a class="page-link border-0 text-info" href="{{ route('create', ['novelId' => $data->upload_id]) }}" style="background-color: #Dee8e8;">Index</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="page-item">
                        <a class="page-link border-0 text-info" href="{{ route('view', ['partId' => $next, 'novelId' => $data->upload_id]) }}" style="background-color: #Dee8e8;">Next</a>
                    </li>
                </div>
            </ul>
        </div>
     </div>
</div>

<div class="row justify-content-md-center">
    <div class="col border-0 text-dark">
        {!! nl2br(e($data->chapter)) !!}
    </div>
</div>
<br>

<div class="row border-0">
<div class="col">
        <div class="card border-0" style="background-color: #Dee8e8;">
            <ul class="pagination justify-content-center">
                <div class="col text-center">
                    <li class="page-item">
                        <a class="page-link border-0 text-info"  href="{{ route('view', ['partId' => $back, 'novelId' => $data->upload_id]) }}" style="background-color: #Dee8e8;">Previous</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="page-item ">
                        <a class="page-link border-0 text-info" href="{{ route('create', ['novelId' => $data->upload_id]) }}" style="background-color: #Dee8e8;">Index</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="page-item">
                        <a class="page-link border-0 text-info" href="{{ route('view', ['partId' => $next, 'novelId' => $data->upload_id]) }}" style="background-color: #Dee8e8;">Next</a>
                    </li>
                </div>
            </ul>
        </div>
     </div>
</div>
</div>




@endsection
    