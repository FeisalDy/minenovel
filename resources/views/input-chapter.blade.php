@extends('layouts.master')

@section('content')
<div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        {{-- jika mengirim file wajib menggunakan enctype="multipart/form-data" --}}
                        <form action="{{url('input/chapter/proses')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h3>{{$data2->title}}</h3>

                            <?php 
                            $title = $data2->title;
                            ?>
                            <input type="hidden" name="title" value="<?php echo $title?>">

                            <br>
                            <div class="form-outline mb-4">
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
                            <th scope="col">Judul</th>
                            <th scope="col">Chapter</th>
                            <th scope="col">
                            <a href="{{ route('deletechapter', ['novelId' => $data3])  }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" class="btn btn-danger">Delete</a>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- menampilkan data  --}}
                        @foreach ($data as $key=>$item)
                        <tr>
                            <td>
                                {{$item->title}}
                            </td>
                            <td>Chapter {{$data->firstItem()+$key}}</td>
                            <td>
                            <a href="{{ route('view', ['partId' => $item->part, 'novelId' => $item->judul]) }}" class="btn btn-primary">Select</a>
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
    