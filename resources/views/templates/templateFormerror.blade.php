<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('name')</title>

    <link rel="stylesheet" href="/css/layouts/defaultLayout.css">
    <link rel="stylesheet" href="/css/layouts/templateFormError/templateFormError.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="flexContent">
                <div class="form">
                    <div class="title">
                        @yield('title')
                    </div>

                    @if ($errors->any())
                    <ul type = "none" class="error">
                        @foreach ($errors->all() as $error)
                            <li>⛔ {{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    
                    <div class="formContent">
                        @yield('form')
                    </div>
                    
                    <div>
                        @if (session()->has('message'))
                            <ul>
                                <li>{{ session()->get('message') }}</li>
                            </ul>
                        @endif
                    </div>    

                    <div class="link">
                        @yield('link')
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <script src="/js/showPassword.js"></script>
</body>
</html>