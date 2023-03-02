@extends('layout.app')
@section('content')

<form action="{{ route('todo.save') }}" method="POST">
@csrf
    <input name="title" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
    <button type="submit">Submit</button>
</form>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Task</th>
        <th scope="col">status</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $key => $task)
        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $task->title }}</td>
            <td>{{ $task->done }}</td>
            <td><a href="{{ route('todo.delete',$task->id) }}" class="btn btn danger">delete</a>
              <a href="{{ route('todo.update',$task->id) }}" class="btn btn success">update</a>
            
            </td>
          </tr>
        @endforeach
      
   
      </tr>
    </tbody>
  </table>


@endsection