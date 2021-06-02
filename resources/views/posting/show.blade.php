@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success mb-5">
            <div class="card-outline-success-header">
                <span>ポスティング報告の詳細</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-background">
                        <tbody>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="name">業者名</label>
                                </th>
                                <td>{{$posting->vender_id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="gender">枚数</label>
                                </th>
                                <td>{{$posting->number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                <label class="control-label" for="phone">登録日</label>
                                </th>
                                <td>{{$posting->posted_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                    <div class="d-flex d-flex-inline">
                        <button type="button" onclick="location.href='/posting'" class="btn btn-outline-success mr-1">
                            一覧に戻る
                        </button>
                        <button type="button" onclick="location.href='/posting/{{$posting->id}}/edit'" class="btn btn-success mx-1 ml-auto">
                            編集する
                        </button>
                        <form action="/posting/{{$posting->id}}"  method="post">
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
