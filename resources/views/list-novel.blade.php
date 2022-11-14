    @extends('layouts.master')

    @section('content')
            <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">File</th>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- menampilkan data  --}}
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                                    @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
                                        <img src="{{asset('file_upload')}}/{{$item->file}}" style="height: 60px">
                                    @else
                                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                        style="height: 10%">
                                    @endif
                                </td>
                                <td>{{$item->title}}</td>
                                <td>
                                <a href="{{ route('create', ['novelId' => $item->title]) }}" class="btn btn-primary">Select</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>

    @endsection
        