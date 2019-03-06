@extends('layout')

@section('content')
    <h1>{{$project->title}}</h1>
    <h4>{{$project->description}}</h4>
    <a href="/projects/{{$project->id}}/edit">Edit</a>
    @if ($project->tasks->count())
        <div>
            @foreach ($project->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{$task->id}}">
                        @method('PATCH')
                        @csrf
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked':''}}>
                        {{$task->description}}
                    </form>
                </div>
            @endforeach
        </div>
    @endif
    <form method="POST" action="/projects/{{$project->id}}/tasks">
        @csrf
        <div>
            <input type="text" name="description" placeholder="new task" style="{{$errors->has('description') ?'border: red 1px solid;':''}}" value="{{old('description')}}"/>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    @include('errors')
@endsection
