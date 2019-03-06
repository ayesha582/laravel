<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create new projects</h1>
    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div>
        <input type="text" name="title" placeholder="project title" style="{{$errors->has('title') ?'border: red 1px solid;':''}}" value="{{old('title')}}"/>
        </div>
        <div>
            <textarea name="description" placeholder="project description" style="{{$errors->has('description') ?'border: red 1px solid;':''}}" value="{{old('description')}}"></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    <div class="notification">
        @include('errors')
    </div>
</body>
</html>
