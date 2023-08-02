<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h3>New company created</h3>
<p><b>Company name:</b> {{ $company->name }}</p>
<p><b>Company email:</b> {{ $company->email }}</p>
<p><b>Company url:</b> {{ $company->url }}</p>
<p><b>Company about:</b> {{ $company->about }}</p>
</body>
</html>
