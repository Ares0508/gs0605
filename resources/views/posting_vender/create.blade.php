@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success mb-5">
            <div class="card-outline-success-header">
                <span>新規ポスティング業者登録</span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <form action='{{ route("posting-vender.store") }}' method='post'>
                        <table class="table table-bordered table-background">
                            {{ csrf_field() }}
                            <tbody>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="name">業者名</label>
                                    </th>
                                    <td>
                                    <input name="name" id="name" placeholder="" class="form-control input-md" type="text">
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
                                    <label class="control-label" for="postcode">郵便番号</label>
                                    </th>
                                    <td>
                                    <input name="postcode" id="postcode" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="address">住所</label>
                                    </th>
                                    <td>
                                    <input name="address" id="address" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="url">URL</label>
                                    </th>
                                    <td>
                                    <input name="url" id="url" placeholder="" class="form-control input-md" type="text">
                                    </td>
                                </tr>
                                
                            </tbody>
                        
                        </table>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="location.href='/posting-vender'" class="btn btn-outline-success mr-1">
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
    