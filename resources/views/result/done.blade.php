@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                
                <div class="text-center mb-4 text-success">
                    <i class="fas fa-check-circle fa-5x"></i>
                </div>
                
                <div class="alert alert-success" role="alert">
                    入力が完了いたしました。<br>
                    お近くの担当スタッフへをお呼びくださいませ。
                </div>
                
            </div>
            <div class="card-body">
                
                <div class="d-flex justify-content-center mt-4">
                    <a href="" class="btn btn-success ml-2">スタッフ確認画面へ</a>
                </div>
                
            </div>
        </div><!-- card -->
        
</div>
</main>



@endsection
    