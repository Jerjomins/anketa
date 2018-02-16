@extends('layouts.main')

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title m-b-md">
                Rezultāti, kas pabeiguši testu
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <table class="table table-hover" id="dev-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Testa nosaukums</th>
                                <th>Testa izveidošanas laiks</th>
                                <th>Jautājumi</th>
                                <th>Labot</th>
                                <th>Dzest</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quizzes as $quiz)
                                <tr>
                                    <td>{{ $quiz->id }}</td>
                                    <td>{{ $quiz->name }}</td>
                                    <td>{{ $quiz->created_at ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection