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
    <div class="row">
        <div class="container">
        {{-- jika mengirim file wajib menggunakan enctype="multipart/form-data" --}}
            <form action="{{url('input/chapter/proses')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h3 style="text-align: center; word-wrap:break-word;">{{$data2->title}}</h3>
                    <?php $title = $data2->title; $id = $data2->id;?>
                        <input type="hidden" name="id" value="<?php echo $id?>"><br>
                            <div class="custom-file form-outline mb-4">
                                <label class="custom-file-label" for="form2Example1">Txt File</label>
                                <input type="file" name="text" id="form2Example1" class="custom-file-input"/>
                            </div>
                            <script>
                            // Add the following code if you want the name of the file appear on select
                            $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                            });
                            </script>
                            @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-dark btn-block mb-4" name="upload" value="Upload" />
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Chapter</th>
                <th scope="col" class="text-right">
                <h1>
                <a href="{{ route('deletechapter', ['novelId' => $data3])  }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?')" 
                class="fa fa-trash text-danger" style="text-decoration: none;" aria-hidden="true"></a>
                </h1>
                </th>
            </tr>
        </thead>

        <tbody>
        {{-- menampilkan data  --}}
            @foreach ($data as $key=>$item)
            <tr>
                <td>
                    {{$item->title}}</td>
                <td>Chapter {{$data->firstItem()+$key}}</td>
                <td class="text-right"><a href="{{ route('view', ['partId' => $item->part, 'novelId' => $item->upload_id]) }}" class="btn btn-dark">Select</a></td>
            </tr>
            @endforeach
        </tbody>

        </table>
            <div class="pagination justify-content-center">
                {!! $data->links('vendor.pagination.custom') !!}
            </div>
            
    </div>
    </div>
</div>
@endsection
    