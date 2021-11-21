@extends('layouts.app')
@section('content')

@include('partials.progress')

<div class="container pt-3 pb-5">
  <h4 class="mt-3">Предмет : {{$subject->title}}</h4>
  <h5 class="text-muted font-monospace">Количество тестов: {{$tests->count()}}</h5>
  <hr>
  <div class="row">

    <div class="col-lg-4 order-lg-2 mt-3">
        @include('partials.navigator',compact('tests'))
    </div>

    <div class="col-lg order-lg-1">
      <form action="{{route('check')}}" id="form" method="POST">
        @csrf

        <input type="hidden" name="tests" value="{{$tests}}"> 
        
        @foreach($tests as $test)  
            @include('partials.question-card',compact('test'))      
        @endforeach

        <button type="submit" class="btn btn-primary mt-3 float-end submit">Завершить</button>

      </form>
    </div>
  </div>
 
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="/js/easytimer.js"></script>
<script type="text/javascript" src="/js/testing.js"></script>
<script type="text/javascript" src="/js/timer.js"></script>
@endsection
