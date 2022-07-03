@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mt-5 col-lg-8 mx-auto">
            <div class="card-header">

                <h2>
                    Пройти тестирование
                </h2>

            </div>

            <div class="card-body">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger col-lg-7 mx-auto">{{$error}}</div>
                    @endforeach
                @endif

                <form action="{{route('assesment')}}"
                      method="POST"
                      class="col-lg mx-auto d-flex flex-column flex-lg-row">

                    @csrf

                    <select name="subject_id" class="form-select" required>
                        <option value="">Выбрать предмет</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->title}}</option>
                        @endforeach

                    </select>

                    <button type="submit" class="btn btn-primary mt-3 mt-lg-0 ms-lg-3">Начать</button>

                </form>
            </div>
        </div>

        <hr>

        <div class="card my-5 col-lg-8 mx-auto">
            <div class="card-header">
                <h2>
                    Поиск по базе тестов
                </h2>
            </div>
            <div class="card-body">
                <form class="d-flex"
                      action="{{route('search')}}"
                      method="GET">
                    <input class="form-control me-2" name="query" type="search" placeholder="Поиск" required>
                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                </form>
            </div>
        </div>


    </div>



@endsection
