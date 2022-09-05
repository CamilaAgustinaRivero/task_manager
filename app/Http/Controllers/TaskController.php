<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statusList = Status::all();
        return view('add-task', ['statusList' => $statusList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'task-title' => 'required|string|min:3|max:255',
            'task-description' => 'required|string|min:3|max:255',
        ];

        $messages = [
            // Title
            'task-title.required' => 'El título es requerido.',
            'task-title.min' => 'El título debe contener como mínimo :min caracteres.',
            'task-title.max' => 'El título debe contener como máximo :max caracteres.',
            // Description
            'task-description.required' => 'La descripción es requerida.',
            'task-description.min' => 'La descripción debe contener como mínimo :min caracteres.',
            'task-title.max' => 'La descripción debe contener como máximo :max caracteres.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $task = new Task();
        $task->title = $request['task-title'];
        $task->description = $request['task-description'];
        $task->status_id = $request['task-status'] ? $request['task-status'] : '1';
        $task->save();
        return back()->with('status', 'Tarea agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Does not apply (NTH)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $statusList = Status::all();
        return view('edit-task', ['task' => $task, 'statusList' => $statusList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'task-title' => 'required|string|min:3|max:255',
            'task-description' => 'required|string|min:3|max:255',
        ];

        $messages = [
            // Title
            'task-title.required' => 'El título es requerido.',
            'task-title.min' => 'El título debe contener como mínimo :min caracteres.',
            'task-title.max' => 'El título debe contener como máximo :max caracteres.',
            // Description
            'task-description.required' => 'La descripción es requerida.',
            'task-description.min' => 'La descripción debe contener como mínimo :min caracteres.',
            'task-title.max' => 'La descripción debe contener como máximo :max caracteres.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $task = Task::find($id);
        $task->title = $request['task-title'];
        $task->description = $request['task-description'];
        $task->status_id = $request['task-status'] ? $request['task-status'] : '1';
        $task->save();
        return back()->with('status', 'Tarea actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
