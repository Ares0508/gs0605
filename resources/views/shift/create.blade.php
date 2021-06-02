@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>シフトデータ</span>
            </div>
            
            <div class="card-body">
                
                <div class="d-flex justify-content-between mb-3">
                    <a href="" class="btn btn-success">新規登録</a>
                    
                    <div class="form-inline">
                        <select class="form-control mr-2">
                            <option>2021年</option>
                        </select>
                        <select class="form-control mr-2">
                            <option>1月</option>
                        </select>
                        <a href="" class="btn btn-success">GO</a>
                    </div>
                </div>
                
                
                
                <div class="table-responsive">
                    <table class="table table-bordered left-fix-table">
                        <thead>
                            <tr>
                                <th scope="col">スタッフ</th>
                                <th scope="col">1日</th>
                                <th scope="col">2日</th>
                                <th scope="col">3日</th>
                                <th scope="col">4日</th>
                                <th scope="col">5日</th>
                                <th scope="col">6日</th>
                                <th scope="col">7日</th>
                                <th scope="col">8日</th>
                                <th scope="col">9日</th>
                                <th scope="col">10日</th>
                                <th scope="col">11日</th>
                                <th scope="col">12日</th>
                                <th scope="col">13日</th>
                                <th scope="col">14日</th>
                                <th scope="col">15日</th>
                                <th scope="col">16日</th>
                                <th scope="col">17日</th>
                                <th scope="col">18日</th>
                                <th scope="col">19日</th>
                                <th scope="col">20日</th>
                                <th scope="col">21日</th>
                                <th scope="col">22日</th>
                                <th scope="col">23日</th>
                                <th scope="col">24日</th>
                                <th scope="col">25日</th>
                                <th scope="col">26日</th>
                                <th scope="col">27日</th>
                                <th scope="col">28日</th>
                                <th scope="col">29日</th>
                                <th scope="col">30日</th>
                                <th scope="col">31日</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;" class="shift-data">
                            <tr>
                                <th scope="row">スタッフA</th>
                                <td>10:00-19:00
                                    <span class="badge badge-success">営業チーフ</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-success">営業チーフ</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-success">営業チーフ</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-success">営業チーフ</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-success">営業チーフ</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-success">営業チーフ</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">スタッフB</th>
                                <td>10:00-19:00
                                    <span class="badge badge-warning">受付</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-warning">受付</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-warning">受付</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-warning">受付</span>
                                </td>
                                <td>10:00-19:00
                                    <span class="badge badge-warning">受付</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">スタッフC</th>
                                <td>10:00-19:00
                                <span class="badge badge-info">アシスタント</span>
                                </td>
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