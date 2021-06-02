@extends('layouts.app')

@section('content')

<main class="page-content">
    <div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12 mb-4">
                
                <div class="mb-2 font-weight-bold">
                    <span style="font-size: 170%; color: #28A745;">
                        <?php
                        $today = date("Y年m月");
                        print_r($today);
                        ?>
                    </span>
                    <span>
                    の個人目標
                    </span>
                </div>
                
                <div class="row mb-3 text-center">
                    <div class="col-xs-4 col-sm-1-5 col-md-1-5">
                        <div class="bs-callout bs-callout-success text-success shadow-sm">
                            <i class="fas fa-file-alt pr-2"></i><span>契約数</span><br />
                            <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">件</small>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-1-5 col-md-1-5">
                        <div class="bs-callout bs-callout-success text-success shadow-sm">
                            <i class="fas fa-truck pr-2"></i><span>目標売上</span><br />
                            <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">円</small>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-1-5 col-md-1-5">
                        <div class="bs-callout bs-callout-success text-success shadow-sm">
                            <i class="fas fa-file pr-2"></i><span>売上合計</span><br />
                            <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">円</small>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-1-5 col-md-1-5">
                        <div class="bs-callout bs-callout-success text-success shadow-sm">
                            <i class="fas fa-file pr-2"></i><span>目標達成率</span><br />
                            <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">％</small>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-1-5 col-md-1-5">
                        <div class="bs-callout bs-callout-success text-success shadow-sm">
                            <i class="fas fa-file pr-2"></i><span>目標不足額</span><br />
                            <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">円</small>
                        </div>
                    </div>
                </div>
                
                <div class="text-right my-2">
                    <button type="button" class="btn btn-success text-center">
                        売上目標を設定する
                    </button>
                </div>
                
                
            </div><!--12-->

            <div class="col-md-12 mb-4">
                <div class="card-outline-success">
                    <div class="card-outline-success-header">
                        <span>ルート表</span>
                    </div>
                    <div class="card-body">
                        @include('common.calendar')
                    </div>
                </div><!-- card -->
            </div><!--12-->
        </div>
     
    </div>
  </main>
  <!-- page-content" -->

<!-- </div>page-wrapper -->

@endsection
