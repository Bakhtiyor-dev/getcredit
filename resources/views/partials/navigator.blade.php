<div class="card navigator">
    <div class="card-body" id="navigator">

        @foreach($tests as $test)
            <a href="#question{{$test->id}}" 
                id="nav{{$test->id}}"
                class="btn border mt-2 
                
                @isset($test->is_correct) 
                    @if($test->is_correct) 
                        btn-success 
                    @else 
                        btn-danger 
                    @endif 
                @endisset">

                {{$loop->iteration}}
            </a>
        @endforeach
        
    </div>

    @if(isset($result))
        <div class="card-footer">
            <a href="/" class="btn btn-primary float-end submit">Вернуться к главной</a>
        </div>
    @else    
        <div class="card-footer">
            <button class="btn btn-primary float-end submit">Завершить</button>
        </div>
    @endif
        
    
</div>