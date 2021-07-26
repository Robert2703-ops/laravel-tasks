<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('name')</title>

    <link rel="stylesheet" href="/css/layouts/defaultLayout.css">
    <link rel="stylesheet" href="/css/exceptions/tasksPut.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="flexContent">
                <div class="form">
                    <div class="title">
                        <h1>Change task</h1>
                    </div>

                    @if ($errors->any())
                    <ul type = "none" class="error">
                        @foreach ($errors->all() as $error)
                            <li>⛔ {{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    
                    <div class="formContent">
                        <form action="{{ route('updateTask', $task['id']) }}" method="POST" class="putTask">
                            @csrf
                            @method('PUT')
                
                            <div>
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $task['title'] }}" placeholder="Title">
                            </div>
                
                            <div class="exception">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="10"> {{ $task['description'] }} </textarea>
                            </div>
                                
                            <div>
                                <label>Start date</label>
                                <input type="date" name="start" value="{{ $task['start'] }}">
                            </div>
                        
                            <div>
                                <label>Deadline date</label>
                                <input type="date" name="deadline" value="{{ $task['deadline'] }}">
                            </div>
                
                            <div class="status">
                                @if ($task['status'] === "ToDo")
                                    <div><input type="radio" name="status" checked value="ToDo">To Do</div>
                                    <div><input type="radio" name="status" value="Doing">Doing</div>
                                    <div><input type="radio" name="status" value="Done">Done</div>
                
                                @elseif ($task['status'] === "Doing")
                                    <div><input type="radio" name="status" value="ToDo">To Do</div>
                                    <div><input type="radio" name="status" checked value="Doing">Doing</div>
                                    <div><input type="radio" name="status" value="Done">Done</div>
                                
                                @elseif ($task['status'] === "Done")
                                    <div><input type="radio" name="status" value="ToDo"><label for="">To Do</label></div>
                                    <div><input type="radio" name="status" value="Doing"><label for="">Doing</label></div>
                                    <div><input type="radio" name="status" checked value="Done"><label for="">Done</label></div>
                                @endif
                            </div>
                
                            <div class="submit">
                                <input type="submit" value="Change">
                            </div>
                        </form>
                    </div>
                    
                    <div>
                        @if (session()->has('message'))
                            <ul>
                                <li>{{ session()->get('message') }}</li>
                            </ul>
                        @endif
                    </div>    

                    <div class="link">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <script src="/js/showPassword.js"></script>
</body>
</html>