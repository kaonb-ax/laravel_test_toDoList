@extends('layout')
@section('content')
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
      @else
          green
      @endif
      ">
{{-- ==affichage du titre=============== --}}
      @if(!empty($task->title))
        {{$task->title}}
      @else
        aucun titre
      @endif
{{-- ==affichage dela catégorie========= --}}
      @if(!empty($task->category->name))
        prévalence: {{$task->category->name}}
      @else
        prévalence: aucune
      @endif
        <div class="logos">
{{-- ====affichage de lacroix ou du check======= --}}
          <form action="\update" method="POST">
            {{csrf_field()}}


                  @if ($task->statut === 0)
                    <a href="/{{$task->id}}/update">
                      <i class="fa fa-check" aria-hidden="true" name="update"></i>
                  @endif

              </a>
{{-- ====affichage du pen de modif=========== --}}
          </form>
          <a href="/task/{{$task->id}}/show">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </a>
          <form action="/delete" method="POST">
            {{csrf_field()}}
            <a href="/{{$task->id}}/delete">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </form>
        </div>
      </li>
    </div>
    @endforeach
@endsection
