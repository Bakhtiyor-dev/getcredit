@extends('layouts.app')
@section('content')
<div class="container pt-3 pb-5">
  
  <div class="col-lg-8 p-4 mb-4 bg-light rounded-3">
    <div class="container-fluid">
      <h1 class="display-6 fw-bold">
          Результат: <span class="ms-3 text-primary">{{$rating}}</span> 
        <hr>
            <span class="text-primary">{{$percent}}%</span>
      </h1>
    </div>
  </div>

  <h4 class="mt-3">Предмет : {{$subject}}</h4>
  <h5 class="text-muted font-monospace">Количество тестов: {{$tests->count()}}</h5>
  <hr>

  <div class="row">

    <div class="col-lg-4 order-lg-2 mt-3">
        <div class="sticky-top">
            @include('partials.navigator',compact('tests'))
        </div>
    </div>

    <div class="col-lg order-lg-1">
        @foreach($tests as $test)
            @include('partials.question-card',compact('test'))      
        @endforeach
      </form>
    </div>

  </div>
 
</div>
@endsection

@section('scripts')
<script>
  window.addEventListener('beforeunload', (event) => {
        event.preventDefault();
        event.returnValue = '';
  });

  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
  }
</script>
@endsection