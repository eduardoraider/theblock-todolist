<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link data-n-head="ssr" rel="icon" type="image/x-icon" href="https://www.theblock.co/favicon.ico">

        <title>The Block - Todo List</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }
            h1 {
                font-family: 'Poppins', sans-serif;
            }
            h2 {
                font-weight: 400;
            }
        </style>
        
    </head>
    <body class="antialiased">
        <div class="container mt-5">
            <h1>The Block - Todo List</h1>

            <div class="mt-4">
                <h2>New Task</h2>
                <form action="{{ route('create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="task" class="form-label">Task:</label>
                        <input type="text" class="form-control" name="task" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </form>
            </div>

            <div class="mt-4">
                <h2>{{ count($todos) > 0 ? 'Tasks' : 'You have no tasks' }}</h2>
                <ul class="list-group">
                    @foreach($todos as $todo)
                        @if($todo->status == false)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $todo->task }}
                                </div>
                                <div class="btn-group" role="group">
                                    <form action="{{ route('delete', ['id' => $todo->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <form action="{{ route('update', ['id' => $todo->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm ml-1" style="margin-left: 5px">Done</button>
                                    </form>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @if(count($todos) > 0)
            @php $hasCompletedTasks = false; @endphp

            @foreach($todos as $todo)
                @if($todo->status == true)
                    @php $hasCompletedTasks = true; break; @endphp
                @endif
            @endforeach

            @if($hasCompletedTasks)
                <div class="mt-4">
                    <h2>Tasks Done</h2>
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            @if($todo->status == true)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="text-secondary">
                                        {{ $todo->task }}
                                    </div>
                                    <div class="btn-group" role="group">
                                        <form action="{{ route('delete', ['id' => $todo->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
