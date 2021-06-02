@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success mb-5">
            <div class="card-outline-success-header">
                <span>新規スタッフ登録</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-background">
                        <tbody>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="staff_id">スタッフID</label>
                                </th>
                                <td>{{$staff->staff_id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="last_name">姓</label>
                                </th>
                                <td>{{$staff->last_name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="first_name">名</label>
                                </th>
                                <td>{{$staff->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="display_name">表示名</label>
                                </th>
                                <td>{{$staff->comment}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="phone">電話番号</label>
                                </th>
                                <td>{{$staff->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="email">メールアドレス</label>
                                </th>
                                <td>{{$staff->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="started_at">入社日</label>
                                </th>
                                <td>{{$staff->started_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                    <div class="d-flex d-flex-inline">
                        <button type="button" onclick="location.href='/staff'" class="btn btn-outline-success mr-1">
                            一覧に戻る
                        </button>
                        <button type="button" onclick="location.href='/staff/{{$staff->id}}/edit'" class="btn btn-success mx-1 ml-auto">
                            編集する
                        </button>
                        <form action="/staff/{{$staff->id}}"  method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method"     value="delete">
                            <input type="submit" name="" class="btn btn-danger mx-1" value="削除する">
                        </form>
                    </div>
                    
                </div><!-- table-responsive -->

            </div>
        </div><!-- card -->
        
    </div>
</main>
            
@endsection
