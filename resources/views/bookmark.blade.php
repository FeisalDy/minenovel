<style>
    .row {
        position: relative;
    }

    .row img {
        width: 100%;
    }

    .txtDiv {
        display: none;
    }

    .txtDiv:hover {
        display: block;
        position: absolute;
        right: 15px;
        top: 10px;
        background: rgba(255, 0, 0, 0.5);
        color: #fff;
    }

    .myDiv:hover+.txtDiv {
        display: block;
        position: absolute;
        right: 15px;
        top: 10px;
        background: rgba(255, 0, 0, 0.5);
        color: #fff;
    }

    body {
        margin: 0px;
    }
</style>
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $key=>$item)
        @if (auth()->check())
        <?php $nama = auth()->user()->id; ?>
        @endif
        <div class="col-sm-2">
            <tr>
                <div class="myDiv">
                    <div class="d-flex justify-content-center">
                        <td rowspan="2" class="border border-secondary border-right-0 border-left-0">
                            <div class="image-wrapper">
                                <a href="{{ route('create', ['novelId' => $item->id]) }}">
                                    <img src="{{asset('file_upload')}}/{{$item->file}}">
                                </a>
                            </div>
                        </td>
                    </div>
                </div>

                <div class="txtDiv">
                    <div class="ml-1 px-1">
                        <a href="{{ route('bookmark', ['novelId' => $item->id, 'userId' => $nama]) }}" style="text-decoration: none;" class="text-light">Delete</a>
                    </div>
                </div>


            </tr>
            <tr>
                <div style="text-align: center;">
                    <td style="max-width:70px; word-wrap:break-word; height: 10px;" class="border border-secondary border-bottom-0 border-right-0 border-left-0 pb-0">
                        <?php $judul = $item->title;
                        $out = strlen($judul) > 20 ? substr($judul, 0, 20) . "..." : $judul;
                        ?>
                        <a href="{{ route('create', ['novelId' => $item->id]) }}" style="text-decoration: none;" class="text-dark">{{$out}}</a>
                    </td>
                </div>
            </tr>
        </div>
        @endforeach
    </div>
</div>

@endsection