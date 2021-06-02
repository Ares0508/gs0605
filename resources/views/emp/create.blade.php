@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success mb-5">
            <div class="card-outline-success-header">
                <span>新規スタッフ登録</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <form action='{{ route("emp.store") }}' method='post'>
                        <table class="table table-bordered table-background">
                            {{ csrf_field() }}
                            <tbody>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="staff_id">スタッフID</label>
                                    </th>
                                    <td>
                                    <input name="staff_id" id="staff_id" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="last_name">姓</label>
                                    </th>
                                    <td>
                                    <input name="last_name" id="last_name" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="first_name">名</label>
                                    </th>
                                    <td>
                                    <input name="first_name" id="first_name" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="display_name">表示名</label>
                                    </th>
                                    <td>
                                    <input name="display_name" id="display_name" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="gender">性別</label>
                                    </th>
                                    <td>
                                    <label class="radio-inline" for="status0">
                                    <input name="gender" id="status0" value="男性" checked="checked" type="radio">
                                    男性
                                    </label> 
                                    <label class="radio-inline" for="status1">
                                    <input name="gender" id="status1" value="女性" type="radio">
                                    女性
                                    </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="phone">電話番号</label>
                                    </th>
                                    <td>
                                    <input name="phone" id="phone" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="email">メールアドレス</label>
                                    </th>
                                    <td>
                                    <input name="email" id="email" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="started_at">入社日</label>
                                    </th>
                                    <td>
                                    <input name="started_at" id="started_at" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="location.href='/staff'" class="btn btn-outline-success mr-1">
                            一覧に戻る
                            </button>
                            <input class="btn btn-success px-5" value="送信" type="submit">
                            <div class="px-5"></div>
                        </div>
                        
                        
                    </form>
                </div><!-- table-responsive -->

            </div>
        </div><!-- card -->
        
</div>
</main>
@endsection
    