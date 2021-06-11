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
                
                <div class="d-flex justify-content-between mb-3">
                    
                    <a href="" class="btn btn-success px-4">新規追加</a>
                    
                    <div class="form-inline" style="margin-left: 200px;">
                        <div class="btn btn-outline-primary rounded-pill px-4">
                            <a href=""><i class="fas fa-chevron-left"></i></a>
                                <span class="mx-5">2021年06月</span>
                            <a href=""><i class="fas fa-chevron-right"></i></a>
                        </div>
                        
                        <a href="" class="btn btn-outline-primary rounded-pill px-4 ml-4">本日</a>
                    </div>
                    
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> 日別
                        </label>
                        <label class="btn btn-outline-success">
                        <input type="radio" name="options" id="option2" autocomplete="off"> 月別
                        </label>
                        <label class="btn btn-outline-success">
                        <input type="radio" name="options" id="option3" autocomplete="off"> 年別
                        </label>
                    </div>
                    
                </div>
                
                
                
                <div class="table-responsive">
                    <table class="table table-bordered left-fix-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">スタッフ1</th>
                                <th scope="col">スタッフ2</th>
                                <th scope="col">スタッフ3</th>
                                <th scope="col">スタッフ4</th>
                                <th scope="col">スタッフ5</th>
                                <th scope="col">スタッフ6</th>
                                <th scope="col">スタッフ7</th>
                                <th scope="col">スタッフ8</th>
                                <th scope="col">スタッフ9</th>
                                <th scope="col">スタッフ10</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;" class="shift-data">
                            <tr>
                                <th>売上目標</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            
                            
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div><!-- card -->
        
    </div>
</main>

@include('common.bootstrap-table')
  
@endsection