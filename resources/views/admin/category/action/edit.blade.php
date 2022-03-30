@extends('admin.layouts.admin')

@section('title', trans('gallery::messages.admin.edit.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('gallery.admin.category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

                <div class="mb-3">
                    <label class="form-label">{{ trans('gallery::messages.category') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i> {{ trans('messages.actions.save') }}</button>
            </form>
        </div>
    </div>
@endsection