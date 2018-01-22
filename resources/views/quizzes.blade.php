@extends('layouts.main')

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title m-b-md">
                Sveicināts testa uzdevumā
            </div>

            <form method="post" action="{{ route('quiz.start') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="yourName">Ievadi savu vārdu</label>
                    <input type="text" name="name" id="yourName" value="{{ old('name') }}" class="form-control"
                           placeholder="Ievadi savu vārdu">
                </div>
                <div class="form-group">
                    <label for="selectQuestion">Izvēlies testu</label>
                    <select class="form-control" name="question" id="selectQuestion">
                        <option value="">Izvēlies testu</option>
                        @foreach($quizzes as $question)
                            <option value="{{ $question->id }}">{{ $question->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Sākt testu</button>
            </form>
        </div>
    </div>
@endsection