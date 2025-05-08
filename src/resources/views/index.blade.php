@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

	
<!--問い合わせ入力の画面-->

@section('content')

<div class="inquiry">
    <div class="inquiry__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
        @csrf
<!--名前-->
        <div>
            <div class="form__group-title">
                <span>お名前</span>
                <span>※</span>
            </div>
            <div>
                <input type="text" name="last_name" placeholder="例）山田" value="{{old('last_name')}}">
                <input type="text" name="first_name" placeholder="例）太郎" value="{{old('first_name')}}">
            </div>
<!--エラーは姓名別なのか？それともどっちもできるのがあるのか？-->
            <div class="form__error">
              @error('name')
              {{ $message }}
              @enderror
            </div>
        
<!--性別-->
            <div class="form__group-title">
                <span>性別</span>
                <span>※</span>
            </div>
            <div>
                <input type="radio" name="gender" value="男性">男性
                <input type="radio" name="gender" value="女性">女性
                <input type="radio" name="gender" value="その他">その他
            </div>
            <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
            </div>

<!--メールアドレス-->
            <div class="form__group-title">
                <span>メールアドレス</span>
                <span>※</span>
            </div>
            <div>
                <input type="email" name="email" placeholder="test@example.com" value="{{old('email')}}">
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>

<!--電話番号-->
            <div class="form__group-title">
                <span>電話番号</span>
                <span>※</span>
            </div>
            <div>
                <input type="tel" name="tel" placeholder="080" value="{{old('tel-first')}}">
                <input type="tel" name="tel" placeholder="1234" value="{{old('tel-second')}}">
                <input type="tel" name="tel" placeholder="5678" value="{{old('tel-third')}}">
            </div>
            <div class="form__error">
                @error('tel')
                {{ $message }}
                @enderror
            </div>
<!--住所-->
            <div class="form__group-title">
                <span>住所</span>
                <span>※</span>
            </div>
            <div>
                <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{old('adress')}}">
            </div>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>

<!--建物-->
            <div class="form__group-title">
                <span>建物</span>
                <span>※</span>
            </div>
            <div>
                <input type="text" name="building" placeholder="例）千駄ヶ谷マンション101" value="{{old('building')}}">
            </div>
            <div class="form__error">
              @error('building')
              {{ $message }}
              @enderror
            </div>
<!--お問い合わせの種類-->
            <div class="form__group-title">
                <span>お問い合わせの種類</span>
                <span>※</span>
            </div>
            <div>
                <select name="category_id" >
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__error">
              @error('category')
              {{ $message }}
              @enderror
            </div>
<!--お問い合わせ内容-->
            <div class="form__group-title">
                <span>お問い合わせ内容</span>
                <span>※</span>
            </div>
            <div>
                <input type="text" name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{old('detail')}}">
            </div>
            <div class="form__error">
              @error('detail')
              {{ $message }}
              @enderror
            </div>
        </div>
        <div>
            <button type="submit">確認画面</button>
        </div>
    </form>
</div>

@endsection