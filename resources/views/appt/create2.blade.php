@extends('layouts.app')

@section('content')
@include('layouts.side')
<link rel="stylesheet" href="{{asset('css/normalize.min.css')}}">
<link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">

<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>訪問日設定</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">

                        <div class="card mb-3">
                            <div class="card-header">
                                <span><i class="fas fa-truck"></i>　距離計算（車での移動時間）</span>
                            </div>
                            <div class="card-body">
                                @include('distance.distance')
                            </div>
                        </div><!-- card -->

                        <!--<div class="card mb-3">
                            <div class="card-header">
                                <span><i class="fas fa-truck"></i>　直近で可能な日</span>
                            </div>
                            <div class="card-body">
                                <select class="form-control">
                                    <option value="" hidden>リストから選択</option>
                                    <option value="1">cat</option>
                                    <option value="2">dog</option>
                                    <option value="3">rabbit</option>
                                    <option value="4">squirrel</option>
                                </select>
                            </div>
                        </div><!-- card -->

                        <div class="card mb-3">
                            <div class="card-header">
                                <span><i class="fas fa-truck"></i>　訪問日</span>
                            </div>
                            <div class="card-body">
                            {{ Form::open(array('url' => 'appointment', 'method'=> 'POST', 'id'=>'appointment-form')) }}
                                <input type="hidden" name="id" value="{{$appoint->id}}">
                                <input type="hidden" name="target" value="done">
                                @include('common.time-set')
                                <div class="text-center mt-4">
                                    <input class="btn btn-success px-5" value="日程調整へ進む" type="submit">
                                </div>
                            {{ Form::close() }}
                            </div>
                        </div><!-- card -->

                    </div>
                    <div class="col-md-8">
                    @include('calendar')
                    </div>
                </div>

            </div>
        </div><!-- card -->

</div>
</main>

<script>
$(function(){
    var events = '<?php echo json_encode($appoints) ?>';
    if(!events) {
        events = []
    } else {
        events = JSON.parse(events);
    }
    events.map(e=>{
        e.title = e.postal_code
        return e;
    })
    $('#appointment-form').submit(function (e) {
        var y = $('#year-select').val();
        var m = $('#month-select').val();
        var d = $('#day-select').val();
        var times = $('#time-select').val().split('@');
        var is_exist = events.find(e=> {
            return e.start == y+'-'+m+'-'+d+' '+times[0] && e.end == y+'-'+m+'-'+d+' '+times[1]
        } )
        if(is_exist) {
            alert('This time is already assigned for other appointment');
            e.preventDefault();
        }
    })
})
</script>



@endsection
