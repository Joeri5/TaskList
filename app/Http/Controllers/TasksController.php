<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $task = auth()->user()->tasks();
        return view('dashboard', compact('task'));
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        if($request->hasFile('image')){
            $destination_path = 'public/images/';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
        }

        $task = new Task();
        $task->description = $request->description;
        $task->image = $request->image;
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect('/dashboard');
    }

    public function edit(Task $task)
    {
        if (auth()->user()->id != $task->user_id) {
            return redirect('/dashboard');
        }

        return view('edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if (isset($_POST['delete'])) {
            $task->delete();
            return redirect('/dashboard');
        } else {
            $this->validate($request, [
                'description' => 'required'
            ]);
            $task->image = $request->image;
            $task->description = $request->description;
            $task->save();
            return redirect('/dashboard');
        }
    }
}
