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
                {{ Form::open(array('url' => 'appointment', 'method'=> 'POST')) }}
                @include('search.index')
                <input type="hidden" name="is_draft" value="1"/>
                <div class="table-responsive mb-2">
                    <!--<form action="" method='get'>-->

                        <!--<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4><div class="modal-title" id="myModalLabel">（車での移動時間）</div></h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                        <button type="button" class="btn btn-success">受付入力へ</button>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">検索</p>
                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <label class="control-label" for="name">検索内容</label>
                                    </th>
                                    <td>
                                        <input name="search" id="search-inp" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                    <td>
                                        <span class="btn btn-success px-5" id="search">検索</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">お客様情報</p>

                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="name">お名前</label>
                                    </th>
                                    <td>
                                    <input name="name" id="name" placeholder="" class="form-control input-md" type="text" required>
                                    </td>

                                    <th scope="row">
                                    <label class="control-label" for="">性別</label>
                                    </th>
                                    <td>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" hidden>リストから選択</option>
                                        <option value="男性">男性</option>
                                        <option value="女性">女性</option>
                                    </select>
                                    </td>

                                    <th scope="row">
                                    <label class="control-label" for="">電話番号</label>
                                    </th>
                                    <td>
                                    <input name="phone" id="phone" placeholder="" class="form-control input-md" type="text" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">訪問先入力</p>

                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr id="app">
                                    <th scope="row">
                                    <label class="control-label" for="postal_code">郵便番号</label>
                                    </th>
                                    <td>
                                        <input id="potal_code" class="form-control input-md" type="text" name="postal_code" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture','city','address');" value="{{ old('potal_code') }}" required>

                                    </td>
                                    <th scope="row">
                                    <label class="control-label" for="prefecture">都道府県</label>
                                    </th>
                                    <td>
                                        <input id="prefecture" placeholder="" class="form-control input-md" type="text" name="prefecture" required>
                                    </td>

                                    <th scope="row">
                                    <label class="control-label" for="city">地区</label>
                                    </th>
                                    <td>
                                    <input id="city" placeholder="" class="form-control input-md" type="text" name="city" value="{{ old('city') }}" required>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="address">地区以降</label>
                                    </th>
                                    <td colspan="5">
                                        <input id="address" placeholder="" class="form-control input-md" type="text" name="address" value="{{ old('address') }}" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">お問い合わせ内容</p>

                        <table class="table table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="type">サービス</label>
                                    </th>
                                    <td>
                                    {{ Form::select('service', $services, null, ['class'=>'form-control', 'id' => 'service', 'required' => 'true']) }}
                                    </td>

                                    <th scope="row">
                                    <label class="control-label" for="category">カテゴリ</label>
                                    </th>
                                    <td>

                                    {{ Form::select('category', $category_codes, null, ['class'=>'form-control', 'id' => 'category', 'required' => 'true']) }}

                                    </td>

                                    <th scope="row">
                                    <label class="control-label" for="vender">業者名</label>
                                    </th>
                                    <td>
                                    {{ Form::select('vender', $posting_venders, null, ['class'=>'form-control', 'id' => 'name', 'required' => 'true']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="content">内容</label>
                                    </th>
                                    <td colspan="5">
                                    <input name="content" id="content" placeholder="" class="form-control input-md" type="text" value="{{ old('content') }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="comment">備考</label>
                                    </th>
                                    <td colspan="5">
                                    <input name="comment" id="comment" placeholder="" class="form-control input-md" type="text" value="{{ old('comment') }}">
                                    </td>
                                </tr>
                            </tbody>

                        </table>



                        <!-- navigation -->
                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="location.href='/appointment'" class="btn btn-outline-success mr-1">
                            戻る
                            </button>
                            <input class="btn btn-success px-5" value="日程調整へ進む" type="submit">
                            <div class="px-5"></div>
                        </div>
                        <!-- END-navigation -->

                    <!--</form>-->
                </div>
                {{ Form::close() }}
            </div>
        </div><!-- card -->
<script>
$(function(){
    $("#search").off('click');
    $("#search").click(function(){
        var val = $('#search-inp').val()
        jQuery.ajax({
            type: 'GET',
            url: '/appointment/search',
            data: {
                q: val
            }
        }).done(function(data){
            for(var i in data.customer) {
                $('#'+i).val(data.customer[i]);
            }
            for(var i in data.addr) {
                $('#'+i).val(data.addr[i]);
            }
        })
    });
})
</script>
</div>
</main>



@endsection
