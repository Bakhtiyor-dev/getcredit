<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Laravel\Scout\Searchable;

class Test extends Model
{
    use HasTranslations;
    use Searchable;
   
    public $translatable = [];   

    protected $guarded = [];

    protected $casts = [
        'answers' => 'array'
    ];

    protected $appends = ['resource_url','subject_title'];
    

    protected static function booted(){
       
        static::retrieved(function($test){
            return $test->randomizeAnswers();
        });
    
    }
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected function randomizeAnswers(){
        $answers = $this->answers;
        shuffle($answers);
        $this->attributes['answers'] = json_encode($answers);
    }

    public function check($completedTest){
        $this->attributes['correct_answer'] = $this->correct_answer_id;
        
        $this->attributes['is_selected'] = array_key_exists($this->id, $completedTest);

        if($this->is_selected){
            $this->attributes['selected_answer'] = $completedTest[$this->id];
            $this->attributes['is_correct'] = ($this->selected_answer == $this->correct_answer_id);
        }
    }

    public function getResourceUrlAttribute(){
        return url('/admin/tests/'.$this->getKey());
    }

    public function getSubjectTitleAttribute(){
        return $this->subject->title;
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
    public function scopeAvailable($query){
        return $query->where('status',1);
    }

    public function searchableAs()
    {
        return 'tests_index';
    }
}
