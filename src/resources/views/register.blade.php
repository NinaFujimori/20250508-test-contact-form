@extends('layouts.app')

@section('button')
<a href="/login">login</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/test-1-register.css') }}" />
@endsection

@section('content')


<div class="inquiry__content">
    <h2 class="inquiry__heading">Register</h2>
</div>
<form class="form" action="/register" method="post"> 
@csrf
    <div class="form__group">
        <div class="form__group-inner">
            <div class="form__group--text">
                <span>お名前</span>
                <input type="text" name="name" placeholder="例：山田 太郎" value="{{ old('name') }}" />
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group--text">
                <span>メールアドレス</span>
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group--text">
                <span>パスワード</span>
                <input type="password" name="password" placeholder="例：coachtechno6" />
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <button type="submit">
                登録
            </button>
        </div>
    </div>
</form>

@endsection