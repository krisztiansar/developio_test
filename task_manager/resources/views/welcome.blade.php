@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hiba bejelentés</div>
                    <div class="card-body">
                        {{ Form::open(array('route' => 'save_task', 'method' => 'post')) }}
                        <div class="form-group">
                            <label for="nameInput">Név</label>
                            <input type="text" class="form-control" id="nameInput" placeholder="John Doe" name="name">
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email cím</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" name="email">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="nameInput">Tárgy</label>
                            <input type="text" class="form-control" id="nameInput" placeholder="Hiba megnevezése" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="contentInput">Hiba leírása</label>
                            <textarea class="form-control" id="contentInput" rows="3" name="task_content"></textarea>
                        </div>
                        <hr>
                        <button class="btn btn-success" type="submit">Küldés</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
