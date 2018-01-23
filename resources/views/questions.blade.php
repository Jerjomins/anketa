@extends('layouts.main')

@section('content')
    <div id="question" v-cloak>
        <div class="loader-mask" v-if="loading">
            <img src="{{ asset('images/loader.gif') }}" class="img-responsive loader-wrapper" />
        </div>
        <div class="alert alert-danger" v-if="showError">
            <ul>
                <li v-for="error in errors">@{{ error }}</li>
            </ul>
        </div>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" :aria-valuenow="progressBar"
                                 aria-valuemin="0" aria-valuemax="100" :style="{ width: progressBar + '%' }">
                                @{{ progressBar }}% pabeigts
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            @{{ currentQuestion.name }}
                        </div>
                    </div>
                </div>

                <div class="custom-radio">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4" v-for="item in answers">
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
                        <button type="submit" class="btn btn-primary next-question pull-right" v-on:click="nextQuestion"
                                :disabled="!selected">
                            Nākamais jautājums
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/quiz.js') }}"></script>
@endsection