<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css">

  <script src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script src="/assets/js/editor.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/github.css" />
  <link rel="stylesheet" href="/assets/css/editor.css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <h1>新規記事作成</h1>
        <form method="POST" action="{{route('store')}}">
            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            {{csrf_field()}}
            <div class="row">
                <label for="title">タイトル</label>
                <input class="form-control" type="text" name="title">     
            </div>
            <div class="row">
                <label for="userid">who are you?</label>
                <select name="user_id" class="form-control">
                    <option value="">ユーザーidを選択</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->userid}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <label for="body">本文</label>
                <textarea id="editor" name="body" class="form-control"></textarea>
            </div>
          <button type="submit" class="btn btn-primary">投稿</button>
        </form>
      </div>
      <div class="col-xs-6">
        <h2>プレビュー</h2>
        <div id="result"></div>
      </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <img src="/assets/img/cheatsheet.png" width="650" height="429"></img>
        </div>
    </div>
  </div>
  <script>
    var onBeforeunloadHandler = function(e) {
      e.returnValue = '変更が保存されていませんが、離脱しますか？';
    };
// イベントを登録
$(window).on('beforeunload', onBeforeunloadHandler);

$('form').on('submit', function(e) {
    // イベントを削除
    $(window).off('beforeunload', onBeforeunloadHandler);
  });
</script>
</body>
</html>
