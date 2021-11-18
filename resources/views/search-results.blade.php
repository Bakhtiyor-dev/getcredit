@extends('layouts.app')
@section('content')
<div class="container">
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
            <input class="form-control me-2" name="query" type="search" value="{{$query}}" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Поиск</button>
          </form>

          <hr>

          @foreach($results as $result)
            @php
               $test = $result->scoutMetadata()['_highlightResult'];  
            @endphp
        
            <div class="card mt-3 question-card font-monospace">    
                <div class="card-header fw-bold">         
                    {!!$test['question']['value']!!}
                </div>        
                
                <div class="card-body p-0">
                    <div class="list-group border-0 rounded-0">
                        @foreach($test['answers'] as $answer)
                        <label class="list-group-item list-group-item-action">    
                            {!!$answer['body']['value']!!}
                        </label>    
                        @endforeach
                    </div>
                </div>
            </div>
          @endforeach

          @if($results->count() == 0)
             <p class="text-muted text-center">Ничего не найдено...</p>
          @endif

        </div>
      </div>
</div>
@endsection