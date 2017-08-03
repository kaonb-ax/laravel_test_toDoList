@extends('layout')
@section('content')
  <div id="test_react1"></div>
<div class="brick">
<!-- ==formulaire de nouvelle tache========= -->
  <div class="MAJ_form">
    <h1 class="badass">----To Do List----</h1>
    <form class="create" action="/save" method="POST">
      {{csrf_field()}}
      <div class="blocCreate">
        <input type="text" id="title" name="title">
        <select type="text" id="categorie" name="categorie">
          @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
          @endforeach
        </select>
        <button class="center">créé</button>
      </div>
    </form>
    @foreach ($tasks as $task)
{{-- ===création div de tri============= --}}
      <div class="
      @if ($task->statut === 0)
        toDo
      @else
        done
      @endif
        ">
{{-- ==choix de la couleur============== --}}
      <li class="bloc_task
      @if ($task->statut === 0)
          red
      @else
          green
      @endif
      ">
{{-- ==affichage du titre=============== --}}
      @if(!empty($task->title))
        <p class="task_title">{{$task->title}}</p>
      @else
        aucun titre
      @endif
{{-- ==affichage dela catégorie========= --}}
      @if(!empty($task->category->name | $task->statut === 0))
          @if($task->category->name=== "courant")
            <img src="/img/grade-1.png" class="grades" alt="grade-1"></img>
          @elseif($task->category->name==="attendu")
            <img src="/img/grade-2.png" class="grades"alt="grade-2"></img>
          @elseif($task->category->name==="urgent")
            <img src="/img/grade-3.png" class="grades" alt="grade-3"></img>
          @else
            <img src="/img/grade-4.png" class="grades" alt="grade-4"></img>
          @endif
      @else
        terminé
      @endif
        <div class="logos">
        <a href="/task/{{$task->id}}/show">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </a>
          <form action="/delete" method="POST">
            {{csrf_field()}}
            <a href="/{{$task->id}}/delete">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </form>
{{-- ====affichage de lacroix ou du check======= --}}
          <form action="\update" method="POST">
            {{csrf_field()}}
                  @if ($task->statut === 0)
                    <a href="/{{$task->id}}/update">
                      <i class="fa fa-check" aria-hidden="true" name="update"></i>
                  @endif
              </a>
          </form>
{{-- ====affichage du pen de modif=========== --}}
        </div>
      </li>
    </div>
    @endforeach
    <div class="container">
      <button type="button" id="all">tous</button>
      <button type="button" id="current_only">en cours seulement</button>
      <button type="button" id="finish_only">terminer seulement</button>
    </div>
@endsection
