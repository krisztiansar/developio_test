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
                        <table class="table sortable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" data-defaultsign="AZ">Bejelentő neve</th>
                                <th scope="col" data-defaultsign="AZ">Email cím</th>
                                <th scope="col" data-defaultsign="AZ">Tárgy</th>
                                <th scope="col" data-defaultsign="month">Esedékesség</th>
                                <th scope="col" data-defaultsign="month">Létrehozva</th>
                                <th scope="col">Szöveg</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td>{{ $task->customer->name }}</td>
                                    <td>{{ $task->customer->email }}</td>
                                    <td>{{ $task->subject }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>{{ $task->created_at }}</td>
                                    <td width="30%">{{ $task->content }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td><b style="color: red;">Nincs találat!</b></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Sortable-Bootstrap-Tables-Bootstrap-Sortable/Scripts/bootstrap-sortable.js"></script>
@endsection


