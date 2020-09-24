@extends('layouts.app')

@section('content')

    <div class="container-fluid" style="margin-bottom: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Hibajegyek szűrése</div>
                    <div class="card-body">
                        {{ Form::open(array('route' => 'search_task', 'method' => 'get')) }}
                        <div class="form-group">
                            <label for="nameInput">Név</label>
                            <input type="text" class="form-control" id="nameInput" placeholder="John Doe" name="name">
                        </div>
                        <button class="btn btn-success" type="submit">Küldés</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Hibajegyek lista</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Bejelentő neve</th>
                                <th scope="col">Email cím</th>
                                <th scope="col">Tárgy</th>
                                <th scope="col">Due date</th>
                                <th scope="col">Szöveg</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $task->task_id }}</th>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->email }}</td>
                                        <td>{{ $task->subject }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td width="50%">{{ $task->content }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><b style="color: red;">Nincs találat!</b></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
