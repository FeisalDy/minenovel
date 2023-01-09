@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-3">
        @desktop
        <div class="card border-0 image-wrapper2">
            <img src="{{asset('file_upload')}}/{{$data->file}}" class="img-fluid">
        </div>
        @elsedesktop
        <div class="card border-0 image-wrapper-mobile">
            <img src="{{asset('file_upload')}}/{{$data->file}}" class="img-fluid">
        </div>
        @enddesktop
    </div>
    <div class="col-9">
        <div class="card border-0 text-dark" style="background-color: #Dee8e8;">
            <h3>{{$data->title}}</h3>
            {!! nl2br(e($data->keterangan)) !!}
        </div>
    </div>
</div>
<br>
<div>
    @desktop
    @foreach($data2->chunk(4) as $chunk)
    <div class="row">
        @foreach($chunk as $key=>$item)
        <div class="col-3">
            <a href="{{ route('view', ['partId' => $item->part, 'novelId' => $item->upload_id]) }}" class="text-dark" style="text-decoration: none;">Chapter {{$item->part}}</a>
        </div>
        @endforeach
    </div>
    @endforeach
    @elsedesktop
    @foreach($data2->chunk(3) as $chunk)
    <div class="row">
        @foreach($chunk as $key=>$item)
        <div class="col-4">
            <a href="{{ route('view', ['partId' => $item->part, 'novelId' => $item->upload_id]) }}" class="text-dark" style="text-decoration: none;">Chapter {{$item->part}}</a>
        </div>
        @endforeach
    </div>
    @endforeach
    @enddesktop
</div>
@endsection