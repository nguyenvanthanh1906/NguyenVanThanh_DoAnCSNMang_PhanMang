@extends('layouts.app')

@section('content')

<quiz-component 
v-bind:times="{{$quiz->minutes}}"
v-bind:quiz-id="{{$quiz->id}}"
v-bind:quiz-questions="{{$quizQuestions}}"
v-bind:has-quiz-played="{{$authUserHasPlayedQuiz}}"
v-bind:number-of-questions="{{$quiz->paging}}">
</quiz-component>





@endsection