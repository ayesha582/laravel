@extends('layout')

@section('content')
    <h1>Edit project</h1>
    <form method="POST" action="/projects/{{$project->id}}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div>
        <input type="text" name="title" placeholder="project title" value={{$project->title}}/>
        </div>
        <div>
            <textarea name="description" placeholder="project description">{{$project->description}}</textarea>
        </div>
        <div>
            <button type="submit">Update Project</button>
        </div>
    </form>
    <form method="POST" action="/projects/{{$project->id}}">
        {{method_field('DELETE')}}
        {{ csrf_field() }}

        <div>
            <button type="submit">Delete Project</button>
        </div>
    </form>
    @include('errors')
@endsection
