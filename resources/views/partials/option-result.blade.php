<label class="answer list-group-item list-group-item-action

        @if($test->is_selected and $test->selected_answer == $answer['id'])    
            {{$test->is_correct ? 'bg-success text-white' : 'bg-danger text-white'}}
        @endif
        
        @if(!$test->is_correct and $test->correct_answer_id == $answer['id'])
            text-success fw-bold fst-italic
        @endif ">    

    <input type="radio" 
            class="me-2" 
            {{($test->selected_answer == $answer['id'] and $test->is_selected) ? 'checked' : 'disabled'}} />

    {{$answer['body']}}
</label>