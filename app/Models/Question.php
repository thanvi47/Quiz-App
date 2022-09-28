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
    public function answers(){
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
    public function findQuestion($id){
        return Question::findOrfail($id);
    }

    public function updateQuestion($id,$data){

        $question = Question::findOrfail($id);

        $question->question=$data['question'];
        $question->quiz_id=$data['quiz'];
        $question->save();
        return $question;
    }

    public function deleteQuestion($id){
        $question = Question::findOrfail($id);
        $question->delete();
    }

    use HasFactory;
}
