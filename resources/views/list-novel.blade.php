    @extends('layouts.master')

    @section('content')
    <div class="container">
        <table class="table text-dark">
            <tbody>
                {{-- menampilkan data  --}}
                @foreach ($data as $key=>$item)
                @if (auth()->check())
                <?php $nama = auth()->user()->id; ?>
                @endif
                <tr>
                    @desktop
                    <td rowspan="2" style="width: 130px" class="border border-secondary border-top-0 border-right-0 border-left-0">
                        {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                        @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
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
                        @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
                        <div class="image-wrapper-mobile">
                            <a href="{{ route('create', ['novelId' => $item->id]) }}">
                                <img src="{{asset('file_upload')}}/{{$item->file}}">
                            </a>
                        </div>
                        @else
                        <div class="image-wrapper-mobile">
                            <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png" style="height: 60px">
                        </div>
                        @endif
                    </td>
                    @endmobile

                    @desktop
                    <td style="max-width:70px; word-wrap:break-word; height: 10px" class="">
                        <h3>
                            <a href="{{ route('create', ['novelId' => $item->id]) }}" style="text-decoration: none;" class="text-dark">{{$item->title}}</a>
                        </h3>
                    </td>

                    @if (auth()->check())
                    <td style="width : 1%;">
                        <div class="float-right">
                            <a href="{{ route('bookmark', ['novelId' => $item->id, 'userId' => $nama]) }}" style="text-decoration: none;" class="text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                                    <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                    @foreach ($data2 as $key=>$item2)

                    @if (($item->id == $item2->novel_id) && ($nama == $item2->user_id))
                    <td style="width : 1%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="red" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                    </td>
                    @endif

                    @endforeach

                    @endif
                    @enddesktop

                    @mobile
                    <td style="max-width: 70px; word-wrap:break-word; height: 10px;" class="border border-secondary border-bottom-0 border-right-0 border-left-0">
                        <h4>
                            <a href="{{ route('create', ['novelId' => $item->id]) }}" style="text-decoration: none;" class="text-dark">{{$item->title}}</a>
                        </h4>
                    </td>
                    @if (auth()->check())
                    </td>
                    <td style="width: 1%;">
                        <div class="float-right">
                            <a href="google.com">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                                    <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                    @endif
                    @endmobile
                </tr>
                <tr>
                    @desktop
                    <td style="max-width:70px; word-wrap:break-word;" class="border border-secondary border-top-0 border-left-0 border-right-0">
                        {{mb_strimwidth($item->keterangan, 0, 400, "...")}}
                    </td>
                    @enddesktop
                    @mobile
                    <td style="max-width: 70px; word-wrap:break-word">
                        {{mb_strimwidth($item->keterangan, 0, 400, "...")}}
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