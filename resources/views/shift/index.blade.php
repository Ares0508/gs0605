@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content" id="shift-page">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>シフトデータ</span>
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between mb-3" id="shift-page-toolbar">
                    <div class="form-inline">
                        <a href="javascript:void(0)" onclick="openModal('new')" class="btn btn-success px-4 mx-1">新規追加</a>
                        <a href="javascript:void(0)" class="btn btn-success px-4 mx-1">編集</a>
                    </div>

                    <div class="form-inline">
                        <div class="btn btn-outline-primary rounded-pill px-4">
                            <a href="javascript:void(0)" class="prev"><i class="fas fa-chevron-left"></i></a>
                                <span id="date-title" class="mx-5" data-unit="month" data-y="{{date('Y')}}" data-m="{{date('m')}}" data-d="{{date('d')}}">{{date('Y')}}年{{date('m')}}月</span>
                            <a href="javascript:void(0)" class="next"><i class="fas fa-chevron-right"></i></a>
                        </div>

                        <a href="javascript:void(0)" id="go_to_today" class="btn btn-outline-primary rounded-pill px-4 ml-4">本日</a>
                    </div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="options" id="date" autocomplete="off"> 日別
                        </label>
                        <label class="btn btn-outline-success active">
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
                                <th scope="col">スタッフ</th>
                                @foreach (range(1, date('t', strtotime(date('Y-m-d')))) as $item)
                                    <th scope="col" key="{{$item}}">{{$item}}月</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;" class="shift-data">
                            @foreach ($users as $item)
                                <tr rid="{{$item->id}}">
                                    <th scope="row">{{$item->name}}</th>
                                    @foreach (range(1, date('t', strtotime(date('Y-m-d')))) as $item)
                                        <td scope="col" key="{{$item}}"></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div><!-- card -->
        <!-- The Modal -->
        <div class="modal" id="addShiftModal">
            <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">新規追加</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                {{ Form::open(array('url' => 'shift', 'method'=> 'POST', 'id'=>'shift-form')) }}
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-background table-bordered">
                            <tr>
                                <th scope="row">
                                    <label class="control-label" for="name">お名前</label>
                                </th>
                                <td>
                                    @php
                                        $userlist = array();
                                        foreach ($users as $user) {
                                            $userlist[$user->id] = $user->name;
                                        }
                                    @endphp
                                    {{ Form::select('employee_id', $userlist, null, ['class'=>'form-control', 'id' => 'employee', 'required' => 'true']) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label class="control-label" for="name">Position</label>
                                </th>
                                <td>
                                    {{ Form::select('position_id', $positions, null, ['class'=>'form-control', 'id' => 'position', 'required' => 'true']) }}
                                </td>
                            </tr>
                        </table>
                        @include('common.time-set')
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input class="btn btn-success px-5" value="適用" type="submit">
                </div>
                {{ Form::close() }}

            </div>
            </div>
        </div>
    </div>
</main>
<script>
    var shifts = []
    function openModal(type) {
        if(type == 'new') {
            $('#addShiftModal').modal();
        }
    }
    $(function(){
        $('#shift-page-toolbar').find('input:radio').change(function(e){
            var dt = new Date($('#date-title').data('y')+'/'+$('#date-title').data('m')+'/'+$('#date-title').data('d'));
            $('#date-title').data('unit', this.id)

            drawTitle(dt);
        });
        $('#shift-page-toolbar').find('.prev').click(function(){
            var y = $('#date-title').data('y');
            var m = $('#date-title').data('m');
            var d = $('#date-title').data('d');
            var unit = $('#date-title').data('unit');
            var dt = new Date(y+'/'+m+'/'+d);

            if(unit == 'month') {
                dt.setMonth(m-2)
            } else if(unit == 'date') {
                dt.setDate(d-1)
            } else {
                dt.setFullYear(y-1)
            }

            drawTitle(dt);
        })
        $('#shift-page-toolbar').find('.next').click(function(){
            var y = $('#date-title').data('y');
            var m = $('#date-title').data('m');
            var d = $('#date-title').data('d');
            var unit = $('#date-title').data('unit');
            var dt = new Date(y+'/'+m+'/'+d);

            if (unit == 'month') {
                dt.setMonth(m)
            } else if(unit == 'date') {
                dt.setDate(d+1)
            } else {
                dt.setFullYear(y+1)
            }
            drawTitle(dt);
        });
        $('#go_to_today').click(function(){
            $('#date-title').data('date');
            drawTitle(new Date())
        })

        $('#shift-form').submit(function (e) {
            console.log(e)
            if(confirmValidate())return true;
            e.preventDefault();
        })
    })

    function confirmValidate() {
        var employee = $('#employee').val();
        var y = $('#year-select').val();
        var m = $('#month-select').val();
        var d = $('#day-select').val();
        var times = $('#time-select').val().split('@');

        var is_exist = shifts.find(e=> {
            return e.start == y+'-'+m+'-'+d+' '+times[0] && e.end == y+'-'+m+'-'+d+' '+times[1] && e.employee_id == employee
        } )
        if(is_exist) {
            alert('This time is already assigned for other shift');
            return false
        }
        return true
    }
    function drawTitle(dt) {
        var title = dt.getFullYear()+'年'
        if($('#date-title').data('unit') == 'month') {
            title += ((dt.getMonth()+1) < 10 ? '0' : '') + (dt.getMonth()+1) +'月'
        } else if($('#date-title').data('unit') == 'date') {
            title += ((dt.getMonth()+1) < 10 ? '0' : '') + (dt.getMonth()+1) +'月'
            title += (dt.getDate() < 10 ? '0' : '') + dt.getDate() +'日'
        }
        drawBody(dt, $('#date-title').data('unit'))

        $('#date-title').html(title);
        $('#date-title').data('y', dt.getFullYear())
        $('#date-title').data('m', dt.getMonth()+1)
        $('#date-title').data('d', dt.getDate())
        getLoadData();
    }
    function drawBody(dt, unit) {
        var end = 24
        var date = dt.getDate();
        var text = '時'
        if(unit == 'year') {
            end = 12
            text = '月'
        } else if (unit == 'month') {
            dt.setDate(1)
            dt.setMonth(dt.getMonth()+1)
            dt.setDate(0)
            end = dt.getDate();
            dt.setDate(date)
            text = '日'
        }
        $('#shift-page').find('table tr').each(function(index, row){
            $(row).children().each((i, item) => {
                if(i > 0) {
                    item.remove();
                }
            })
            for(var i = 1;i <= end;i ++) {
               if(index == 0){
                    $(row).append('<th scope="col" key="'+i+'">'+i+text+'</th>');
               } else {
                    $(row).append('<td scope="col" key="'+i+'"></td>');
               }
            }
        })
    }
    function getLoadData() {
        var y = $('#date-title').data('y');
        var m = $('#date-title').data('m');
        var d = $('#date-title').data('d');
        var unit = $('#date-title').data('unit');

        var present = new Date();
        present.setDate(d);
        present.setMonth(Number(m)-1);
        present.setFullYear(y);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/shift/ajax/show',
            type: 'GET',
            data: {
                y: y,
                m: m,
                d: d,
                unit: unit
            }
        }).done(function(data){
            shifts = data
            data.map(e=>{
                if(unit == 'date') {

                }
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
