@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')

<div>
    <div>
        <h2>Confirm</h2>
    </div>
    <form action="/contacts" method="post">
    @csrf
        <div>
            <table>
                <tr>
                    <th>お名前</th>
                    <td>
                        <input type="text" name="last_name" value="{{ $contact['last_name'] }}"/>
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th>性別</th>   
                    <td>
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>
                        <input type="tel" name="tel_first" value="{{ $contact['tel_first'] }}" readonly/>
                        <input type="tel" name="tel_second" value="{{ $contact['tel_second'] }}" readonly/>
                        <input type="tel" name="tel_third" value="{{ $contact['tel_third'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>
                        <input type="text" name="category_name" value="{{ $contact['category_name'] }}" readonly/>
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>
                        <input type="text" name="detail" value="{{$contact['detail'] }}" readonly/>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <button type="submit">送信</button>
            <a href="/">修正</a>
        </div>
    </form>
</div>

@endsection