<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component
                    <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>
                    <div class="card-body">
                        <span class="float-right">{{time}}</span>
                        <div v-for="(question,index) in questions">
                            <div v-show="index+1<=questionIndex&&index+1>questionIndex-questionsPerPage&&nb===0">
                            {{index+1}}.{{question.question}}
                            <ol>
                            <li v-for="(choice,index1) in question.answers">
                                <label for="">
                                    <input type="radio"
                                    :value="choice.is_correct==true?true:choice.answer"
                                    :name="index"
                                    v-model="userResponses[index]"
                                    @click="choices(question.id,choice.id) ,postUserChoice()"
                                    > {{choice.answer}}
                                </label>    

                            </li>
                            </ol>
                            </div>
                        </div>
                        <div v-show="nb===0">
                            
                            <button v-if="questionIndex!=this.quizQuestions.length" class="btn btn-success float-right"@click="next()">Next</button>
                            <button v-if="questionIndex!=questionsPerPage" class="btn btn-success "@click="prev()">Prev</button>
                        </div>
                        
                        <div v-show="nb===1">
                            <center>You got{{score()}}/{{questions.length}}</center>
                        </div>
                        
                    </div>
                </div>
                <div class="float-right">
                            <button @click="nopbai()" v-show="nb===0" class="btn btn-danger center">
                                Nộp bài
                            </button>
                        </div>
            </div>
        </div>
    </div>
</template>

<script>
var moment = require('moment');
    export default {
        props:['quizId','quizQuestions','hasQuizPlayed','times','numberOfQuestions'],
        data(){
            return {
                questions:this.quizQuestions,
                questionIndex:this.numberOfQuestions,
                questionsPerPage:this.numberOfQuestions,
                userResponses:Array(this.quizQuestions.length).fill(false),
                currentAnswer:0,
                currentQuestion:0,
                nb:0,
                clock:moment(this.times*60*1000)
            }
        },

        mounted() {
            setInterval(()=>{
                this.clock=moment(this.clock.subtract(1,'seconds'))
            },1000);
        },
        computed:{
            time:function(){
                var minsec=this.clock.format('mm:ss');
                if(minsec=='00:00'){
                    alert('Timeout')
                    window.location.reload();
                }
                return minsec
            }
        },
        methods:{
            nopbai(){
                if(confirm('Bạn có chắc chắn nộp bài không?')){
                event.preventDefault();
                
                }else {event.preventDefault();}
                this.nb++;
            },
            next(){
                if((this.quizQuestions.length-this.questionIndex)>=this.questionsPerPage){
                this.questionIndex=this.questionIndex+this.questionsPerPage;
                }else{
                    this.questionsPerPage=this.questionsPerPage-this.questionsPerPage+(this.quizQuestions.length-this.questionIndex);
                    this.questionIndex=this.questionIndex+(this.quizQuestions.length-this.questionIndex);
                    
                }
            },
            prev(){
                if(this.quizQuestions.length===this.questionIndex){
                this.questionIndex=this.questionIndex-this.questionsPerPage;
                this.questionsPerPage=this.numberOfQuestions;
                }else{
                    this.questionsPerPage=this.numberOfQuestions;
                    this.questionIndex=this.questionIndex-this.questionsPerPage;
                }
            },
            choices(question,answer){
                this.currentAnswer=answer,
                this.currentQuestion=question
            },
            score(){
                return this.userResponses.filter(function(val){
                    return val===true;
                }).length
            },
            postUserChoice(){
               axios.post('/quiz/create',{
                   answerId:this.currentAnswer,
                   questionId:this.currentQuestion,
                   quizId:this.quizId
               }).then((response)=>{
                   console.log(response)
               }).catch((error)=>{
                   alert('Error')
               });
            }
        }
    }
</script>
