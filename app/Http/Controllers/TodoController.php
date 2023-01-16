<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $todos = Todo::all();
        return view('ToDos.todos-index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create(): Factory|View|Application
    {
        return view('todo-edit', ['edit' => 0, 'todo' => new Todo()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $title = $request->title;
        $description = $request->description;

        if ($title && $description) {
            Todo::query()->create([
                'title' => $title,
                'description' => $description,
            ]);
            return redirect()->route('todo-index');
        }
        return redirect()->route('todo-form');
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Application|Factory|View
     */
    public function show(Todo $todo):Application|Factory|View
    {
        return view('todo-show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Todo $todo
     * @return Application|Factory|View
     */
    public function edit(Todo $todo):Application|Factory|View
    {
        return view('todo-edit', ['edit' => 1, 'todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $todo = ToDo::query()->find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();
        return redirect()->route('todo-index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
       Todo::query()->where('id', $id)->delete();
        return redirect()->route('todo-index');
    }
}
