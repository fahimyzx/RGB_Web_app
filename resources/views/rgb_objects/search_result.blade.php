@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Search Results for RGB ({{ $input['red'] }}, {{ $input['green'] }}, {{ $input['blue'] }})</h1>

    <!-- Back Button -->
    <div class="mb-3">
        <a href="{{ route('rgb-objects.index') }}" class="btn btn-secondary">← Back to All RGB Data</a>
    </div>

    @if($object)
        <!-- Object Found -->
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
                    <th>Specific Data</th> <!-- Added this column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->red }}</td>
                    <td>{{ $object->green }}</td>
                    <td>{{ $object->blue }}</td>
                    <td>{{ $object->object_material ?? 'N/A' }}</td>
                    <td>{{ $object->object_thickness ?? 'N/A' }}</td>
                    <td>{{ $object->object_color ?? 'N/A' }}</td>
                    <td>{{ $object->object_specific_data ?? 'N/A' }}</td> <!-- Display here -->
                    <td>
                        <a href="{{ route('rgb-objects.show', $object->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('rgb-objects.edit', $object->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rgb-objects.destroy', $object->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this object?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <!-- No Matching Object -->
        <div class="alert alert-warning">
            ❌ No matching RGB object found for your search.
        </div>
    @endif
</div>
@endsection
