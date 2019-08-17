@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile of ').Auth::user()->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('updateProfile')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="profile_picture" class="col-md-4 col-form-label text-md-right">{{ __('profile_picture') }}</label>

                                <div class="col-md-6">
                                    <input id="resume" type="file" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture" value="{{ old('profile_picture') }}" required autocomplete="profile_picture">

                                    @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('skills') }}</label>

                                <div class="col-md-6">
                                    <textarea id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" required autocomplete="skills" autofocus>

                                    </textarea>

                                    @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('resume') }}</label>

                                <div class="col-md-6">
                                    <input id="resume" type="file" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" required autocomplete="resume">

                                    @error('resume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
