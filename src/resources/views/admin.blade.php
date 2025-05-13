<style>
    svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
</style>

@extends('layouts.app')

@section('button')
<form action="/logout" method="post">
    @csrf
    <button type="submit">logout</button>
</form>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap 5 JavaScript（モーダル動作用） -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')

<div>
    <div>
        <h2>Admin</h2>
    </div>
    <div class="search">
        <form action="/admin/search" method="get">
            <div>
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                <select name="gender" id="">
                    <option value="" selected disabled>性別</option>
                    <option value="">全て</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                </select>
                <select name="category_id" id="">
                    <option value="" selected disabled>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category  ['content'] }}</option>
                    @endforeach
                </select>
                <input type="date" name="date">
            </div>
            <div>
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div>
                <button type="reset">リセット</button>
            </div>
        </form>
    </div>

    <div>
        <div>
            <p>エクスポート</p>
        </div>
        <div class="page">
        {{ $contacts->links() }}
        </div>
    </div>

    <div>
        <table>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr> 
            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact -> first_name}}{{$contact -> last_name}}</td>
                <td>{{$contact -> gender}}</td>
                <td>{{$contact -> email}}</td>
                <td>{{$contact -> category -> content}}</td>
                <td>
                 <button type="button" class="btn btn-primary btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#contactModal"
                  data-id="{{ $contact->id }}"
                  data-last_name="{{ $contact->last_name }}"
                  data-first_name="{{ $contact->first_name }}"
                  data-gender="{{ $contact->gender }}"
                  data-email="{{ $contact->email }}"
                  data-tel_first="{{ $contact->tel_first }}"
                  data-tel_second="{{ $contact->tel_second }}"
                  data-tel_third="{{ $contact->tel_third }}"
                  data-address="{{ $contact->address }}"
                  data-building="{{ $contact->building }}"
                  data-category_name="{{ $contact->category->content }}"
                  data-detail="{{ $contact->detail }}">
                  詳細
                 </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- 詳細モーダル -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- 大きめモーダル -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" id="modal-last-name" readonly />
                    <input type="text" id="modal-first-name" readonly />
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td><input type="text" id="modal-gender" readonly /></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><input type="email" id="modal-email" readonly /></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="tel" id="modal-tel-first" readonly />
                    <input type="tel" id="modal-tel-second" readonly />
                    <input type="tel" id="modal-tel-third" readonly />
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td><input type="text" id="modal-address" readonly /></td>
            </tr>
            <tr>
                <th>建物名</th>
                <td><input type="text" id="modal-building" readonly /></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><input type="text" id="modal-category-name" readonly /></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td><input type="text" id="modal-detail" readonly /></td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <form method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('contactModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // 各data-*属性から値取得
        document.getElementById('modal-last-name').value = button.getAttribute('data-last_name');
        document.getElementById('modal-first-name').value = button.getAttribute('data-first_name');
        document.getElementById('modal-gender').value = button.getAttribute('data-gender');
        document.getElementById('modal-email').value = button.getAttribute('data-email');
        document.getElementById('modal-tel-first').value = button.getAttribute('data-tel_first');
        document.getElementById('modal-tel-second').value = button.getAttribute('data-tel_second');
        document.getElementById('modal-tel-third').value = button.getAttribute('data-tel_third');
        document.getElementById('modal-address').value = button.getAttribute('data-address');
        document.getElementById('modal-building').value = button.getAttribute('data-building');
        document.getElementById('modal-category-name').value = button.getAttribute('data-category_name');
        document.getElementById('modal-detail').value = button.getAttribute('data-detail');

        // 削除フォームのactionをセット（例えば /contacts/3）
        const contactId = button.getAttribute('data-id');
        const deleteForm = document.getElementById('delete-form');
        deleteForm.action = `/contacts/${contactId}`;
    });
});
</script>