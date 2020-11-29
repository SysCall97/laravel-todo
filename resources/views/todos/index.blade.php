@extends('todos.layout')

@section('content')
    <div>
        <div class="border-bottom mb-3 d-flex align-items-center justify-content-between">
            <h1 class="pb-3 ">All Todos</h1>
            <a href={{route("todos.create")}} class="ml-5">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill mb-3" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
              </svg>
            </a>
        </div>

        @foreach ($todos as $todo)
            <div class="d-flex justify-content-between mw-100">
                @if ($todo->completed)
                    <div><h4 class="text-secondary"> <del>{{$todo->title}}</del> </h4></div>
                @else
                    <div><h4> {{$todo->title}} </h4></div>
                @endif

                {{-- Edit  --}}
                <div>
                    <a href={{route("todos.edit", $todo->id)}}>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="#ffc107" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                </div>

                {{-- Completed --}}
                <div>
                    <span style="cursor: pointer" onclick="getElementById('form-completed-{{$todo->id}}').submit()">
                        @if ($todo->completed)
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                            </svg>
                        @else
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="#6c757d" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                            </svg>
                        @endif
                    </span>

                    <form class="d-hidden" id="{{'form-completed-'.$todo->id}}" method="POST" action="{{route('todos.completed', $todo->id)}}">
                        @csrf
                        @method('patch')
                    </form>
                </div>

                {{-- Delete  --}}
                <div>
                    <span style="cursor: pointer" onclick="getElementById('form-delete-{{$todo->id}}').submit()">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </span>
                    <form class="d-hidden" id="{{'form-delete-'.$todo->id}}" method="POST" action="{{route('todos.delete', $todo->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </div>

            </div>
        @endforeach

    </div>
@endsection
