@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>権限一覧</span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ページ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">受付管理</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">結果報告</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">帳票管理</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">業務日報</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">目標設定</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">顧客管理</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">スタッフ管理</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">権限管理</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">ポスティング配布登録</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        <tr>
                            <th scope="row">ポスティング業者管理</th>
                            <td><input type="checkbox">閲覧</td>
                            <td><input type="checkbox">登録</td>
                            <td><input type="checkbox">編集</td>
                            <td><input type="checkbox">削除</td>
                        </tr>
                        
                    </tbody>
                </table>
                
            </div>
        </div><!-- card -->
        
    </div>
</main>


  
@endsection