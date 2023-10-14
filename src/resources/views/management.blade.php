<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/management.css') }}" />
  
</head>

<body>

  <main>
    <div class="management__content">
      <div class="management__heading">
        <h2>管理システム</h2>
      </div>


<form class="search-form">

  <div class="search-form__name">
   <h2>お名前</h2>
  </div>
  <div class="search-form__item">
    <input class="search-form__item-input" type="text" name="name" value="{{ $request['name']}}"/>
  </div>


  <div class="search-form__gender">
   <h2>性別</h2>
  </div>
  <div class="search-form__radio">
    <label><input type="radio" name="gender" value="" {{$request['gender'] == '' ? 'checked' : '' }}/>全て</label>
    <label><input type="radio" name="gender" value="男性" {{$request['gender'] == '男性' ? 'checked' : '' }}/>男性 </label>
    <label><input type="radio" name="gender" value="女性" {{$request['gender'] == '女性' ? 'checked' : '' }}/>女性 </label>
  </div>


<div class="spacer"></div>


  <div class="search-form__date">
    <h2>登録日</h2>
  </div>

  <div class="search-form__item">
    <input class="search-form__item-input" type="date" name="from" value="{{ $request['from']}}"/>
  </div>
<div>　　ー　　</div>
  <div class="search-form__item">
    <input class="search-form__item-input" type="date" name="until" value="{{ $request['until']}}"/>
  </div>

<div class="spacer"></div>

  <div class="search-form__email">
    <h2>メールアドレス</h2>
  </div>
  <div class="search-form__item">
    <input class="search-form__item-input" type="text" name="email" value="{{ $request['email']}}"/>
  </div>

<div class="spacer"></div>

  <div class="search-form__button">
    <button class="search-form__button-submit" type="submit">検索</button>
  </div>

<div class="spacer"></div>

  <div class="search-form__reset">
    <a href="{{ route('/management') }}">リセット</a>
  </div>

</form>

{{ $contacts->links() }}

  <div class="management-table">
    <table class="management-table__inner">
      <tr class="management-table__row">
          <th class="management-table__id">ID</th>
          <th class="management-table__name">お名前</th> 
          <th class="management-table__gender">性別</th> 
          <th class="management-table__email">メールアドレス</th> 
          <th class="management-table__content">ご意見</th> 
          <th class="management-table__delete"></th> 
      </tr>

@foreach ($contacts as $contact)
      <tr class="management-table__row">
        <div class="management-table__item">
          <form class="management-form">
            <td class="management-form__item">
              <p class="management-form__item-input">{{ $contact['id'] }}</p>
            </td>

            <td class="management-form__item">
              <p class="management-form__item-input">{{ $contact['fullname'] }}</p>
            </td>

            <td class="management-form__item">
              <p class="management-form__item-input">{{ $contact['gender'] }}</p>
            </td>

            <td class="management-form__item">
              <p class="management-form__item-input">{{ $contact['email'] }}</p>
            </td>

            <td class="management-form__item">
              <div class="balloonoya">{{ Str::limit( $contact['content'] , 50) }}
                 @if (mb_strlen($contact['content'])>25.1)
                 <span class="balloon">{{ mb_substr($contact['content'] , 25,)}}</span>
                 @endif
              </div>
            </td>

          </form>
        </div>
        <td class="management-table__item">
          <form class="delete-form" action="/management/delete" method="POST">
            @method('DELETE')
            @csrf
            <div class="delete-form__button">
            <input type="hidden" name="id" value="{{ $contact['id'] }}">
              <button class="delete-form__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
@endforeach


    </table>
  </div>


</div>


  </main>
</body>

</html>