@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="mb-3">
            <h3>結果報告</h3>
            <p>必要項目を入力してください</p>
        </div>
        
        <ul class="nav nav-tabs nav-success" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">基本情報</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">見積・契約内容</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="item3-tab" data-toggle="tab" href="#item3" role="tab" aria-controls="item3" aria-selected="false">リサイクル家電収集運搬料金</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="item4-tab" data-toggle="tab" href="#item4" role="tab" aria-controls="item4" aria-selected="false">作業料金明細</a>
            </li>
        </ul>
        
        <form action='' method='post' name="form1">
        {{ csrf_field() }}
            
        <div class="tab-content bg-white border border-top-0 rounded p-3" style="min-height: 485px;">
            <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
                
                <!-- tab content 1 -->
                <div class="table-responsive">
                    <table class="table m-0">
                        
                        <tbody class="borderless-1 height-37">
                            <tr>
                                <th scope="row" style="width:20%;">受付番号</th>
                                <td>
                                <input name="name" id="name" placeholder="" class="form-control input-md" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">お客様名</th>
                                <td>
                                <input name="phone" id="phone" placeholder="" class="form-control input-md" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">担当者名</th>
                                <td>
                                <input name="email" id="email" placeholder="" class="form-control input-md" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">お見積り内容</th>
                                <td>
                                <select class="form-control">
                                    <option value="回収作業">回収作業</option>
                                    <option value="買取">買取</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">作業場所</th>
                                <td>
                                <input name="address" id="address" placeholder="" class="form-control input-md" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">作業日時</th>
                                <td>
                                <input name="url" id="url" placeholder="" class="form-control input-md" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">支払条件</th>
                                <td>
                                <input name="url" id="url" placeholder="" class="form-control input-md" type="text">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div><!-- table-responsive -->
                <!-- END tab content 1 -->
            </div>

            <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
                <!-- tab content 2 -->
                <div class="table-responsive pb-3">
                    <table class="table table-borderless m-0" id="count">
                        <thead>
                            <tr>
                                <th scope="col" width="30%">品名</th>
                                <th scope="col" width="20%">数量（個）</th>
                                <th scope="col" width="23%">単価（円）</th>
                                <th scope="col" width="23%">金額（円）</th>
                                <th scope="col" width="4%"></th>
                            </tr>
                        </thead>
                        <tbody id="input_pluralBox" class="td-borderless">
                            <tr id="input_plural">
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="">
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button>
                                    <input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center">
                                    <button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                                <td>
                                    <input type="button" value="－" class="del pluralBtn btn btn-outline-primary">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <!-- click to add element -->
                    <input type="button" value="＋" class="add pluralBtn btn btn-outline-success" style="margin-left: 12px;">
                    <!-- END click to add element -->
                </div>
                <!-- END tab content 2 -->
            </div>
            
            <div class="tab-pane fade" id="item3" role="tabpanel" aria-labelledby="item3-tab">
                <!-- tab content 3 -->
                <div class="table-responsive pb-3">
                    <table class="table table-borderless m-0" id="count">
                        <thead>
                            <tr>
                                <th scope="col" width="30%">品名</th>
                                <th scope="col" width="20%">数量（個）</th>
                                <th scope="col" width="25%">単価（円）</th>
                                <th scope="col" width="25%">金額（円）</th>
                            </tr>
                        </thead>
                        <tbody class="td-borderless">
                            <tr>
                                <td>
                                    <p>テレビ（リ料2700円＋2500円）</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input id="amount_recycle_tv" type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" id="price_recycle_tv" class="form-control input-md" placeholder="" value="5200">
                                </td>
                                <td>
                                    <input id="calculate" type="text" class="form-control" placeholder="" readonly>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <p>冷蔵庫（リ料4600円＋3500円）</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="" value="8100">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <p>エアコン（リ料3500円＋3800円）</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="" value="7300">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>洗濯機（リ料2400円＋3000円）</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="" value="5400">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END tab content 3 -->
            </div>
            
            <div class="tab-pane fade" id="item4" role="tabpanel" aria-labelledby="item4-tab">
                <!-- tab content 4 -->
                <div class="table-responsive pb-3">
                    <table class="table table-borderless m-0" id="count">
                        <thead>
                            <tr>
                                <th scope="col" width="30%">品名</th>
                                <th scope="col" width="20%">数量（個）</th>
                                <th scope="col" width="25%">単価（円）</th>
                                <th scope="col" width="25%">金額（円）</th>
                            </tr>
                        </thead>
                        <tbody class="td-borderless">
                            <tr>
                                <td>
                                    <p>基本作業料金</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                               
                            </tr>
                            <tr id="input_plural">
                                <td>
                                    <p>搬出作業料金</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                                
                            </tr>
                            <tr id="input_plural">
                                <td>
                                    <p>特別作業料金</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                                
                            </tr>
                            <tr id="input_plural">
                                <td>
                                    <p>手卸作業料金</p>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button><input type="text" name="input01" value="0" readonly class="number form-control input-md mx-2 text-center"><button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" class="form-control input-md" placeholder="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END tab content 4 -->
            </div>
            
        </div>
        </form>
        
        <div class="d-flex justify-content-end border-bottom pb-3 mt-3">
            <div class="pr-4">
                <small class="w-100">買取・回収料金</small>
                <div class="d-flex">
                <input type="text" class="form-control" placeholder="" readonly><small class="align-self-end pl-2">円</small></div>
            </div>
            <div class="pr-4">
                <small class="w-100">リサイクル家電収集運搬料金</small>
                <div class="d-flex">
                <input type="text" class="form-control" placeholder="" readonly><small class="align-self-end pl-2">円</small></div>
            </div>
            <div>
                <small class="w-100">作業料金</small>
                <div class="d-flex">
                <input type="text" class="form-control" placeholder="" readonly><small class="align-self-end pl-2">円</small></div>
            </div>
        </div>
        
        <div class="d-flex justify-content-end border-bottom my-3 pb-3">
            <span class="align-self-end pr-3">小計</span><input type="text" class="form-control w-25" placeholder="" readonly><span class="align-self-end pl-3">円</span>
        </div>
        
        
        <div class="d-flex justify-content-end border-bottom my-3 pb-3">
            <span class="align-self-end pr-3">消費税</span><input type="text" class="form-control w-25" placeholder="" readonly><span class="align-self-end pl-3">円</span>
        </div>
        
        <div class="d-flex justify-content-end border-bottom my-3 pb-3">
            <span class="align-self-end pr-3">合計（税込）</span><input type="text" class="form-control w-25" placeholder="" readonly><span class="align-self-end pl-3">円</span>
        </div>
        
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary mr-1">
            入力を取り消す
            </button>
            <input class="btn btn-success px-5" value="お客様の確認画面へ" type="submit">
            <div class="px-5"></div>
        </div>

</div>
</main>

<script>
$(function(){
	var number,total_numner;
	var max = 5; //合計最大数
	var $input = $('#count .number'); //カウントする箇所
	var $plus = $('#count .plus'); //アップボタン
	var $minus = $('#count .minus'); //ダウンボタン
	//合計カウント用関数
	function total() {
		total_numner = 0;
		$input.each(function(val) {
			val = Number($(this).val());
			total_numner += val;
		});
		return total_numner;
	}
	//ロード時
	$(window).on('load', function() {
		$input.each(function() {
			number = Number($(this).val());
			if (number == max) {
				$(this).next($plus).prop("disabled", true);
			} else if (number == 0) {
				$(this).prev($minus).prop("disabled", true);
			}
		});
		total();
		if (total_numner == max) {
			$plus.prop("disabled", true);
		} else {
			$plus.prop("disabled", false);
		}
	});
	//ダウンボタンクリック時
	$minus.on('click', function() {
		total();
		number = Number($(this).next($input).val());
		if (number > 0) {
			$(this).next($input).val(number - 1);
			if ((number - 1) == 0) {
			$(this).prop("disabled", true);
			}
			$(this).next().next($plus).prop("disabled", false);
		} else {
			$(this).prop("disabled", true);
		}
		total();
		if (total_numner < max) {
			$plus.prop("disabled", false);
		}
	});
	//アップボタンクリック時
	$plus.on('click', function() {
		number = Number($(this).prev($input).val());
		if (number < max) {
			$(this).prev($input).val(number + 1);
			if ((number + 1) == max) {
			$(this).prop("disabled", true);
			}
			$(this).prev().prev($minus).prop("disabled", false);
		} else {
			$(this).prop("disabled", true);
		}
		total();
		if (total_numner == max) {
			$plus.prop("disabled", true);
		} else {
			$plus.prop("disabled", false);
		}
	});
});
</script>
    
<script>
//クリックで複製
$(document).on("click", ".add", function() {
    $('#input_plural').clone(true).insertAfter('#input_plural');
});
$(document).on("click", ".del", function() {
    var target = $('#input_plural');
    if (target.parent().children().length > 1) {
        target.remove();
    }
});
</script>  

@endsection
    