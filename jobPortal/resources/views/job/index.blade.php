@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Salary</th>
                    @if($user['user_type']==2)
                        <th>Action</th>
                    @endif
                </thead>

                <tbody>
                @if( !empty($jobs) )
                    @foreach($jobs as $job)
                        <td>{{ $job->id  }}</td>
                        <td>{{ 'google' }}</td>
                        <td>{{  $job->job_title }}</td>
                        <td>{{  $job->job_description }}</td>
                        <td>{{  number_format($job->salary,2) }}</td>
                        @if($user['user_type']==2)
                        <td ><button class="btn btn-success">Apply</button></td>
                        @endif
                    @endforeach
                @else
                    NO DATA FOUND!<a href="{{route('job')}}">Add job here</a>
                @endif

                </tbody>

            </table>
        </div>
    </div>

@endsection
