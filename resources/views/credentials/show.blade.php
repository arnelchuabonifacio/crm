@extends('layouts.app')

@section('content')

<div class="box">
    <table class="table is-fullwidth is-bordered">
        <tr>
            <th>Domain</th>
            <td>
                <a href="{{ route('projects.credentials.show',['project'=>$project->id,'credential'=>$credential->url]) }}">{{ $credential->url }}</a>
            </td>
        </tr>
        <tr>
            <th>Username</th>
            <td>{{ $credential->username }}</td>
        </tr>
        <tr>
            <th>Password</th>
            <td>{{ $credential->password }}</td>
        </tr>
        <tr>
            <th>Other Description</th>
            <td>{{ $credential->others }}</td>
        </tr>
    </table>
</div>

@endsection