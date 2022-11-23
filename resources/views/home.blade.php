@extends('layouts.master')

@section('content')
<div class="container text-dark">
        <h1>{{ $title }}</h1>
        <p>This is the home page for an example Laravel web application.</p>
@mobile
    <p>This is mobile!</p>
@endmobile

@desktop
    <p>This is desktop!</p>
@enddesktop
</div>

@endsection
    