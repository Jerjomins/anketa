@extends('layouts.main')

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title m-b-md">
                Paldies, {{ $user->name }}
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    Tu atbildēji pareizi uz
                    <span class="text-success">{{ $user->correct_answers }}</span>
                    no
                    <span class="text-danger">{{ $user->questions->count() }}</span>
                    jautājumiem.
                </div>
            </div>
        </div>
    </div>
@endsection