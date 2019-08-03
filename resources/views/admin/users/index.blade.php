@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {!! session()->get('success')!!}
                            </div>
                        @endif
                        <form method="GET" action="/admin/users" class="form">
                            <div class="form-group row float-right">
                                <input type="text" name="query" class="form-control col-md-8"/>
                                <button class="ml-2 btn btn-primary">Search</input>
                            </div>
                            @csrf
                        </form>
                        <table class="table">
                            <thead>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Course</th>
                                <th>Facebook Profile</th>
                                <th>Occupation</th>
                                <th>Enrolled?</th>
                                <th>Medcert Status</th>
                                <th>Nickname</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td> {{ $user->first_name}} </td>
                                        <td> {{ $user->last_name}} </td>
                                        <td> {{ $user->course}} </td>
                                        <td> <a href="{{ $user->facebook_profile }}" target="_blank">View</a></td>
                                        <td> {{ $user->occupation }}</td>
                                        <td> {{ $user->is_enrolled ? "Yes" : "No" }}</td>
                                        <td> {{ $user->med_cert_status }}</td>
                                        <th> {{ $user->nick_name }} </th>
                                        <td>
                                            <a class="btn btn-success"href="/admin/user/approve/{{ $user->id }}">Approve</a>
                                            <a class="btn btn-danger" href="/admin/user/reject/{{$user->id}}">Reject</a>
                                            <a class="btn btn-primary" href="/user/medcert/{{ $user->id }}">View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $users->appends(['query' => $query])->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
