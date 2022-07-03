<?php

namespace App\Parsers;

use App\Models\Test;

class TestsParser{

    protected $content;
    protected $collection = [];

    public function __construct($content)
    {
        $this->content = trim($content,"\n\t\0\+\''");
    }

    public function parse()
    {
        $this->serializeToModel(); 
        return $this->collection;
    }

    protected function chunkToQuestions(){
        return explode('++++',$this->content);
    }

    protected function serialize(){
        $arr=[];
        foreach($this->chunkToQuestions() as $question){
            $temp  = explode('====',trim($question));
            $arr[] = array_map(function($val){
                return trim($val);
            },$temp); 
        }
        
        return $arr;
    }

    protected function serializeToModel(){
        foreach($this->serialize() as $a){
            $answers = $this->serializeAnswers($a);
            
            $test = new Test([
                'question'         => $a[0],
                'answers'          => $answers['answers'],
                'correct_answer_id'=> $answers['correct_answer']
            ]);
            
            $this->collection[] = $test;    
        }
    }


    protected function serializeAnswers($array){
        $question = $array[0];
        array_shift($array);
        shuffle($array);
        $serialized = [];
        $correct_answer = '';

        foreach($array as $key => $answer ){
            if(!empty($answer)){
                
                if($answer[0] == '#'){
                    $correct_answer = $key;
                    $answer = trim(ltrim($answer, '#'));
                }
                
                $serialized[] = [
                    'id'  => $key,
                    'body'=> $answer
                ];
            }
        }

//        if($correct_answer === '')
//            throw new \Exception('Invalid structure: correct answer not given on question "'.$question.'"');
//
        return [
            'answers' => $serialized,
            'correct_answer'=>$correct_answer
        ];
    }
    
}
