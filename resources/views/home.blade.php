@extends('layouts.app')

@section('content')


@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card-outline-success">
                            <div class="card-outline-success-header">
                                <span>メインメニュー</span>
                            </div>
                            <div class="card-body d-flex justify-content-between text-center">
                                <button onclick="location.href='/appointment/create'" style="width:18%;" type="button" class="btn btn-success py-3 px-0">
                                    <i class="fas fa-calendar fa-2x mb-2"></i><br />
                                    <span>新規受付入力</span>
                                </button>
                                <button onclick="location.href='/posting/create'" style="width:18%; background: orange; color: #fff;" type="button" class="btn py-3 px-0">
                                    <i class="fas fa-mail-bulk fa-2x mb-2"></i><br />
                                    <span>ポスティング</span>
                                </button>
                                <button onclick="location.href=''" style="width:18%; background:#9B95C9; color: #fff;" type="button" class="btn py-3 px-0">
                                    <i class="fas fa-truck fa-2x mb-2"></i><br />
                                    <span>便担当</span>
                                </button>
                                <button onclick="location.href=''" style="width:18%; background:#9B95C9; color: #fff;" type="button" class="btn py-3 px-0">
                                    <i class="far fa-file-alt fa-2x mb-2"></i><br />
                                    <span>勤怠入力</span>
                                </button>
                                <button onclick="location.href=''" style="width:18%; background:#9B95C9; color: #fff;" type="button" class="btn py-3 px-0">
                                    <i class="fas fa-paste fa-2x mb-2"></i><br />
                                    <span>業務日報入力</span>
                                </button>
                                
                            </div>
                        </div><!-- card -->
                    </div><!--12-->
                    <div class="col-md-6 mb-4">
                        <div class="card-outline-success">
                            <div class="card-outline-success-header">
                                <span>マスタ管理</span>
                            </div>
                            <div class="card-body d-flex justify-content-between flex-wrap">
                                <button onclick="location.href='/customer'" style="width:48%;" type="button" class="btn btn-success text-center mb-2 px-0">
                                    <span>顧客管理</span>
                                </button>
                                <button onclick="location.href='/staff'" style="width:48%;" type="button" class="btn btn-success text-center mb-2 px-0">
                                    <span>スタッフ管理</span>
                                </button>
                                <button onclick="location.href='/posting-vender'" style="width:48%;" type="button" class="btn btn-success text-center mb-2 px-0">
                                    <span>業者管理</span>
                                </button>
                                <button onclick="location.href='/workshift'" style="width:48%;" type="button" class="btn btn-success text-center mb-2 px-0">
                                    <span>勤怠管理</span>
                                </button>
                                <button onclick="location.href=''" style="width:48%;" type="button" class="btn btn-success text-center px-0">
                                    <span>売上管理</span>
                                </button>
                            </div>
                        </div><!-- card -->
                    </div><!--6-->
                    <div class="col-md-6 mb-4">
                        <div class="card-outline-success">
                            <div class="card-outline-success-header">
                                <span>帳票関連</span>
                            </div>
                            <div class="card-body d-flex justify-content-between flex-wrap">
                                <button onclick="location.href=''" style="width:48%;" type="button" class="btn btn-outline-success text-center mb-2 px-0">
                                    <span>ルート表出力</span>
                                </button>
                                <button onclick="location.href=''" style="width:48%;" type="button" class="btn btn-outline-success text-center mb-2 px-0">
                                    <span>業務日報出力</span>
                                </button>
                                <button onclick="location.href=''" style="width:48%;" type="button" class="btn btn-outline-success text-center mb-2 px-0">
                                    <span>反響出力</span>
                                </button>
                                <button onclick="location.href=''" style="width:48%;" type="button" class="btn btn-outline-success text-center mb-2 px-0">
                                    <span>個人売上出力</span>
                                </button>
                                <button onclick="location.href=''" style="width:48%;" type="button" class="btn btn-outline-success text-center px-0">
                                    <span>アポ率出力</span>
                                </button>
                            </div>
                        </div><!-- card -->
                    </div><!--6-->
                </div>
            </div><!--7-->
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="row d-flex justify-content-between mb-3 px-2 text-center">
                            <div class="col-md-4 px-2">
                                <div class="bs-callout bs-callout-danger text-danger shadow-sm">
                                    <i class="fas fa-file-alt pr-2 fa-2x"></i><span>本日受付</span><br />
                                    <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">件</small>
                                </div>
                            </div>
                            <div class="col-md-4 px-2">
                                <div style="color: orange" class="bs-callout bs-callout-warning shadow-sm">
                                    <i class="fas fa-truck pr-2 fa-2x"></i><span>本日訪問</span><br />
                                    <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">件</small>
                                </div>
                            </div>
                            <div class="col-md-4 px-2">
                                <div class="bs-callout bs-callout-info text-primary shadow-sm">
                                    <i class="fas fa-file pr-2 fa-2x"></i><span>結果待ち</span><br />
                                    <div class="d-inline pr-1" style="font-size:2rem;">15</div><small class="d-inline">件</small>
                                </div>
                            </div>
                        </div>
                    </div><!--12-->
                    <div class="col-md-12 mb-4">
                        <div class="card-outline-success">
                            <div class="card-outline-success-header">
                                <span>お知らせ</span>
                            </div>
                            <div class="card-body">
                                
                                
                                
                            </div>
                        </div><!-- card -->
                    </div><!--12-->
                </div>
            </div><!--5-->
            
            <div class="col-md-12 mb-4">
                <div class="card-outline-success">
                    <div class="card-outline-success-header">
                        <span>ルート表</span>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div><!-- card -->
            </div>
            
        </div>
        

        <div class="row justify-content-center">
            <div class="col-md-5">
                

            </div><!-- right side component -->
        </div><!-- row justify-content -->
        
     
    </div>
  </main>
  <!-- page-content" -->

<!-- </div>page-wrapper -->

@endsection
