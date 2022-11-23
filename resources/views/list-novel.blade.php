    @extends('layouts.master')

    @section('content')
    <div class="container"
            <div class="row">
                    <table class="table text-dark">
                        <tbody>
                            {{-- menampilkan data  --}}
                            @foreach ($data as $key=>$item)
                            <tr style="border: hidden;">
                                <td rowspan="2" style="width: 130px">
                                    {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                                    @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
                                        <img src="{{asset('file_upload')}}/{{$item->file}}" style="height: 140px; width: 140px;">
                                    @else
                                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                        style="height: 10%">
                                    @endif
                                </td>
                                @desktop
                                <td style="max-width:70px; word-wrap:break-word; height: 10px">
                                <a href="{{ route('create', ['novelId' => $item->title]) }}" style="text-decoration: none;" class="text-dark">{{$item->title}}</a>
                                </td>
                                @enddesktop
                                @mobile
                                <td style="max-width: 150px; word-wrap:break-word;">
                                <a href="{{ route('create', ['novelId' => $item->title]) }}" style="text-decoration: none;" class="text-dark">{{$item->title}}</a>
                                </td>
                                @endmobile
                            </tr>
                            <tr>
                                @desktop
                                <td style="max-width:70px; word-wrap:break-word;">
                                {{mb_strimwidth($item->keterangan, 0, 400, "...")}}
                                </td>
                                @enddesktop
                                @mobile
                                <td style="max-width: 150px; word-wrap:break-word">
                                {{$item->keterangan}}
                                </td>
                                @endmobile
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
</div>

    @endsection
        