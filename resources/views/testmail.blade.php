<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <meta http-equiv="X-UA Compatible" content="ie=edge">
        <title>Job Portal</title>
    </head>
    <body>
        <h1>{{$details['title']}}</h1>
        <p>Dear {{$details['user']}} ,</p>
        <p>{{$details['body']}} ,</p>
        <p>Thank You!!!</p>
        <p>Comapny Information</p>
        <p>{{$details['company_name']}}</p>
        <p>{{$details['company_website']}}</p>
        <p>{{$details['company_address']}}</p>
        <p>{{$details['company_phone']}}</p>
        
    </body>
</html>
</html>