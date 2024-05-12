@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}

                    </div>
                @endif
                <div class="container pb-2 pt-2">
                    <h1 class="text-center">Создание задачи</h1>
                    <form action="{{ route('home.store') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-3">
                            <label for="number" class="form-label">Тема</label>
                            <input type="text" name="theme" class="form-control" id="theme" >
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Описание</label>
                            <textarea type="text" name="description" class="form-control" id="description" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileLg" class="form-label"></label>
                            <input class="form-control form-control-lg" id="link_to_the_file" name="file" type="file">
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Дата старта</label>
                                <input type="datetime-local" name="start_task" class="form-control" id="start_task" >
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Дата завершения</label>
                                <input type="datetime-local" name="end_task" class="form-control" id="end_task" >
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
