@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="container">
        {{-- jika mengirim file wajib menggunakan enctype="multipart/form-data" --}}
        <form action="{{url('input/proses')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="custom-file form-outline mb-4">
                <label class="custom-file-label" for="form2Example1">Image</label>
                <input type="file" name="file" id="form2Example1" class="custom-file-input"/>
            </div>
            <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>
            @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-outline mb-4">
                <label class="form-label d-flex justify-content-start" for="form2Example1">Title</label>
                <input type="text" name="title" placeholder="Title"id="form2Example1" class="form-control" />
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-outline mb-4">
                <label class="form-label d-flex justify-content-start" for="form2Example2">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="form2Example2" rows="10"></textarea>
            </div>
            @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-dark btn-block mb-4" name="upload" value="Upload" />
            </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th style="width:5%">#</th>
                <th style="width:20%;">File</th>
                <th style="width:65%">Title</th>
                <th style="width:10%"></th>
            </tr>
        </thead>

        <tbody>
        {{-- menampilkan data  --}}
            @foreach ($data as $key=>$item)
            <tr>
                <td>{{$data->firstItem()+$key}}</td>
                <td>
                @desktop
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
                @enddesktop
                @mobile
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
                @endmobile

                </td>
                @desktop
                <td style="max-width:700px; word-wrap:break-word;">
                    <a href="{{ route('inputchapter', ['novelId' => $item->title]) }}" class="text-secondary" style="text-decoration: none;">{{$item->title}}</a></td>
                <td>
                @enddesktop

                @mobile
                <td style="max-width:150px; word-wrap:break-word;">
                    <a href="{{ route('inputchapter', ['novelId' => $item->title]) }}" class="text-secondary" style="text-decoration: none;">{{$item->title}}</a></td>
                <td>
                @endmobile
                <td>
                <div class="d-flex justify-content-end">
                    @desktop
                    <h1>
                    <a href="{{ route('deletenovel', ['novelId' => $item->title])  }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" 
                    style="text-decoration: none;" class="fa fa-trash text-danger" aria-hidden="true"></a>
                    </h1>
                </div>
                    @elsedesktop
                    <h3>
                    <a href="{{ route('deletenovel', ['novelId' => $item->title])  }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" 
                    style="text-decoration: none;" class="fa fa-trash text-danger" aria-hidden="true"></a>
                    </h3>

                    @enddesktop

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>


        <div class="pagination justify-content-center">
            {!! $data->links('vendor.pagination.custom') !!}
        </div>
        </div>
    </div>
</div>
@endsection
    

