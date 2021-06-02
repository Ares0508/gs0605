@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>業務日報</span>
            </div>
            <div class="card-body">
                
                <ul>
                    <li>{{$eigyo_appt_sum}}</li>
                </ul>
                
        
            </div>
        </div><!-- card -->
        
    </div>
</main>

  
@endsection