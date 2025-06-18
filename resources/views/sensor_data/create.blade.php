<!DOCTYPE html>
<html>
<head>
    <title>Add Sensor Data</title>
</head>
<body>
    <h1>Add New Sensor Data</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sensor-data.store') }}">
        @csrf
        <label>Red (0-255):</label>
        <input type="number" name="red" min="0" max="255" required><br><br>

        <label>Green (0-255):</label>
        <input type="number" name="green" min="0" max="255" required><br><br>

        <label>Blue (0-255):</label>
        <input type="number" name="blue" min="0" max="255" required><br><br>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('sensor-data.index') }}">Back to list</a>
</body>
</html>
