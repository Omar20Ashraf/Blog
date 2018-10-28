<!DOCTYPE html>
<html long='en'>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<title>Email</title>
</head>
<body>

	<h1> Hi Admin </h1>
	<p>you have new email  from  {{ $name }}</p>
	
	<p>Email:   {{ $email }}</p>

	<p>Subject: {{ $subject }}</p>

	<hr/>
	<p>body: {{ $body }}</p>
</body>
</html>