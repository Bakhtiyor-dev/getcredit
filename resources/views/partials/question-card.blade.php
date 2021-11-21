<div class="card mt-3 question-card" id="question{{$test->id}}">
                        
    <div class="card-header fw-bold">         
       {{$loop->iteration}}. {{$test->question}}
    </div>
    
    <div class="card-body p-0">
        <div class="list-group border-0 rounded-0">

                @foreach($test->answers as $answer)
                    @isset($result)
                        @include('partials.option-result',compact('answer'))
                    @else
                        @include('partials.option',compact('answer'))
                    @endif    
                @endforeach         
            
        </div>
    </div>

  </div>
