<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online ExaminAtion</div>

                    <div class="card-body">
                        <div v-for="(question,index) in questions">


                            {{ question.question }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props: ['quizId', 'quizQuestions', 'hasQuizPlayed', 'times'],
    data() {
        return {
            questions: this.quizQuestions
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
