<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Category;

class TaskController extends Controller
{
    //redirection==============================
    public function index(){
      $tasks = Task::all();
      $categories = Category::all();
      return view('indexView', ['tasks' => $tasks, 'categories' => $categories]);
    }
    public function show($id){
      $categories = Category::all();
      $task = Task::where('id', $id)->first();
      return view('showView', ['task_row' => $task, 'categories' => $categories]);
    }
    //redirection fin ==========================

    public function save(Request $request){
      $this->validate($request, [
        'title'=>'required|max:80'
      ]);
      $task = new Task();
      $task->title = $request->input('title');
      $task->category_id = $request->input('categorie');
      $task->statut = 0;
      $task->save();
      return redirect('/task');
    }
    public function update(Request $request, $id){
        $task = Task::find($id);
        if (intval($task->statut) === 0) {
          $task->statut = 1;
        }else{
          $task->statut = 0;
        }
        $task->save();
        return redirect('/task');
    }
    public function edit(Request $request){
      $id = $request->input('edit');
      $this->validate($request, [
        'title'=>'required|max:20'
      ]);
      $task = Task::find($id);
      $task->title = $request->input('title');
      $task->category_id = $request->input('categorie');
      $task->save();
      return redirect('/task');
    }
    public function delete(Request $request){
      $id = $request->input('delete');
      $task = Task::where('id', $id)->delete();
      return redirect('/task');
    }
    public function fastDelete(Request $request, $id){
      $task = Task::where('id', $id)->delete();
      return redirect('/task');
    }

}
