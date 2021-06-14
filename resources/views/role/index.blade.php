@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>権限一覧</span>
            </div>
            {{ Form::open(array('url' => 'role', 'method'=> 'POST', 'id'=>'role-form')) }}
            <div class="card-body">
                <div class="table">
                    <div class="row m-0">
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="d-flex justify-content-between">
                                <label class="control-label mt-2" for="staff">スタッフ</label>
                                <select id="staff" placeholder="" class="form-control input-md col-9" type="text" name="staff" required>
                                @foreach($staffs as $staff)
                                    <option value="{{$staff['id']}}">{{$staff['name']}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" id="accept" class="btn btn-success text-center px-4">
                                <span>適用</span>
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table role-table">
                    <thead>
                        <tr>
                            <th scope="col">ページ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-id="appointment">
                            <th scope="row">受付管理</th>
                            <td><input type="checkbox" name="permission[appointment][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[appointment][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[appointment][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[appointment][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="result">
                            <th scope="row">結果報告</th>
                            <td><input type="checkbox" name="permission[result][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[result][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[result][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[result][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="form">
                            <th scope="row">帳票管理</th>
                            <td><input type="checkbox" name="permission[form][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[form][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[form][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[form][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="report">
                            <th scope="row">業務日報</th>
                            <td><input type="checkbox" name="permission[report][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[report][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[report][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[report][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="goal">
                            <th scope="row">目標設定</th>
                            <td><input type="checkbox" name="permission[goal][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[goal][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[goal][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[goal][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="customer">
                            <th scope="row">顧客管理</th>
                            <td><input type="checkbox" name="permission[customer][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[customer][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[customer][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[customer][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="emp">
                            <th scope="row">スタッフ管理</th>
                            <td><input type="checkbox" name="permission[emp][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[emp][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[emp][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[emp][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="role">
                            <th scope="row">権限管理</th>
                            <td><input type="checkbox" name="permission[role][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[role][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[role][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[role][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="posting">
                            <th scope="row">ポスティング配布登録</th>
                            <td><input type="checkbox" name="permission[posting][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[posting][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[posting][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[posting][delete]" data-id="delete">削除</td>
                        </tr>
                        <tr data-id="posting-vender">
                            <th scope="row">ポスティング業者管理</th>
                            <td><input type="checkbox" name="permission[posting-vendor][get]" data-id="get">閲覧</td>
                            <td><input type="checkbox" name="permission[posting-vendor][post]" data-id="post">登録</td>
                            <td><input type="checkbox" name="permission[posting-vendor][put]" data-id="put">編集</td>
                            <td><input type="checkbox" name="permission[posting-vendor][delete]" data-id="delete">削除</td>
                        </tr>

                    </tbody>
                </table>

            </div>
            {{ Form::close() }}
        </div><!-- card -->

    </div>
</main>
<script>
$('#staff').change(function () {
    $('.role-table').find('input:checkbox').prop('checked', false);
    var users = <?php echo $staffs; ?>;

    var selectedUser = users.find(e=>e.id==this.value)
    var permission = {};
    if(selectedUser.permission) {
        permission = JSON.parse(selectedUser.permission)
    }
    for(var i in permission) {
        for(var j in permission[i]) {
            $(`tr[data-id=${i}]`).find(`input[data-id=${j}]`).prop('checked', true);
        }
    }
})
$('#role-form').submit(function (e) {
    if($('table input:checked').length === 0) {
        alert('');
        e.preventDefault();
        return;
    }
})
$('#staff').change();
</script>


@endsection
