<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Todo List</h1>
  <form action="/" method="POST">
  @csrf
  <input type="text" name="content" >
  <button>追加</button>
  </form>
  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach ($todo as $todos)
      <form action="/" method="POST">
      @method('put')
      @csrf
      <tr>
        <input type="hidden" name="id" value="{{ $todos->id }}">
        <td>{{$todos->created_at}}</td>
        <td><input name="content" type="text" value="{{$todos->content}}"></td>
        <td><button>更新</button></td>
      <form action="/" method="POST">
      @method('delete')
      @csrf
      <td><button>削除</button></td>
      </form>
      </tr>
  </table>
    </form>
    @endforeach
</body>
</html>