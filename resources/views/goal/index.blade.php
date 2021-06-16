@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>売上目標</span>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between mb-3" id="goal-page-toolbar">
                    <a href="javascript:void(0)" class="btn btn-success px-4" onclick="saveData()">適用</a>
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
                                <th scope="col" style="min-width: 100px"></th>
                                @foreach ($users as $item)
                                    <th scope="col">{{$item->name}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;" class="shift-data">
                            <tr>
                                <th>売上目標</th>
                                @foreach ($users as $item)
                                    <td><input type="number" name="inp_{{$item->id}}" class="goal-inp" dir="rtl"></td>
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
        $('#goal-page-toolbar').find('input:radio').change(function(e){
            var dt = new Date($('#date-title').data('y')+'/'+$('#date-title').data('m')+'/1');
            $('#date-title').data('unit', this.id)

            drawTitle(dt);
        });
        $('#goal-page-toolbar').find('.prev').click(function(){
            var y = $('#date-title').data('y');
            var m = $('#date-title').data('m');
            var unit = $('#date-title').data('unit');
            var dt = new Date(y+'/'+m+'/1');
            if(unit == 'month') {
                dt.setMonth(m-2)
            } else {
                dt.setFullYear(y-1)
            }
            drawTitle(dt);
        })
        $('#goal-page-toolbar').find('.next').click(function(){
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
        $('#go_to_today').click(function(){
            $('#date-title').data('date');
            drawTitle(new Date())
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

    function saveData() {
        var y = $('#date-title').data('y');
        var m = $('#date-title').data('m');
        m = parseInt(m);
        var key = y+(m < 10 ? '0' : '')+m
        var saveData = []
        $('.goal-inp').map((i, e)=>{
            var row = {
                month: key,
                employee_id: e.name.split('_')[1],
                goal: e.value
            }
            saveData.push(row)
        })
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/goal',
            type: 'POST',
            data: {
                data: saveData
            }
        })
        // Ajaxリクエスト成功時の処理
        .done(function (data) {

        })
        // Ajaxリクエスト失敗時の処理
        .fail(function (data) {

        });
    }

    function getLoadData() {
        var y = $('#date-title').data('y');
        var m = $('#date-title').data('m');
        m = parseInt(m);
        $('.goal-inp').val('')
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/goal/ajax/show',
            type: 'get',
            data: {
                key: y+(m < 10 ? '0' : '')+m
            }
        })
        // Ajaxリクエスト成功時の処理
        .done(function (data) {
            data = JSON.parse(data);
            data.map(e=>{
                $('input[name=inp_'+e.employee_id+']').val(e.goal)
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

