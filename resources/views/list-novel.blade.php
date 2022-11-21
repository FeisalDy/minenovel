    @extends('layouts.master')

    @section('content')
    <div class="container"
            <div class="row">
                    <table class="table table-striped">
                        <tbody>
                            {{-- menampilkan data  --}}
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td rowspan="2" style="width: 130px; border: 1px solid black">
                                    {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                                    @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
                                        <img src="{{asset('file_upload')}}/{{$item->file}}" style="height: 120px; width: 120px;">
                                    @else
                                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                        style="height: 10%">
                                    @endif
                                </td>
                                @desktop
                                <td style="max-width:70px; word-wrap:break-word; border: 1px solid black">
                                <a href="{{ route('create', ['novelId' => $item->title]) }}" class="text-secondary text-decoration-none">{{$item->title}}</a>
                                </td>
                                @enddesktop
                                @mobile
                                <td style="max-width: 150px; word-wrap:break-word;">
                                <a href="{{ route('create', ['novelId' => $item->title]) }}" class="text-secondary text-decoration-none">{{$item->title}}</a>
                                </td>
                                @endmobile
                            </tr>
                            <tr>
                                @desktop
                                <td style="max-width:70px; word-wrap:break-word; border: 1px solid black">
                                {{$item->keterangan}}
                                </td>
                                @enddesktop
                                @mobile
                                <td style="max-width: 150px; word-wrap:break-word;">
                                <a href="{{ route('create', ['novelId' => $item->title]) }}" class="text-secondary text-decoration-none">{{$item->title}}</a>
                                </td>
                                @endmobile
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
</div>

    @endsection
        