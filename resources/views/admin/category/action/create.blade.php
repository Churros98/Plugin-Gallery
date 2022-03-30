@extends('admin.layouts.admin')

@section('title', trans('gallery::messages.admin.create.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('gallery.admin.category.store') }}" method="POST">
            @csrf
            @method('POST')
            
                <div class="mb-3">
                    <label class="form-label">{{ trans('gallery::messages.category') }}</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i> {{ trans('messages.actions.add') }}</button>
            </form>
        </div>
    </div>
@endsection