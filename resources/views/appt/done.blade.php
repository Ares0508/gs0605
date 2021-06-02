@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>新規受付入力</span>
            </div>
            <div class="card-body">
                
                <div class="text-center mb-4 text-success">
                    <i class="fas fa-check-circle fa-5x"></i>
                </div>
                
                <div class="alert alert-success" role="alert">
                    受付入力が完了いたしました。
                </div>
             
                
                <div class="d-flex justify-content-center mt-4">
                    <a href="" class="btn btn-outline-success mr-2">受付一覧へ</a>
                    <a href="" class="btn btn-success ml-2">トップページへ</a>
                </div>
                
                
                
            </div>
        </div><!-- card -->
        
</div>
</main>



@endsection
    