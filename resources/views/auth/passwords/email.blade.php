@extends('layouts.app')
@section('title', @ucfirst(__('auth.passwordReset')))

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="row d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3">
    @csrf
    <div class="col-12 col-md-7 pt-5">
        <div class="card">
            <div class="card-header">{{ __('auth.passwordReset') }}</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">@ucfirst(__('auth.email'))</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('auth.passwordLink') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
