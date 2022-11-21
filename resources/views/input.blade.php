@extends('layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<style>
    .page-item.active .page-link{
        z-index: 3;
        color: #fff !important  ;
        background-color: #000000 !important;
        border-color: #000000 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }
    .page-link{
        z-index: 3;
        color: #000000 !important;
        background-color: #fff;
        border-color: #000000;
        border-radius: 50%;
        padding: 6px 12px !important;
    }
    .page-item:first-child .page-link{
        border-radius: 30% !important;
    }
    .page-item:last-child .page-link{
        border-radius: 30% !important;   
    }
    .pagination li{
        padding: 3px;
    }
    .disabled .page-link{
        color: #000000 !important;
        opacity: 0.5 !important;
    }
</style>


@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="container">
        {{-- jika mengirim file wajib menggunakan enctype="multipart/form-data" --}}
        <form action="{{url('input/proses')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="custom-file form-outline mb-4">
                <label class="custom-file-label" for="form2Example1">Image</label>
                <input type="file" name="file" id="form2Example1" class="custom-file-input" />
            </div>
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:10%">#</th>
                <th style="width:30%">File</th>
                <th style="width:10%">Title</th>
                <th style="width:50%"></th>
            </tr>
        </thead>

        <tbody>
        {{-- menampilkan data  --}}
            @foreach ($data as $key=>$item)
            <tr>
                <td>{{$data->firstItem()+$key}}</td>
                <td>
                {{-- jika ekstensi file adalah png, jpg atau jpeg maka tampilkan gambar  --}}
                    @if( in_array(pathinfo($item->file, PATHINFO_EXTENSION), ['png', 'jpg', 'JPEG']))
                        <img src="{{asset('file_upload')}}/{{$item->file}}" class="img-fluid" alt="Responsive image">
                    @else
                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png" style="height: 60px">
                     @endif
                </td>
                @desktop
                <td style="max-width:700px; word-wrap:break-word;">
                    <a href="{{ route('inputchapter', ['novelId' => $item->title]) }}" class="text-secondary text-decoration-none">{{$item->title}}</a></td>
                <td>
                    @enddesktop
                @mobile
                <td style="max-width:150px; word-wrap:break-word;">
                    <a href="{{ route('inputchapter', ['novelId' => $item->title]) }}" class="text-secondary text-decoration-none">{{$item->title}}</a></td>
                <td>
                @endmobile
                    <div class="d-flex justify-content-end">
                    <a href="{{ route('deletenovel', ['novelId' => $item->title])  }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" class="btn btn-danger">Delete</a>
                    </div>
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
    

