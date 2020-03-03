<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="/create-session/">
	{{ csrf_field() }}
	<input type="text" name="enrollment">
	<input type="submit">
</form>
</body>
</html>