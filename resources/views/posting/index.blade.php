@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>ポスティング枚数管理</span>
            </div>
            <div class="card-body">
                
                <div id="toolbar" class="select">
                    <a href="/posting/create" class="btn btn-success ml-auto"><i class="fas fa-plus-circle"></i> 新規登録</a>
                </div>
        
                <table id="tables"
                    data-show-print="true"
                    data-toggle="table"
                    data-show-toggle="true"
                    data-toolbar="#toolbar"
                    data-show-export="true"
                    data-pagination="true"
                    data-maintain-selected="true"
                    data-page-size="20"
                    data-page-list="[25, 50, 100, ALL]"
                    data-url="/ajax/posting"
                    data-search="true"
                    data-show-columns="true"
                    data-filter-control="true"
                    data-show-search-clear-button="true"
                    data-use-row-attr-func="true"
                    data-reorderable-rows="true"
                    data-resizable="true"
                    data-export-options='{
                     "fileName": "export", 
                     "ignoreColumn": ["state"]
                     }'>
                    <thead>
                        <tr>
                            <th data-field="id" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="vender_id" data-filter-control="select">業者名</th>
                            <th data-field="number">枚数</th>
                            <th data-field="posted_at" data-filter-control="select">報告日</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- card -->
        
    </div>
</main>

@include('common.bootstrap-table')
  
@endsection