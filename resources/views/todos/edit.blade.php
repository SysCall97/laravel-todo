@extends('todos.layout');

@section('content')
    <div>
        <div class="border-bottom mb-3"><h1 class="pb-3 ">Edit Todo</h1></div>
        <form method="POST" action={{route('todos.update', $todo->id)}}>
            @csrf
            @method('patch')
            <input value={{$todo->title}} name='title' placeholder="Todo title" class="rounded" required />
            <input type="submit" value="Update" class="btn btn-warning btn-sm text-white" />
        </form>
    </div>
@endsection
