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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)

                                <tr>
                                    <th scope="row">{{$task->id}}</th>
                                    <th >{{$task->id}}</th>
                                    <th >{{$task->theme}}</th>
                                    <th >{{$task->description}}</th>
                                    <th >{{$task->client}}</th>
                                    <th >{{$task->email}}</th>
                                    <th >{{$task->link_to_the_file}}</th>
                                    <th >{{$task->created_at}}</th>
                                    <th >{{$task->start_task}}</th>
                                    <th >{{$task->end_task}}</th>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
