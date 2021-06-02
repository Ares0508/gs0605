@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>新規受付入力</span>
            </div>
            <div class="card-body">

                <div class="table-responsive mb-2">
                    <!--<form action="" method='get'>-->
                        {{ csrf_field() }}
                        
                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">お客様情報</p>
                        
                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25">
                                        <label class="control-label" for="name">お名前</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="">性別</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="">電話番号</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">訪問先</p>
                        
                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25">
                                        <label class="control-label" for="name">訪問先</label>
                                    </th>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">ご依頼内容</p>
                        
                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25">
                                        <label class="control-label" for="name">業者名</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label class="control-label" for="name">サービス</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label class="control-label" for="name">カテゴリ</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label class="control-label" for="name">内容</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label class="control-label" for="name">備考</label>
                                    </th>
                                    <td>
                                        ああ
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- navigation -->
                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="location.href='/appointment/create2'" class="btn btn-outline-success mr-1">
                            日程調整へ戻る
                            </button>
                            <input class="btn btn-success px-5" value="送信" type="submit" onclick="location.href='/appointment/create2'">
                            <div class="px-5"></div>
                        </div>
                        <!-- END-navigation -->
                        
                    <!--</form>-->
                </div>
                
            </div>
        </div><!-- card -->
        
</div>
</main>



@endsection
    