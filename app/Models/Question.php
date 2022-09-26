<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{protected $fillable = [
    'question',
    'quiz_id',
    ];
    private $limit =10;
    private $order ='desc';
    public function answer(){
        return $this->hasMany(Answer::class);
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function storeQuestion($data){
        $data['quiz_id']=$data['quiz'];
        return Question::create($data);

    }
    public function getQuestion(){
        return Question::orderBy('Created_at',$this->order)->with('quiz')->paginate($this->limit);
    }
    public function getQuestionById($id){
        return Question::findOrfail($id);
    }

//    public function updateQuiz($data,$id){
//        return Question::find($id)->update($data);
//    }
//    public function deleteQuiz($data,$id){
//        return Question::find($id)->delete();
//    }
    use HasFactory;
}
