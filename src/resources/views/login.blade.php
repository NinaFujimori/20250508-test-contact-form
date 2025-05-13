@extends('layouts.app')

@section('button')
<a href="/register">register</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/test-1-login.css') }}" />
@endsection

@section('content')

<div class="login">
    <div class="login-title">
        <h2>Login</h2>
    </div>

    <form class="form" action="/login" method="post">
        @csrf
        <div class="form_inner">
            <div>
                <h3 class="form-title">メールアドレス</h3>
            </div>
            <div>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>    

        <div>
            <div>
                <h3 class="form-title">パスワード</h3>
            </div>
            <div>
                <div>
                    <input type="password" name="password" />
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <div class="form__button">
                <button class="form__button-submit"     type="submit">ログイン</button>
            </div>
        </div>
    </form>

</div>

@endsection