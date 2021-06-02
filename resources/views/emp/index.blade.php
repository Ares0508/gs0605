@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">
        
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>従業員一覧</span>
            </div>
            <div class="card-body">
                
                <div id="toolbar" class="select">
                    <a href="/emp/create" class="btn btn-success ml-auto"><i class="fas fa-plus-circle"></i> 新規登録</a>
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
                    data-url="/ajax/emp"
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
                            <th data-field="employee_id" data-sortable="true">スタッフID</th>
                            <th data-field="name" data-sortable="true">名前</th>
                            <th data-field="phone" data-sortable="true">電話番号</th>
                            <th data-field="email" data-sortable="true">メールアドレス</th>
                            <th data-field="dept" data-sortable="true">部署</th>
                            <th data-field="role_id" data-sortable="true">権限</th>
                            <th data-field="start_day" data-sortable="true">入社日</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- card -->
        
    </div>
</main>



@include('common.bootstrap-table')
  
@endsection