<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
</head>

<body>
  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>


      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>

          <div class="form__group-content">
            <div class="form__input--name">
              <div class="form__input--last_name">
                <input type="text" name="last_name" placeholder="山田"  value="{{ old('last_name') }}"/>
                <p class="small-txt">例）山田</p>
              </div>
              <div class="form__input--first_name">
                <input type="text" name="first_name" placeholder="太郎" value="{{ old('first_name') }}"/>
                  <p class="small-txt">例）太郎</p>
              </div>
            </div>
            <div class="form__error">
  @error('last_name')
  {{ $message }}
  @enderror
  @error('first_name')
  {{ $message }}
  @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__radio">
                <label><input type="radio" name="gender" value="男性" checked/>男性</label>
                <label><input type="radio" name="gender" value="女性"/>女性</label>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"/>
              <p class="small-txt">例）test@example.com</p>
            </div>
            <div class="form__error">
  @error('email')
  {{ $message }}
  @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--code">
              <div class="form__label--code">〒
                <input type="text" name="code" inputmode="url" placeholder="123-4567" value="{{ old('code') }}" pattern="\d{3}-\d{4}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"/></div>
            </div>
            <p class="small-txt">例）123-4567</p>
            <div class="form__error">
  @error('code')
  {{ $message }}
  @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
              <p class="small-txt">例）東京都渋谷区千駄ヶ谷1-2-3</p>
            </div>
            <div class="form__error">
  @error('address')
  {{ $message }}
  @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
            <span class="form__label--required"></span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building" placeholder="千駄ヶ谷マンション101" value="{{ old('building') }}"/>
              <p class="small-txt">例）千駄ヶ谷マンション101</p>
            </div>
            <div class="form__error">
  @error('building')
  {{ $message }}
  @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ご意見</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea type="text" name="content" placeholder="ここをこうしていただきたいです">{{ old('content') }}</textarea>
            </div>
            <div class="form__error">
  @error('content')
  {{ $message }}
  @enderror
            </div>
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">確認</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>