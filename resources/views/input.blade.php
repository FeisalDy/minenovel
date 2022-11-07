@extends('layouts.master')

@section('content')
<h2 class="alert alert-success text-center">
            Cara Input dan Tampil Data Tanpa Reload dengan Ajax Jquery
        </h2>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        {{-- jika mengirim file wajib menggunakan enctype="multipart/form-data" --}}
                        <form action="{{url('input/proses')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-outline mb-4">
                            <label class="form-label d-flex justify-content-start" for="form2Example1">Image</label>
                            <input type="file" name="file" id="form2Example1" class="form-control" />
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
                            <textarea class="form-control" name="keterangan" id="form2Example2" rows="5"></textarea>
                            </div>
                            @error('keterangan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-outline mb-4">
                            <label class="form-label d-flex justify-content-start" for="form2Example1">Text</label>
                            <input type="file" name="text" id="form2Example1" class="form-control" />
                            </div>
                            @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary btn-block mb-4" name="upload" value="Upload" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
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
                            <td>{{$data->firstItem()+$key}}</td>
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
                            <a href="{{ route('create', ['novelId' => $item->id]) }}" class="btn btn-primary">Select</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                {!! $data->links() !!}
                </div>
            </div>
        </div>

@endsection
    