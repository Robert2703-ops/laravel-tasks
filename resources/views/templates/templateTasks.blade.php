<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="/css/layouts/defaultLayout.css">
    <link rel="stylesheet" href="/css/layouts/templateTasks/templateTasks.css">
    <link rel="stylesheet" href="/css/layouts/templateTasks/modal-create-task.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

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
                    
                        <div class="create-task">
                            <button type="button">create new task</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    


    <div id="modal-create-task" class="modal-container">
        <div class="modal">
            <button type="button" class="close">X</button>

            <h1>Create task</h1>

            @if ($errors->any())
                <h3 style="color: red">Please, don´t levae any blank fields!</h3>       
            @endif

            <form action="{{ route('createTask') }}" method="post">
                @csrf
        
                <div>
                    <label>Task title: </label>
                    <input type="text" name="title">
                </div>
                
                <div>
                    <label>Task description: </label>
                    <br>
                    <textarea name="description" cols="20" rows="10" placeholder="Task's description"></textarea>
                </div>
                
                <div>
                    <label>Task's start: </label>
                    <input type="date" name="start">
                </div>
                
                <div>
                    <label>Task's deadline: </label>
                    <input type="date" name="deadline">
                </div>
                
                <div>
                    <input type="submit" value="Create">
                </div>
                
            </form>

        </div>
    </div>

    <script src="js/taskFilter.js"></script>
    <script src="js/animations.js"></script>
    <script src="js/buttonTask.js"></script>
    <script src="js/activeButton.js"></script>
    <script src="js/modal-create-task.js"></script>
</body>
</html>