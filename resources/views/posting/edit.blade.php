@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>ポスティング報告の修正</span>
            </div>
            <div class="card-body">
            
                <div class="table-responsive">
                    
                    <form action="/posting/{{$posting->id}}" method='post'>
                        <table class="table table-bordered table-background">
                            {{ csrf_field() }}
                            <tbody>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="vender_id">名前</label>
                                    </th>
                                    <td>
                                    <input name="vender_id" id="vender_id" placeholder="" class="form-control input-md" type="text" value='{{$posting->vender_id}}'>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="number">枚数</label>
                                    </th>
                                    <td>
                                    <input name="number" id="number" placeholder="" class="form-control input-md" type="text" value='{{$posting->number}}'>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <label class="control-label" for="posted_at">登録日</label>
                                    </th>
                                    <td>
                                    <input name="posted_at" id="posted_at" placeholder="" class="form-control input-md" type="text" value='{{$posting->posted_at}}'>
                                    </td>
                                </tr>
                                
                            </tbody>
                        
                        </table>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="location.href='/posting'" class="btn btn-outline-success mr-1">
                            一覧に戻る
                            </button>
                            <input type="hidden" name="_method" value="patch">
                            <input class="btn btn-success px-5" value="更新" type="submit">
                            <div class="px-5"></div>
                        </div>
                    </form>
                </div><!-- table-responsive -->
                
            </div>
        </div>
    
    </div>
</main>
@endsection

