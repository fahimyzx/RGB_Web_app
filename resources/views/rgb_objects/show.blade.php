@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">RGB Object Details</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Red:</strong> {{ $rgbObject->red }}</li>
        <li class="list-group-item"><strong>Green:</strong> {{ $rgbObject->green }}</li>
        <li class="list-group-item"><strong>Blue:</strong> {{ $rgbObject->blue }}</li>
        <li class="list-group-item"><strong>Material:</strong> {{ $rgbObject->material }}</li>
        <li class="list-group-item"><strong>Surface Style:</strong> {{ $rgbObject->surface_style }}</li>
        <li class="list-group-item"><strong>Object Color:</strong> {{ $rgbObject->object_color }}</li>
        <li class="list-group-item"><strong>Created At:</strong> {{ $rgbObject->created_at }}</li>
    </ul>

    <a href="{{ route('rgb-objects.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
