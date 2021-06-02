@extends('layouts.app')

@section('content')
@include('layouts.side')

<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>結果報告一覧</span>
            </div>
            <div class="card-body">
                
                <div id="toolbar" class="select">
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
                    data-url="/ajax/result"
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
                            <th data-field="customer_id" data-filter-control="input">名前</th>
                            <th data-field="user_id" data-filter-control="select">受付担当</th>
                            <th data-field="truck_id" data-filter-control="input">便</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- card -->
        
    </div>
</main>

@include('common.bootstrap-table')
  
@endsection