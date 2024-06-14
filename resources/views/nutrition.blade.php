<!DOCTYPE html>
<html>
<head>
    <title>Nutrition Info</title>
</head>
<body>
    <h1>Get Nutrition Information</h1>
    <form action="/nutrition" method="GET">
        <label for="query">Enter Food Items:</label>
        <input type="text" id="query" name="query" required>
        <button type="submit">Get Info</button>
    </form>

    @if(isset($error))
        <h2 style="color: red;">{{ $error }}</h2>
    @elseif(isset($nutritionInfo))
        <h2>Nutrition Information:</h2>
        <pre>{{ json_encode($nutritionInfo, JSON_PRETTY_PRINT) }}</pre>
    @endif
</body>
</html>
