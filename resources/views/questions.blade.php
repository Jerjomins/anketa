@extends('layouts.main')

@section('content')
    <div class="flex-center position-ref" id="question">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title">
                        @{{ currentQuestion.name }}
                    </div>
                </div>
            </div>

            <div class="custom-radio">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4" v-for="(item) in answers">
                        <div class="custom-radio-success">
                            <input
                                    v-on:change="selected = item.id"
                                    :id="item.id"
                                    :checked="item.id == selected"
                                    type="radio"
                                    name="answer"
                            />
                            <label :for="item.id">@{{ item.name }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary pull-right" v-on:click="nextQuestion"
                            :disabled="!selected">
                        Nākamais jautājums
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/quiz.js') }}"></script>
@endsection