<?php

namespace App;

use Illuminate\Support\Str;
class Question extends BaseModel
{
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function getUrlAttribute(){
        return "questions/{$this->slug}";
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getAnswersStylesAttribute(){
        if($this->answers_count > 0)
        {
            if($this->best_answer_id){
                return "has-best-answer";
            }
            return "answered";
        }
        return "unanswered";
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    //Mutator, kyu use karre kyuki meko koi toh event chahye like apne case me title tha and slug is related to slug title: 'hi lraveel' slug 'hi-lraveel' iseleye relate karle	   


//    The syntax is as followed abhi hamne isko call kiya iseleye apne toh apni responsibility hai dalne ki title ko	


}