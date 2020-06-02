@extends('layouts.app')

@section('content')
    <h5>2. Write a SQL query to list all dates in which a user has at least 3 false status on a specific permission check. Each row must contain user_id, permission_id, date, the number of false status.
    </h5>
    <table class="table"> 
        <tr>
            <td>User ID</td>
            <td>Permission ID</td>
            <td>Date</td>
            <td>Number of False</td>
        </tr>
        @foreach($badUsers as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->permission_id }}</td>
                <td>{{ $user->action_at }}</td>
                <td>{{ $user->number_of_false_status }}</td>
            </tr>
        @endforeach
    </table>

    <hr/>
    <h5>3. Write a SQL query to list the full name (first_name + last_name) of users who do not have any false status in permission check</h5>
    <table class="table"> 
        <tr>
            <td>Full Name</td>
            <td>Email</td>
        </tr>
        @foreach($goodUsers as $user)
            <tr>
                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </table>
@endsection