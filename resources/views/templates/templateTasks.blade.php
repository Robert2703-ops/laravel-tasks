<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="/css/layouts/defaultLayout.css">
    <link rel="stylesheet" href="/css/layouts/templateTasks/templateTasks.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="flexContent">
                
                <div>
                    <header class="header">
                        <div class="welcome">
                            @yield('welcome')
                        </div>
                            
                        <div class="items">
                            <div class="userPlace">
                                <a href="{{ route('user') }}">Change Name and Password</a>
                            </div>
                            <div class="logout"> 
                                @yield('logout')
                            </div>
                        </div>
                    </header>

                    <div class="tasks">
                        <div class="tasksButtons">
                            @yield('taskButtons')
                        </div>

                        <div id="taskTable">
                            @yield('taskTable')
                        </div>
                    </div>

                    {{-- <div class="createTask">
                        <div>
                            <div class="closeWindow">
                                <h1>criar tarefa</h1>
                            </div>
                            
                            <div class="closeWindow">
                                <button>❌</button>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                    <div>
                        @yield('createTask')
                    </div> --}}
                </div>
            </div>
        </div>
    </div>    

    <script src="js/taskFilter.js"></script>
    <script src="js/animations.js"></script>
    <script src="js/buttonTask.js"></script>
    <script src="js/activeButton.js"></script>
</body>
</html>