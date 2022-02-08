<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $task = Task::where('user_id',$id)->paginate(10);
        return view('dashboard',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request['content'] != "")
        {
            $task = new Task();
            $task->user_id = auth()->user()->id;
            $task->content = $request['content'];
            $task->save();
            return redirect()->back()->with('message','İşlem Başarılı');
        }
        else
        {
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $id = Auth::id();
        $taskk = Task::where('user_id',$id)->get();
        return view('tasks.todoUpdate',compact('id','taskk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function taskUpdate(Request $request)
    {
        if ($request['content'] != "")
        {
            $task = Task::find($request->id);

            $task->content = $request['content'];
            $task->update();
            return redirect()->back()->with('message','Güncelleme İşlemi Başarılı');
        }
        else
        {
            return redirect()->back();
        }
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
        return redirect()->back();
    }


}
