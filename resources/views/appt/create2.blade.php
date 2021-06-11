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
                            {{ Form::open(array('url' => 'appointment', 'method'=> 'POST')) }}
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$appoint->id}}">
                                <div class="d-flex">
                                    <!-- 生年月日入力 -->
                                    <select id="year" name="year" class="form-control" required>
                                        <?php $years = array_reverse(range(today()->year + 10, today()->year)); ?>
                                        @foreach($years as $year)
                                        <option value="{{ $year }}" {{ old('year') == $year || date('Y') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    <label for="year" class="align-self-end px-1">年</label>

                                    <select id="month" name="month" class="form-control" required>
                                        <option value="">---</option>
                                        @foreach(range(1, 12) as $month)
                                        <option value="{{ $month < 10 ? '0'.$month : $month }}" {{ old('month') == $month || date('m') == $month ? 'selected' : '' }}>{{ $month }}</option>
                                        @endforeach
                                    </select>
                                    <label for="month" class="align-self-end px-1">月</label>

                                    <select id="day" name="day" class="form-control" data-old-value="{{ old('day') }}" required></select>
                                    <label for="day" class="align-self-end px-1">日</label>
                                    <!-- 生年月日入力 -->
                                </div>
                                <div class="d-flex mt-2">
                                    <select class="form-control" name="time" required>
                                        <option value="10:00:00@12:00:00">①10:00～12:00</option>
                                        <option value="10:40:00@12:00:00">②10:00～12:00</option>
                                        <option value="11:20:00@12:00:00">③10:00～12:00</option>
                                        <option value="12:00:00@14:00:00">①12:00～14:00</option>
                                        <option value="12:40:00@14:00:00">②12:00～14:00</option>
                                        <option value="13:20:00@14:00:00">③12:00～14:00</option>
                                        <option value="14:00:00@16:00:00">①14:00～16:00</option>
                                        <option value="14:40:00@16:00:00">②14:00～16:00</option>
                                        <option value="15:20:00@16:00:00">③14:00～16:00</option>
                                        <option value="16:00:00@18:00:00">①16:00～18:00</option>
                                        <option value="16:40:00@18:00:00">②16:00～18:00</option>
                                        <option value="17:20:00@18:00:00">③16:00～18:00</option>
                                        <option value="18:00:00@23:00:00">①18:00～</option>
                                    </select>
                                </div>
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
// 誕生日 日付の取得
function setDay() {
  // 年の値を取得
  const yearVal = document.getElementById('year').value;
  // 月の値を取得
  const monthVal = document.getElementById('month').value;
  // 日のセレクトボックスに挿入するHTML
  let html = '<option value="">---</option>';
  // 年月が有効な値の場合のみ日付の選択肢を加える
  if (yearVal !== '' && monthVal !== '') {
    // 特定の年月の最後の日付を取得する
    const lastDay = (new Date(yearVal, monthVal, 0)).getDate();
    // optionを組み立てる
    for (let day = 1; day <= lastDay; day++) {
      html += '<option value="' + (day < 10 ? '0' : '') + day + '">' + day + '</option>';
    }
  }
  document.getElementById('day').innerHTML = html;
};

window.onload = function () {
  setDay();
  document.getElementById('year').addEventListener('change', setDay);
  document.getElementById('month').addEventListener('change', setDay);

  // リダイレクトした場合に元の入力値を復元する
  const dayElem = document.getElementById('day');
  dayElem.value = dayElem.getAttribute('data-old-value');
}
</script>



@endsection
