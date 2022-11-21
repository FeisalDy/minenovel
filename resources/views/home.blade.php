@extends('layouts.master')

@section('content')
        <h1>{{ $title }}</h1>
        <p>This is the home page for an example Laravel web application.</p>
@mobile
    <p>This is mobile!</p>
@endmobile

@desktop
    <p>This is desktop!</p>
@enddesktop

@endsection
    