@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    <div class="container pb-2 pt-2">
                        <h1>Главная страница</h1>
                        <div class="d-flex justify-content-end">
                            {{ $tasks->links() }}
                        </div>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Тема</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Имя клиента</th>
                                <th scope="col">Почта клиента</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Дата старта</th>
                                <th scope="col">Дата завершения</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <th scope="row">{{$task->id}}</th>
                                    <th >
                                        <div class="form-check">
                                            <form action="{{ route('main.update', $task->id ) }}" method="post" id="form{{$task->id}}">
                                                @csrf
                                                @method('patch')
                                            <input class="form-check-input" name="status" type="checkbox" {{ $task->status == 1 ? 'checked' : ''}} value="1" id="status{{ $task->status}}">
                                            <label class="form-check-label" for="status{{ $task->status}}">
                                                {{ $task->status == 1 ? 'Выполнен' : 'Невыполнен'}}
                                            </label>
                                            </form>
                                        </div>
                                    </th>
                                    <th >{{$task->theme}}</th>
                                    <th >{{$task->description}}</th>
                                    <th >{{$task->client}}</th>
                                    <th >{{$task->email}}</th>
                                    <th >
                                        @if($task->link_to_the_file)
                                            <a href="{{$task->link_to_the_file}}" download>скачать файл</a>
                                        @endif
                                    </th>
                                    <th >{{$task->created_at}}</th>
                                    <th >{{$task->start_task}}</th>
                                    <th >{{$task->end_task}}</th>
                                    <th><button type="submit" class="btn btn-primary" form="form{{$task->id}}">Сохранить</button></th>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
