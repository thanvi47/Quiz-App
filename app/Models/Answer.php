<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Answer extends Model
{
    use HasFactory;
    //table name
    protected $table='answers';
    //primary key
    public $primaryKey='id';

    protected $fillable = [
        'question_id',
        'answer',
        'is_correct',

        ];
    public function question(){
        return $this->belongsTo(Question::class);
}
    public function storeAnswer($data,$a){
        $dataoptions= $data['options'];
//        dd($dataoptions);
        foreach ($dataoptions as $key => $option ){
            $is_correct=false;
            if($key==$data['correct_answer']){
                $is_correct=true;
            }

            $answer = new Answer;
            $answer->question_id=$a;
            $answer->answer=$option;
            $answer->is_correct=$is_correct;
            $answer->save();
        }
    }
//            $answer =Answer::create([
//               'qurstion_id'=>$a,
//
//               'answer'=>$option,
//                'is_correct'=>$is_correct
//            ]);
//
//        }

    use HasFactory;
}
