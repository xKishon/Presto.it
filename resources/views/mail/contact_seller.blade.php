<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>L'utente {{$user->name}} ha richiesto informazioni sull'articolo {{$articleName}}:</h1>
        
        <p>{{$description}}</p>

        <p>Se desideri rispondere a {{$user->name}} puoi contattarlo su questa mail: {{$user->email}}</p>
    </div>
    
</body>
</html>