<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online ExaminAtion
                    <span class="float-end">{{questionIndex}}/{{questions.length}}</span></div>

                    <div class="card-body">
                        <span> {{time}}</span>
                        <div v-for="(question,index) in questions">
                        <div v-show="index==questionIndex">

                            {{ question.question }}
                            <ol>
                            <li v-for="choice in question.answers">
                                <label>

                                <input type="radio"
                                :value="choice.is_correct==true?true:choice.answer" :name="index"
                                       v-model="userResponses[index]"
                                       @click="choices(question.id,choice.id)"

                                >

                                    {{ choice.answer }}
                                </label>
                            </li>
                            </ol>

                        </div>
                        </div>
                        <div v-show="questionIndex!=quizQuestions.length && questionIndex >=0">

                            <button v-show="questionIndex!=quizQuestions.length && questionIndex >0" class="btn btn-primary float-start"@click="prev()">Prev</button>
                            <button class="btn btn-primary float-end"@click="next(); postuserChoice() " >Next</button>
                        </div>
                        <div v-show="questionIndex==quizQuestions.length ">
<!--                            <button class="btn btn-primary float-start"@click="prev()">Prev</button>-->
<!--                            <button class="btn btn-primary float-end"@click="next()">Next</button>-->

                            <center>
                                You got:{{score()}}/{{questions.length}}
                            </center>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {

    props: ['quizid', 'quizQuestions', 'hasQuizPlayed', 'times'],
    data() {
        return {
            questions: this.quizQuestions,
            questionIndex: 0,
            userResponses: Array(this.quizQuestions.length).fill(false),
            currentQuestion:0,
            currentAnswer:0,
            clock:moment(this.time*60*1000),
        }
    },
    mounted() {
     setInterval(()=>{
         this.clock=moment(this.clock.subtract(1,'seconds'))
     },1000);
    },
    computed:{
        time:function() {
            var minsec=this.clock.format('mm:ss');
            if(minsec=='00:00'){
                alert('Time is up');
                window.location.reload();
            }
            return minsec;
        }
    },
    methods:{
        next(){
            this.questionIndex++
        },
        prev(){
            this.questionIndex--
        },
        choices(question,answer){
            this.currentAnswer=answer,
            this.currentQuestion=question
        },
        score(){
            return this.userResponses.filter((val)=>{
                return val===true
            }).length


        },
        postuserChoice(){

            axios.post('/examquiz/store',{
                answer_id:this.currentAnswer,
                question_id:this.currentQuestion,
                quiz_id:this.quizid,

            }).then((response)=>{
                console.log(response.data)
            }).catch((error)=>{
                alert("Error!", error.data)
            });

        }

    }
}
</script>
