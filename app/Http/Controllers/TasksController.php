<?php

namespace App\Http\Controllers;

use App\Http\Requests\task\TaskValidateStore;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    private $auth;

    public function __construct()
    {  
        $this->auth = Auth();
    }

    // logout
    public function logout( Request $request )
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //Change info
    public function userPlace()
    {
        $user = Auth::user();
        return view("changeUserinfo.Userplace", ['user' => $user]);
    }

    // Tasks CRUD

    //GET
    public function dashboard()
    {
        $user = Auth::user();
        $tasks = Task::all()->where('fk_user_id', $user['id']);

        return view('dashboard.dashboard', ['tasks' => $tasks, 'userName' => $user['name']]);
    }

    // POST
    public function storeTask (TaskValidateStore $request)
    {
        $task = $request->all();
        
        $task['start'] = $this->dateconvert($task['start']);
        $task['deadline'] = $this->dateconvert($task['deadline']);
        
        $task['status'] = "ToDo";
        $task['fk_user_id'] = $this->auth->user()['id'];

        Task::create($task);

        return redirect()->back()->with('message', 'Task created!');
    }

    //PUT
    public function changeTask (int $id)
    {
        $task = Task::where('id', $id)->first();


        foreach ($task as $fields => $key)
        {
            $task[$fields] = $key;
        }

        return view('dashboard.tasks.taskPut', ['task' => $task]);
    }

    public function updateTask(int $id, TaskValidateStore $request)
    {
        $task = $request->only('title', 'description', 'start', 'deadline', 'status');
        
        Task::where('id', $id)->update($task);

        return $this->redirectBack("Task changed!");
    }

    //DELETE
    public function deleteTask (int $id)
    {
        Task::where('id', $id)->delete();

        return $this->redirectBack("Task deleted!");
    }

    //done task
    public function doneTask ( int $id )
    {
        Task::where('id', $id)->update([
            'status' => "Done"
        ]);

        return redirect()->back();
    }
    
    //redirect back
    public function redirectBack (string $text)
    {
        return redirect()->back()->with('message', $text);
    }

    // date convert
    private function dateconvert (string $value)
    {
        $value = strtotime($value);
        $value = date('y-m-d', $value);
        return $value;
    }
}
