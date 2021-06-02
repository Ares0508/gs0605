@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success mb-5">
            <div class="card-outline-success-header">
                <span>ポスティング業者詳細</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-background">
                        <tbody>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="name">業者名</label>
                                </th>
                                <td>{{$posting_vender->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="phone">電話番号</label>
                                </th>
                                <td>{{$posting_vender->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="email">メールアドレス</label>
                                </th>
                                <td>{{$posting_vender->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="postcode">郵便番号</label>
                                </th>
                                <td>{{$posting_vender->postcode}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="address">住所</label>
                                </th>
                                <td>{{$posting_vender->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="url">URL</label>
                                </th>
                                <td>{{$posting_vender->url}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                    <div class="d-flex d-flex-inline">
                        <button type="button" onclick="location.href='/posting-vender'" class="btn btn-outline-success mr-1">
                            一覧に戻る
                        </button>
                        <button type="button" onclick="location.href='/posting-vender/{{$posting_vender->id}}/edit'" class="btn btn-success mx-1 ml-auto">
                            編集する
                        </button>
                        <form action="/posting-vender/{{$posting_vender->id}}"  method="post">
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
