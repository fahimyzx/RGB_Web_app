<!DOCTYPE html>
<html>
<head>
    <title>Sensor Data List</title>
</head>
<body>
    <h1>Sensor Data Records</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('sensor-data.create') }}">Add New Data</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Red</th>
                <th>Green</th>
                <th>Blue</th>
                <th>Color Name</th>
                <th>Material</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->red }}</td>
                <td>{{ $d->green }}</td>
                <td>{{ $d->blue }}</td>
                <td>{{ $d->color_name }}</td>
                <td>{{ $d->material }}</td>
                <td>{{ $d->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
