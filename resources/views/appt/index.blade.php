@extends('layouts.app')

@section('content')
@include('layouts.side')


<main class="page-content">
    <div class="container-fluid">

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>受付一覧</span>
            </div>
            <div class="card-body">

                <div class="text-right">
                    <a href="/appointment/create" class="btn btn-success ml-auto"><i class="fas fa-plus-circle"></i> 新規登録</a>
                </div>

                <div id="toolbar">
                    <select class="form-control">
                        <option value="all">すべてを出力</option>
                        <option value="selected">選択したものを出力</option>
                    </select>
                </div>

                <table id="table"
                    data-toggle="table"
                    data-toolbar="#toolbar"
                    data-show-export="true"
                    data-pagination="true"
                    data-maintain-selected="true"
                    data-page-size="20"
                    data-page-list="[25, 50, 100, ALL]"
                    data-export-options='{
                        "fileName": "export",
                        "ignoreColumn": ["state"]
                    }'
                    data-url="/ajax/appt"
                    data-search="true"
                    data-show-multi-sort="true"
                    data-show-columns="true"
                    data-filter-control="true"
                    data-show-search-clear-button="true"
                    data-resizable="true">
                    <thead>
                        <tr>
                            <th data-field="id" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="created_at" data-filter-control="input">商品名</th>
                            <th data-field="name" data-filter-control="select">価格</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- card -->

    </div>
</main>

@include('common.bootstrap-table')

@endsection
