@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                結果報告
            </div>
            <div class="card-body">
                {{ Form::open(array('url' => 'result', 'method'=> 'POST')) }}
                <input type="hidden" name="target" value="create">
                <input type="hidden" name="key" value="code">
                <select class="form-control" name="result_code">
                    @foreach ($data as $item)
                    <option value="{{$item['id']}}">{{$item['result_code']}}</option>
                    @endforeach
                </select>
                <input class="btn btn-success mt-3 px-5" id="go-next" value="結果報告" type="submit">
                {{ Form::close() }}
            </div>
        </div><!-- card -->

</div>
</main>



@endsection
