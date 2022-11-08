@extends('layouts.master')

@section('content')
<h2 class="alert alert-success text-center">
            Cara Input dan Tampil Data Tanpa Reload dengan Ajax Jquery
        </h2>
        <div class="row">
            <div class="col-3">
                <div class="card border-0">
                    <img src="{{asset('file_upload')}}/{{$data->file}}" class="img-fluid">
                </div>
            </div>
            <div class="col-9"> 
                <div class="card border-0">
                        <h3>{{$data->title}}</h3>
                        {!! nl2br(e($data->keterangan)) !!}
                </div>
            </div>
        </div>
        <div>
            <h3>{{$data2->chapter}}</h3>
        </div>
@endsection
    