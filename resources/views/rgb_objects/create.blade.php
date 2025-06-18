@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New RGB Object</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rgb-objects.store') }}" method="POST">
        @csrf

        @foreach (['red', 'green', 'blue'] as $color)
            <div class="form-group mb-3">
                <label for="{{ $color }}">{{ ucfirst($color) }} Value</label>
                <input type="number" name="{{ $color }}" id="{{ $color }}" class="form-control" min="0" max="255" required value="{{ old($color) }}">
            </div>
        @endforeach

        <div class="form-group mb-3">
            <label for="object_material">Material</label>
            <input type="text" name="object_material" id="object_material" class="form-control" required value="{{ old('object_material') }}">
        </div>

        <div class="form-group mb-3">
            <label for="object_thickness">Surface Style / Thickness</label>
            <input type="text" name="object_thickness" id="object_thickness" class="form-control" value="{{ old('object_thickness') }}">
        </div>

        <div class="form-group mb-3">
            <label for="object_color">Object Color</label>
            <input type="text" name="object_color" id="object_color" class="form-control" required value="{{ old('object_color') }}">
        </div>

        <div class="form-group mb-4">
            <label for="object_specific_data">Specific Data</label>
            <textarea name="object_specific_data" id="object_specific_data" class="form-control" rows="3">{{ old('object_specific_data') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Create RGB Object</button>
    </form>
</div>
@endsection
