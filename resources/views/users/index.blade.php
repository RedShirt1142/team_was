<!--- bootstrap流テーブルレイアウト

<table class="table" table-striped table-hover>
  <thead>
    <tr>
      <th>#</th>
      <th scope="col">見出し</th>
      <th scope="col">見出し</th>
      <th scope="col">見出し</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>テーブルのセル</td>
      <td>テーブルのセル</td>
      <td>テーブルのセル</td>
    </tr>
    ...
  </tbody>
</table>



--->

@extends('layouts.app')
@section('content')

    <h1 class="center-block">会員一覧</h1>

    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">名前</th>
                <th scope="col">電話番号</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">住所</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    @can('Admin-only')
                    <td>
                        <!-- <a href="/user/edit/{{$user->id}}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>編集</a>  -->
                        <a href="/user/{{$user->id}}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>削除</a>     
                    </td>
                    @endcan
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection