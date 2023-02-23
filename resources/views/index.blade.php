<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
  body{
    margin: 0px;
  }
  .add-container{
    margin-bottom: 30px;
  }
  h1{
    font-size: 24px;
    margin: 0px 0px 10px 0px;
  }
  ul{
    margin: 0px
  }
  .update-form{
  display: inline-block;
  }
  .delete-form{
  display: inline-block;
  }
  .main-container{
  height: 620px;
  background: blue
  }
  .card{
    background-color: #fff;
    width: 50vw;
    padding: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
  }
  .add-text{
  width: 80%;
  padding:10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  }
  .content-text{
  width: 85%;
  padding:5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  }
  table{
    text-align: center;
    width: 100%;
    line-height: 45px;
  }
  .table-content{
    width: 100%;
  align-content: center
  }
  .add-button{
    text-align: left;
    border: 2px solid #dc70fa;
    font-size: 12px;
    color: #dc70fa;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    margin-left: 30px;
  }
  .update-button{
    text-align: left;
    border: 2px solid orange;
    font-size: 12px;
    color: orange;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
  }
  .delete-button{
    text-align: left;
    border: 2px solid #52d1bb;
    font-size: 12px;
    color: #52d1bb;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
  }
  .add-button:hover{
    color: white;
    background-color: #dc70fa;
  }
  .update-button:hover{
    color: white;
    background-color: orange;
  }
  .delete-button:hover{
    color: white;
    background-color: #52d1bb;
  }
</style>
<body>
  <div class="main-container">
    <div class="card">
      <div class="add-container">
        <h1>Todo List</h1>
          @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
          @endif
        <form  action="/" method="POST">
        @csrf
        <input  class="add-text" type="text" name="content"  >
        <input type="submit" class="add-button" value="追加">
        </form>
      </div>
        <div class="table-content">
          <table>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
          @foreach ($todo as $todos)
            <form class="update-form" action="/" method="POST">
            @method('put')
            @csrf
            <tr>
              <input type="hidden" name="id" value="{{ $todos->id }}">
              <td>{{$todos->created_at}}</td>
              <td><input class="content-text" name="content" type="text" value="{{$todos->content}}"></td>
              <td><input type="submit" class="update-button" value="更新"></td>
            </form>
            <form class="delete-form" action="/" method="POST">
            @method('delete')
            @csrf
            <input type="hidden" name="id" value="{{ $todos->id }}">
            <td><input type="submit" class="delete-button" value="削除"></td>
            </form>
            </tr>
          @endforeach
          </table>
        </div>
      </div>
    </div>
</body>
</html>