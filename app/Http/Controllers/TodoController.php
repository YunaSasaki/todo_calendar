<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'sort' => ['in:1,2', 'nullable'],
            'position' => ['numeric', 'nullable'],
        ]);

        $sort = $request->get('sort');
        if($sort === null || $sort === '1') {
            $todos = Todo::where('user_id', Auth::id())
                ->select('id', 'title', 'datetime', 'check_flg')
                ->orderBy('datetime','asc')
                ->get();
        }
        if($sort === '2') {
            $todos = Todo::where('user_id', Auth::id())
                ->select('id', 'title', 'datetime', 'check_flg')
                ->orderBy('datetime','desc')
                ->get();
        }

        $todo_count = count(Todo::where('user_id', Auth::id())->get());
        $check_count = count(Todo::where('user_id', Auth::id())->where('check_flg', '1')->get());
        $achievement = round($check_count / $todo_count * 100, 1);

        $previous_position = $request->session()->get('position');
        if($previous_position !== null) {
            $position = $previous_position;
        } else {
            $position = 0;
        }

        return view('index', compact('sort', 'todos', 'achievement', 'position'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function updateTitle(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'position' => ['numeric', 'nullable'],
        ]);

        $todo = Todo::findOrFail($request->id);
        $todo->title = $request->title;
        $todo->save();

        $position = $request->position;

        return redirect()
            ->route('index')
            ->with('position', $position);
    }

    public function updateCheckFlg(Request $request)
    {
        $request->validate([
            'check_flg' => ['in:1', 'nullable'],
            'position' => ['numeric', 'nullable'],
        ]);

        $todo = Todo::findOrFail($request->id);
        $todo->check_flg = $request->check_flg;
        $todo->save();

        $position = $request->position;

        return redirect()
            ->route('index')
            ->with('position', $position);
    }

    public function update(TodoRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
