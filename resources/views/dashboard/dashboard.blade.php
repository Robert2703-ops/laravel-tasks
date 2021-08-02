@extends('templates.templateTasks')

@section('welcome')
    <h2>Welcome, {{ $userName }}</h2>
@endsection
@section('logout')
    <form action="logout" method="post">
        @csrf
        <button type="submit"><i class="fas fa-power-off"></i></button>
    </form>
@endsection


@section('taskButtons')
    <button value="all" class="buttonTask active" id="alltask"> All tasks </button>
    <button value="ToDo" class="buttonTask Todo active"> To do </button>
    <button value="Doing" class="buttonTask Doing"> Doing </button>
    <button value="Done" class="buttonTask Done"> Done </button>
@endsection

@section('taskTable')
    <h2>Your tasks</h2>
    <table id="tasks" cellpadding="3" cellspacing="7" >
        <thead>
            <tr>
                <th width="17.5%"><h3>Title</h3></th>
                <th width="17.5%"><h3>Description</h3></th>
                <th width="17.5%"><h3>Start date</h3></th>
                <th width="17.5%"><h3>Deadline date</h3></th>
                <th width="17.5%"><h3>Status</h3></th>
                <th width="17.5%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $item)
                <tr class="{{ $item['status'] }}">
                    <th> {{ $item['title'] }} </th>
                    <th> {{ $item['description'] }} </th>
                    <th> {{ $item['start'] }} </th>
                    <th> {{ $item['deadline'] }} </th>
                    <th class="status-{{ $item['status'] }}"> {{ $item['status'] }} </th>
                    <th width="24%">
                        <div class="options">
                            <form action="{{ route('done', $item['id']) }}" method="post" class="done">
                                @csrf
                                @method('PUT')
                                <button type="submit"><i class="fas fa-check"></i></button>
                            </form>

                            <div class="edit">
                                <button onclick="location.href = '{{ route('changeTask', $item['id']) }}' "> <i class="fas fa-pencil-alt"></i> </button>
                            </div>

                            <form action="{{ route('deleteTask', $item['id']) }}" method="post" class="delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- @section('createTask')
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
@endsection --}}

