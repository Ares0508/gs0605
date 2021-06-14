@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>業務日報</span>
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between mb-3" id="report-page-toolbar">
                    <div class="form-inline" style="margin-left: 200px;">
                        <div class="btn btn-outline-primary rounded-pill px-4">
                            <a href="javascript:void(0)" class="prev"><i class="fas fa-chevron-left"></i></a>
                                <span id="date-title" class="mx-5" data-unit="month" data-y="{{date('Y')}}" data-m="{{date('m')}}">{{date('Y')}}年{{date('m')}}月</span>
                            <a href="javascript:void(0)" class="next"><i class="fas fa-chevron-right"></i></a>
                        </div>

                        <a href="javascript:void(0)" id="go_to_today" class="btn btn-outline-primary rounded-pill px-4 ml-4">本日</a>
                    </div>

                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="options" id="month" autocomplete="off" checked> 月別
                        </label>
                        <label class="btn btn-outline-success">
                            <input type="radio" name="options" id="year" autocomplete="off"> 年別
                        </label>
                    </div>

                </div>



                <div class="table-responsive">
                    <table class="table table-bordered left-fix-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                @foreach ($users as $item)
                                    <th scope="col">{{$item->name}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;" class="shift-data">
                            <tr rid="result_count">
                                <th>営業アポ件数</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="result_contract">
                                <th>契約件数</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="contract_percent">
                                <th>契約率</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="result_total">
                                <th>客単価</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="sum_cash">
                                <th>現金売上</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="sum_amount">
                                <th>売上計</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>

                            <tr rid="goal_value">
                                <th>売上目標</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="current_sale">
                                <th>現在売上</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="negotive_balance">
                                <th>目標不足額</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="rest_date">
                                <th>残り日数</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="daily_destination">
                                <th>日割り目標</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="sum_transfer">
                                <th> 先付け(残金)合計</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="pending_total">
                                <th>不在計</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                            <tr rid="cancel_total">
                                <th>事前ｷｬﾝｾﾙ</th>
                                @foreach ($users as $item)
                                    <td key="{{$item->id}}" class="text-right"></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div><!-- card -->
    </div>
</main>
<script>
$(function(){
    $('#report-page-toolbar').find('input:radio').change(function(e){
        var dt = new Date($('#date-title').data('y')+'/'+$('#date-title').data('m')+'/');
        drawTitle(dt);

        $('#date-title').data('unit', this.value)
    });
    $('#report-page-toolbar').find('.prev').click(function(){
        var y = $('#date-title').data('y');
        var m = $('#date-title').data('m');
        var unit = $('#date-title').data('unit');
        var dt = new Date(y+'/'+m+'/1');
        if(unit == 'month') {
            dt.setMonth(m-2)
        } else {
            dt.setFullYear(y-1)
        }
        console.log(dt)
        drawTitle(dt);
    })
    $('#report-page-toolbar').find('.next').click(function(){
        var y = $('#date-title').data('y');
        var m = $('#date-title').data('m');
        var unit = $('#date-title').data('unit');
        var dt = new Date(y+'/'+m+'/1');
        if (unit == 'month') {
            dt.setMonth(m)
        } else {
            dt.setFullYear(y+1)
        }
        drawTitle(dt);
    })
})
function drawTitle(dt) {
    var title = dt.getFullYear()+'年'
    if($('#date-title').data('unit') == 'month') {
        title += ((dt.getMonth()+1) < 10 ? '0' : '') + (dt.getMonth()+1) +'月'
    }
    $('#date-title').html(title);
    $('#date-title').data('y', dt.getFullYear())
    $('#date-title').data('m', dt.getMonth()+1)
    getLoadData();
}

function getLoadData() {
    var y = $('#date-title').data('y');
    var m = $('#date-title').data('m');

    if($('#date-title').data('unit') == 'month') {
        m = (m < 10 ? '0' : '')+Number(m)
    } else {
        m = '__'
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/report/ajax/show',
        type: 'get',
        data: {
            y: y,
            m: m
        }
    })
    // Ajaxリクエスト成功時の処理
    .done(function (data) {
        data = JSON.parse(data);
        var goals = {}
        data.goals.map(e=>{
            if(!goals[e.employee_id]) {
                goals[e.employee_id] = 0
            }
            goals[e.employee_id] += Number(e.goal);
        })
        var result = {};
        var dt = new Date
        var today = dt.getDate();
        dt.setDate(1)
        dt.setMonth(dt.getMonth()-1)
        dt.setDate(0)
        var end = dt.getDate()

        data.data.map(e=>{
            if(!result[e.emp]) {
                result[e.emp] = {
                    goal_value: goals[e.emp],
                    result_count: 0,
                    result_contract: 0,
                    contract_percent: 0,
                    result_total: 0,
                    sum_cash: 0,
                    sum_amount: 0,
                    current_sale: 0,
                    negotive_balance: 0,
                    rest_date: end-today,
                    daily_destination: 0,
                    sum_transfer: 0,
                    pending_total: 0,
                    cancel_total: 0
                }
            }
            if(e.created_at) {
                result[e.emp].result_count++
                if(e.result_code == '契約') {
                    result[e.emp].result_contract++
                }
                else if(e.result_code == '不在') {
                    result[e.emp].pending_total++
                } else if(e.result_code == '事前ｷｬﾝ') {
                    result[e.emp].cancel_total++
                }

                if(e.payment_type == 'cash') {
                    result[e.emp].sum_cash += (isNaN(Number(result[e.emp].payment_total)) ? 0 : Number(result[e.emp].payment_total));
                } else if(e.payment_type == 'transfer') {
                    result[e.emp].sum_transfer += (isNaN(Number(result[e.emp].payment_total)) ? 0 : Number(result[e.emp].payment_total));
                }

                result[e.emp].sum_amount += (isNaN(Number(result[e.emp].payment_total)) ? 0 : Number(result[e.emp].payment_total));
            }
            for(var i in result) {
                result[i].result_total = result[i].sum_amount/result[i].result_contract
                result[i].current_sale = result[i].sum_amount
                result[i].negotive_balance = result[i].goal_value-result[i].sum_amount
                result[i].daily_destination = (result[i].goal_value-result[i].sum_amount)/result[i].rest_date

                for(var k in result[i]) {
                    $('tr[rid='+k+']>td[key='+i+']').html(result[i][k])
                }
            }
            console.log(result)
        })
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function (data) {

    });
}
getLoadData();
</script>
@include('common.bootstrap-table')

@endsection
