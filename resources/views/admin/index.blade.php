@extends('admin.layouts.admin')

@section('title', trans('gallery::messages.admin.image'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.image') }}</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('messages.fields.file') }}</th>
                        <th scope="col">{{ trans('gallery::messages.category') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($images as $image)
                        <tr>
                            <th scope="row">{{ $image['image']->id }}</th>
                            <td>
                                <img src="{{ $image['image']->url() }}" class="img-small rounded" alt="{{ $image['image']->name }}">
                            </td>
                            <td>{{ $image['image']->name }}</td>

                            <td>
                                <a href="{{ $image['image']->url() }}" target="_blank" rel="noopener noreferrer">
                                    {{ $image['image']->file }}
                                </a>
                            </td>

                            <td>
                                <select onchange="setCategory({{ $image['image']->id }}, this.value);" class="form-select">
                                    <option value="-1">{{ trans('gallery::messages.no_category') }}</option>

                                    @foreach($categories as $category)
                                        @if ($image['category_selected'] === $category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ plugin_asset('gallery', 'js/jquery-1.9.1.min.js') }}" defer></script>
    <script>
        function setCategory(image, category) {
            $.ajax({
                type:"POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{ route('gallery.admin.set') }}",
                data: { _method: "PUT", image: image, category: category }
            });
        }
    </script>
@endpush