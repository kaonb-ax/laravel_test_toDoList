@extends('layout')
@section('content')
<div class="brick">
  <h1>----Show----</h1>
  <h1 class="bloc_task" >{{$task_row->title}}:
    @if ($task_row->statut === 0)
    à faire
    @else
    fait!
    @endif
  </h1></br></br>
  <form class="moreSpace" action="/delete" method="POST">
    {{csrf_field()}}
    <button type="submit" name="delete" value="{{$task_row->id}}">supprimer</button>
  </form>

  <form class="MAJ_form moreSpace" action="/edit" method="POST">
    {{csrf_field()}}
    <div>
      <label for="title">nouveau titre</label>
      <input type="text" id="title" name="title" value="{{$task_row->title}}">
      <select type="text" id="categorie" name="categorie">
        @foreach ($categories as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" name="edit" value="{{$task_row->id}}">modifier</button>
  </form>
  <a href="/task" class="buttonLink"><i class="fa fa-arrow-circle-left" aria-hidden="true">  annulé</i>
</a>
</div>
@endsection
