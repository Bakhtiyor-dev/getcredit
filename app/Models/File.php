<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'url',
        'subject_id',
        'imported',
    
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url','subject_title'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/files/'.$this->getKey());
    }

    public function getSubjectTitleAttribute()
    {
        return $this->subject->title;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
