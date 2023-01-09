@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row">
        <table class="table text-dark">
            <tbody>
                {{-- menampilkan data  --}}
                @foreach ($data as $key=>$item)
                <tr>
                    @desktop
                    <td rowspan="2" style="width: 130px" class="border border-secondary border-right-0 border-left-0 border-top-0">
                        {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                        @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG', 'jfif']))
                        <div class="image-wrapper">
                            <a href="{{ route('create', ['novelId' => $item->id]) }}">
                                <img src="{{asset('file_upload')}}/{{$item->file}}">
                            </a>
                        </div>
                        @else
                        <div class="image-wrapper">
                            <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png" style="height: 60px">
                        </div>
                        @endif
                    </td>
                    @enddesktop

                    @mobile
                    <td rowspan="2" style="width: 50px" class="border border-secondary border-right-0 border-left-0">
                        {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                        @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG', 'jfif']))
                        <div class="image-wrapper-mobile">
                            <img src="{{asset('file_upload')}}/{{$item->file}}">
                        </div>
                        @else
                        <div class="image-wrapper-mobile">
                            <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png" style="height: 60px">
                        </div>
                        @endif
                    </td>
                    @endmobile

                    @desktop
                    <td style="max-width:70px; word-wrap:break-word; height: 10px;" class="border border-secondary border-bottom-0 border-right-0 border-left-0 border-top-0 pb-0">
                        <h3>
                            <a href="{{ route('create', ['novelId' => $item->id]) }}" style="text-decoration: none;" class="text-dark">{{$item->title}}</a>
                        </h3>
                    </td>
                    @enddesktop

                    @mobile
                    <td style="max-width: 70px; word-wrap:break-word; height: 10px;" class="border border-secondary border-bottom-0 border-right-0 border-left-0">
                        <h4>
                            <a href="{{ route('create', ['novelId' => $item->id]) }}" style="text-decoration: none;" class="text-dark">{{$item->title}}</a>
                        </h4>
                    </td>
                    @endmobile
                </tr>
                <tr>
                    @desktop
                    <td style="max-width:70px; word-wrap:break-word;" class="border border-secondary border-top-0 border-right-0 border-left-0 pt-0">
                        <?php $i = 1; ?>
                        @foreach ($data2 as $key=>$item2)
                        @if($item->id == $item2->upload_id && $i <= 5) <a href="{{ route('view', ['partId' => $item2->part, 'novelId' => $item2->upload_id]) }}" class="text-dark" style="text-decoration: none;">Chapter {{$item2->part}}</a><br>
                            <?php $i++; ?>
                            @endif
                            @endforeach
                    </td>
                    @enddesktop

                    @mobile
                    <td style="max-width: 70px; word-wrap:break-word" class="border border-secondary border-top-0 border-right-0 border-left-0 pt-0">
                        <?php $i = 1; ?>
                        @foreach ($data2 as $key=>$item2)
                        @if($item->id == $item2->upload_id && $i <= 5) <a href="{{ route('view', ['partId' => $item2->part, 'novelId' => $item2->upload_id]) }}" class="text-dark" style="text-decoration: none;">Chapter {{$item2->part}}</a><br>
                            <?php $i++; ?>
                            @endif
                            @endforeach
                    </td>
                    @endmobile
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>

@endsection