@extends('layouts.app')

@section('title', trans('gallery::messages.title'))

@section('content')
    <style>.gallery-image{margin-bottom: 23px;}</style>
    @foreach($datas as $category)
        @if(!$category->links->isEmpty())
            <h1> {{ $category->name }}</h3><br/>
            
            <div class="card mb-4">
                <div class="card-body text-center position-relative">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                            @foreach($category->links as $link)
                            <div class="col gallery-image">
                                <img src="{{ $link->image->url() }}" class="img-small img-fluid rounded" alt="{{ $link->image->name }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
