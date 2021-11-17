@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h4>Чтобы добавить тесты в базу вам необходимо будет отправить текстовый файл с тестами в следующем формате: </h4>
    <div class="card col-lg-7 mx-auto">
        <div class="card-body">
            <form action="">
                @csrf
                <input type="file" name="file" class="form-control">
                <div class="clearfix">
                    <button type="submit" class="btn btn-primary mt-2 float-end">Отправить на модерацию</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection