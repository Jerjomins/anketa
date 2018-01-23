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
                                <th>Vārds</th>
                                <th>Tests</th>
                                <th>Pareizās atbildes</th>
                                <th>Laiks</th>
                                <th>IP</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->quiz->name }}</td>
                                    <td>
                                        <span class="text-success">{{ $user->correct_answers }}</span>
                                        no
                                        <span class="text-danger">{{ $user->questions->count() }}</span>
                                    </td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>{{ str_limit($user->ip, 5, '**') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection