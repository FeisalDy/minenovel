@extends('layouts.master')

@section('content')
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
        <br>
        <div>
            @foreach($data2->chunk(3) as $chunk)
                <div class="row">
                    @foreach($chunk as $key=>$item)
                        <div class="col-4">
                            <a href="{{ route('view', ['partId' => $item->part, 'novelId' => $item->judul]) }}">Chapter {{$item->part}}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
@endsection
    