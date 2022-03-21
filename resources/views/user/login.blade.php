@extends('layouts.auth')
@section('content')
    <main class="form-signin">

        <form action="{{ route('user.auth') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <img class="mb-1" src="{{ asset('images/logo.svg') }}" alt="" width="72" height="72">

            <h1 class="h3 mb-3 fw-normal">@lang($route . '.H1')</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i> {{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="@lang($route . '.fields.email.placeholder')" required>
                <label for="email">@lang($route . '.fields.email.label')</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="@lang($route . '.fields.password.placeholder')" required>
                <label for="floatingPassword">@lang($route . '.fields.password.label')</label>
            </div>

            <div class="checkbox mb-3">
                <label class="cursor-pointer">
                    <input type="hidden" name="remember_me" value="0">
                    <input type="checkbox" value="1" name="remember_me" checked> @lang($route . '.fields.remember_me.label')
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-secondary" type="submit">@lang($route . '.fields.submit')</button>

            <p class="mt-3 mb-3 text-muted">#06:54</p>

        </form>

    </main>

@endsection
@push('styles')
    <link href="{{ asset('css/user/login.css') }}" rel="stylesheet" />
@endpush

