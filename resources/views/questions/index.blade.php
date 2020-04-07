@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{route('questions.create')}}" class="btn btn-outline-primary">Ask a question</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        All Questions
                    </div>
                    @foreach($questions as $question)
                        <div class="card-body">
                            <div class="media">
                                <div class="d-flex flex-column mr-4 statistics">
                                    <div class="text-center mb-3">
                                        <strong class="d-block">{{$question->votes_count}}</strong>
                                        Votes
                                    </div>


                                    <div class="text-center mb-3 answers {{$question->answers_styles}}">
                                        <strong class="d-block">{{$question->answers_count}}</strong>
                                        Answers
                                    </div>

                                    <div class="text-center">
                                        <strong class="d-block">{{$question->views_count}}</strong>
                                        Views
                                    </div>

                                </div>
                                <div class="media-body">
                                
                                    <div class="d-flex justify-content-between">
                                        <h4><a href="{{$question->url}}">{{$question->title}}</a></h4>
                                        <a href="{{route('questions.edit',$question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                    </div>
                                    <p>
                                        Asked by: <a href="#">{{$question->owner->name}}</a>
                                        <span class="text-muted">{{$question->created_date}}</span>
                                    </p>
                                    <h4>{!!  Str::limit($question->body,250)!!}</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    <div class="card-footer">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection