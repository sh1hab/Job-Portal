@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ( Auth::user()->user_type == 2 )
            <div class="float-left">
                <a class="btn" href="{{route('job')}}">Add a new job</a>
            </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Salary</th>
                    @if ( Auth::user()->user_type== 1 )
                        <th>Action</th>
                    @endif
                </thead>

                <tbody>
                <form action="{{ route('job.apply') }}" method="post">
                    @csrf
                @if( !empty($jobs) && sizeof($jobs) )
                    @foreach($jobs as $job)
                        <td>{{ $job->id  }}</td>
                        <td>{{ $job->company ->business_name }}</td>
                        <td>{{ $job->job_title }}</td>
                        <td>{{ $job->job_description }}</td>
                        <td>{{ number_format($job->salary,2) }}</td>
                            @if ( Auth::user()->user_type== 1 )
                            <td>
                                <input type="hidden" value="{{ $job->id }}" name="job_id">
                                <input type="hidden" value="{{ $job->company->id }}" name="company_id">
                                <input type="submit" class="btn btn-success" value="apply">
                            </td>
                            @endif
                    @endforeach
                @else
                    <td colspan="">NO DATA FOUND!</td>
                @endif
                </form>
                </tbody>

            </table>

        </div>
    </div>

@endsection
