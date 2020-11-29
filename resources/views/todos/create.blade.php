@extends('todos.layout');

@section('content')
    <div>
        <div class="border-bottom mb-3"><h1 class="pb-3 ">Create New Todo</h1></div>
    <form method="POST" action="/todos/store">
        @csrf
        <input name="title" placeholder="Todo title" class="rounded" required />
        <input type="submit" value="Create" class="btn btn-success btn-sm" />
    </form>
    </div>
@endsection
