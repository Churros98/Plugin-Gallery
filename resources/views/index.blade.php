@extends('layouts.app')

@section('title', trans('gallery::messages.title'))

@section('content')
    @foreach($datas as $data)
        <h1> {{ $data['category']->name }}</h3><br/>
        
        <div class="card mb-4">
            <div class="card-body text-center position-relative">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                        @foreach($data['images'] as $image)
                        <div class="col">
                            <img src="{{ $image->url() }}" class="img-small rounded" alt="{{ $image->name }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
