@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">TCS3200 RGB Data</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- 🔍 RGB Search Form -->
    <form method="POST" action="{{ route('rgb.search') }}" class="mb-4">
        @csrf
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label for="red" class="form-label">Red (0–255)</label>
                <input type="number" name="red" id="red" min="0" max="255" class="form-control" required placeholder="e.g. 100">
            </div>
            <div class="col-md-3">
                <label for="green" class="form-label">Green (0–255)</label>
                <input type="number" name="green" id="green" min="0" max="255" class="form-control" required placeholder="e.g. 120">
            </div>
            <div class="col-md-3">
                <label for="blue" class="form-label">Blue (0–255)</label>
                <input type="number" name="blue" id="blue" min="0" max="255" class="form-control" required placeholder="e.g. 90">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-outline-primary w-100">Search</button>
                <a href="{{ route('rgb-objects.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
        </div>
    </form>

    <!-- ➕ Add New -->
    <a href="{{ route('rgb-objects.create') }}" class="btn btn-primary mb-3">+ Add New Object</a>

    <!-- 📋 RGB Object Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Red</th>
                <th>Green</th>
                <th>Blue</th>
                <th>Material</th>
                <th>Surface Style</th>
                <th>Object Color</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rgbObjects as $object)
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->red }}</td>
                    <td>{{ $object->green }}</td>
                    <td>{{ $object->blue }}</td>
                    <td>{{ $object->object_material ?? 'Unknown' }}</td>
                    <td>{{ $object->object_thickness ?? 'Unknown' }}</td>
                    <td>{{ $object->object_color ?? 'Unknown' }}</td>
                    <td>
                        <a href="{{ route('rgb-objects.show', $object->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('rgb-objects.edit', $object->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rgb-objects.destroy', $object->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this object?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No RGB data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
