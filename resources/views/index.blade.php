<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <style>
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            .container {
                display: block;
                width: 400px;
            }

            .container form {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: stretch;
            }

            .container form > input {
                border: 1px solid #d4d4d4;
                border-radius: 5px;
                padding: 15px;
                margin-top: 10px;
            }

            .container form > input[type=submit] {
                background: #5d43f0;
                border: 0;
                color: #fff;
            }

            ul {
                list-style: none;
                padding: 10px;
                background: #ffdada;
                border-radius: 5px;
            }

            .success {
                padding: 10px;
                background: #d1e9d0;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
       <div class = "container">

            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
             @endif

            @if(session()->has('response'))
            <div class = "success">
                {{ session()->get('response') }}
            </div>
             @endif

            <form action = "store" method = "POST">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">

                <input type="text" name="surname" placeholder="Surname" value="{{ old('surname') }}">
                <br>
                <input type="email" name="email"
                pattern="[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+" 
                size="30" placeholder="Email" value="{{ old('email') }}" required>

                <input type="submit" value="Send">
            </form>
       </div>
    </body>
</html>
