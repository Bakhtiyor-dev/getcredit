<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/subjects/'.$this->getKey());
    }

    public function tests(){
        return $this->hasMany(Test::class);
    }

    public function getTestsCountAttribute(){
        return $this->tests->count();
    }

    public function scopeAvailable($query){
        return $query->where('status',1);
    }
}   
