@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')


<div class="inquiry__content">
    <h2 class="inquiry__heading">Register</h2>
</div>
<form class="form" action="/" method="post"> 
@csrf
    <div class="form__group">
        <div class="form__group-inner">
            <div class="form__group--text">
                <span>お名前</span>
                <input type="text">
            </div>
            <div class="form__group--text">
                <span>メールアドレス</span>
                <input type="text">
            </div>
            <div class="form__group--text">
                <span>パスワード</span>
                <input type="text">
            </div>
        </div>
    </div>
</form>

@endsection