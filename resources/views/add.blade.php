@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="col-lg-7 mx-auto">

        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <a href="/" class="btn btn-primary mb-2">Назад</a>
       
        <div class="bg-light p-3 mb-3 border">
            <h4>Чтобы добавить тесты в базу вам необходимо будет выбрать предмет и отправить текстовый файл с тестами в следующем формате: </h4>
        </div>
        
        <h6 class="font-monospace text-muted">Пример формата тестов:</h6>
    <code>
    <pre class="bg-light py-2 border" style="height: 250px">
    Парадигма программирования - это?
    ====
    # инструмент грамматического описания фактов, событий, явлений и процессов
    ====
    процесс осуществления неординарного разбора элементов языка
    ====
    совокупность фактов, влияющих на относительную контекстность любого языка программирования
    ====
    любые конструкции стандартных языков программирования
    ++++

    Структурное программирование – это
    ====
    # методология разработки программного обеспечения, в основе которой лежит представление программы в виде иерархической структуры блоков (модулей).
    ====
    парадигма программирования, основанная на концепции вызова процедуры.
    ====
    это парадигма программирования, которая описывает КАКОВО? нечто, а не КАК его создать
    ====
    некий набор правил, который определяет стиль написания программ.
    ++++            

    ...
    </pre>
    </code>
        
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif

                <form id="form" action="{{route('contribute.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="subject" class="fw-bold mb-2">Предмет</label>
                        <select name="subject" id="subject" class="form-select">
                            <option value="" class="text-muted">-- Выбрать предмет --</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->title}}</option>
                            @endforeach
                        </select>    

                    </div>
                                       
                    <label for="file" class="fw-bold mb-2">Файл (txt)</label>
                    <input type="file" id="file" name="file" class="form-control" accept=".txt">
                    
                    <div class="clearfix">
                        <button class="g-recaptcha btn btn-primary mt-2 float-end"
                                data-sitekey="6LcMsD4dAAAAAFXbs2UjGwAKipfxmuTD7Cj0bSd9" 
                                data-callback='onSubmit'>
                            Отправить на модерацию
                        </button>
                    </div>  
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function onSubmit(token) {
            document.getElementById("form").submit();
        }    
    </script>

@if(session()->has('success'))
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        Swal.fire({
            title: '{{session('success')}}',
            icon: 'success',
        });
    </script>
@endif

@endsection