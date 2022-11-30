    @extends('layouts.master')

    @section('content')
    <div class="container"
            <div class="row">
                    <table class="table text-dark">
                        <tbody>
                            {{-- menampilkan data  --}}
                            @foreach ($data as $key=>$item)
                            <tr >
                            @desktop
                                <td rowspan="2" style="width: 130px" class="border border-secondary border-right-0 border-left-0">
                                    {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                                    @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
                                    <div class="image-wrapper">
                                        <img src="{{asset('file_upload')}}/{{$item->file}}">
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
                                    @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
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
                                <td style="max-width:70px; word-wrap:break-word; height: 10px" class="border border-secondary border-bottom-0 border-right-0 border-left-0">
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
                                <td style="max-width:70px; word-wrap:break-word;">
                                {{mb_strimwidth($item->keterangan, 0, 400, "...")}}
                                </td>
                                @enddesktop
                                @mobile
                                <td style="max-width: 70px; word-wrap:break-word">
                                {{$item->keterangan}}
                                </td>
                                @endmobile
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="pagination justify-content-center">
            {!! $data->links('vendor.pagination.custom') !!}
        </div>
</div>

    @endsection
        