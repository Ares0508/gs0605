@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid" id="result-panel">

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

        {{ Form::open(array('url' => 'result', 'method'=> 'POST')) }}
        <input type="hidden" name="target" value="create2">
        <input type="hidden" name="key" value="result">
        <div class="tab-content bg-white border border-top-0 rounded p-3" style="min-height: 485px;">
            <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">

                <!-- tab content 1 -->
                <div class="table-responsive">
                    <table class="table m-0">

                        <tbody class="borderless-1 height-37">
                            <tr>
                                <th scope="row" style="width:20%;">受付番号</th>
                                <td>
                                    <select name="basic[appointment_id]" id="appointment_id" class="form-control" required>
                                    @foreach($appt as $row)
                                        <option value="{{$row['id']}}">{{$row['start']}} - {{$row['end']}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">お客様名</th>
                                <td>
                                <input name="basic[phone]" id="phone" placeholder="" class="form-control input-md" type="text" readonly required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">担当者名</th>
                                <td>
                                <input name="basic[name]" id="name" placeholder="" class="form-control input-md" type="text" readonly required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">お見積り内容</th>
                                <td>
                                <select class="form-control" name="basic[estimate]" required>
                                    <option value="回収作業">回収作業</option>
                                    <option value="買取">買取</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">作業場所</th>
                                <td>
                                <input name="basic[address]" id="address" placeholder="" class="form-control input-md" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">作業日時</th>
                                <td>
                                <input name="basic[worktime]" id="worktime" placeholder="" class="form-control input-md" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">支払条件</th>
                                <td>
                                <input name="basic[payment]" id="payment" placeholder="" class="form-control input-md" type="text" required>
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
                        <tbody class="td-borderless">
                            <tr class="primary-row">
                                <td>
                                    <input type="text" name="contract[product][]" class="product form-control input-md" data-key="contract-amount" placeholder="" required>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button>
                                    <input type="text" name="contract[quantity][]" class="quantity number form-control input-md mx-2 text-center" data-key="contract-amount"  value="0" required readonly>
                                    <button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" name="contract[price][]" class="price form-control input-md" data-key="contract-amount" placeholder="" required>
                                </td>
                                <td>
                                    <input type="text" name="contract[amount][]" class="amount form-control" data-key="contract-amount" placeholder="" readonly required>
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
                            <tr class="primary-row">
                                <td>
                                <input type="text" name="trasnport[product][]" class="product form-control input-md" data-key="transportation-fee" placeholder="" required>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button>
                                    <input type="text" name="trasnport[quantity][]" class="quantity number form-control input-md mx-2 text-center" data-key="transportation-fee"  value="0" required readonly>
                                    <button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" name="trasnport[price][]" class="price form-control input-md" data-key="transportation-fee" placeholder="" value="" required>
                                </td>
                                <td>
                                    <input type="text" name="trasnport[amount][]" class="amount form-control" data-key="transportation-fee" placeholder="" readonly required>
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
                            <tr class="primary-row">
                                <td>
                                <input type="text" name="workfee[product][]" class="product form-control input-md" data-key="work-fee" placeholder="" required>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button class="minus btn btn-primary" type="button">－</button>
                                    <input type="text" name="workfee[quantity][]" class="quantity number form-control input-md mx-2 text-center" data-key="work-fee"  value="0" required readonly>
                                    <button class="plus btn btn-success" type="button">＋</button>
                                </td>
                                <td>
                                    <input type="text" name="workfee[price][]" class="price form-control input-md" data-key="work-fee" placeholder="" required>
                                </td>
                                <td>
                                    <input type="text" name="workfee[amount][]" class="amount form-control" data-key="work-fee" placeholder="" readonly required>
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
                <!-- END tab content 4 -->
            </div>

        </div>

        <div class="d-flex justify-content-end border-bottom pb-3 mt-3">
            <div class="pr-4">
                <small class="w-100">買取・回収料金</small>
                <div class="d-flex">
                    <input id="contract-amount" type="text" name="contract-amount" class="form-control total" placeholder="" readonly required>
                    <small class="align-self-end pl-2">円</small>
                </div>
            </div>
            <div class="pr-4">
                <small class="w-100">リサイクル家電収集運搬料金</small>
                <div class="d-flex">
                    <input id="transportation-fee" type="text" name="transportation-fee" class="form-control total" placeholder="" readonly required>
                    <small class="align-self-end pl-2">円</small>
                </div>
            </div>
            <div>
                <small class="w-100">作業料金</small>
                <div class="d-flex">
                    <input id="work-fee" type="text" name="work-fee" class="form-control total" placeholder="" readonly required>
                    <small class="align-self-end pl-2">円</small>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-end border-bottom my-3 pb-3">
            <span class="align-self-end pr-3">合計</span>
            <input id="total" type="text" name="total" class="form-control w-25" placeholder="" readonly required>
            <span class="align-self-end pl-3">円</span>
        </div>

        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary mr-1">
            入力を取り消す
            </button>
            <input class="btn btn-success px-5" id="go-next" value="お客様の確認画面へ" type="submit">
            <div class="px-5"></div>
        </div>

        {{ Form::close() }}
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
	function total(num) {
		total_numner = num;
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
		if (total(number) == max) {
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
		if (total(number) < max) {
			$plus.prop("disabled", false);
		}
        $(this).next($input).change();
	});
	//アップボタンクリック時
	$plus.on('click', function() {
        console.log();
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
        $(this).prev($input).change();
	});

    $('body').on('change', 'input.quantity, input.price', function(){
        var quantity = Number($(this).parent().parent().find('input.quantity').val());
        var price = Number($(this).parent().parent().find('input.price').val());
        var amount = quantity*price;
        $(this).parent().parent().find('input.amount').val(amount).change();
    });
    $('body').on('change', 'input.amount', function(){
        var inps = $(this).parent().parent().parent().find('input.amount');
        var sum = 0;
        inps.map((i, e) => {
            sum += Number(e.value);
        })

        $('#'+$(this).data('key')).val(sum).change();
    });
    $('body').on('change', 'input.total', function(){
        var sum = 0;
        $('input.total').map((i, e) => {
            sum += Number(e.value);
        })
        $('#total').val(sum)
    })
});
</script>

<script>
//クリックで複製
$(document).on("click", ".add", function() {
    $(this).prev().find('tbody>tr').eq(0).clone(true).insertAfter($(this).prev().find('.primary-row').last());
});
$(document).on("click", ".del", function() {
    if ($(this).parent().parent().parent().children().length > 1) {
        $(this).parent().parent().remove();
    }
});
$(document).on('change', '#appointment_id', function(){
    var data = '<?php echo json_encode($appt)?>';
    data = JSON.parse(data);

    data.map(e=>{
        if(e.id == this.value) {
            $('#phone').val(e.phone)
            $('#name').val(e.name)
        }
    })
})
</script>

@endsection
