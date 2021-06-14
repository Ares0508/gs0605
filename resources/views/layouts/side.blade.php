<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">

            <div class="sidebar-brand">
                <a style="pointer-events: none;">サイドメニュー</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded"
                        src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                        alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name"></span>
                    <span class="user-role">Administrator</span>
                    <span class="user-status text-success">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                </div>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li>
                        <a href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-speedometer2" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                <path fill-rule="evenodd"
                                    d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                            </svg>
                            <span>ダッシュボード</span>
                        </a>
                    </li>

                    <!--<li class="sidebar-dropdown">
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                  <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
              <span>ワイズトレーディング</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="/schedule">スケジュール表</a>
                </li>
                <li>
                  <a href="/schedule/create">スケジュール登録</a>
                </li>
                <li>
                  <a href="/schedule">スケジュール確認</a>
                </li>
                <li>
                  <a href="/consignee">コンサイニー管理</a>
                </li>
              </ul>
            </div>
          </li>-->
                @php
                    $permission = [];
                    if (auth()->user()->permission) {
                        $permission = json_decode(auth()->user()->permission, true);
                    }
                @endphp
                @if (auth()->user()->is_admin || isset($permission['appointment']) && isset($permission['result']))
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>
                            <span>受付管理</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->is_admin || isset($permission['appointment']['post']))
                                    <li>
                                        <a href="/appointment/create">新規受付入力</a>
                                    </li>
                                @endif
                                @if (auth()->user()->is_admin || isset($permission['appointment']['get']))
                                <li>
                                    <a href="/appointment">受付一覧</a>
                                </li>
                                @endif
                                <li>
                                    <a href="/">ルート表</a>
                                </li>
                                @if (auth()->user()->is_admin || isset($permission['result']['get']))
                                <li>
                                    <a href="/result">結果報告一覧</a>
                                </li>
                                @endif
                                <li>
                                    <a href="/">便担当登録</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path
                                    d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                            </svg>
                            <span>売上管理</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">売上管理</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @if (auth()->user()->is_admin || isset($permission['posting']))
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-mailbox" viewBox="0 0 16 16">
                                <path
                                    d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
                                <path
                                    d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
                            </svg>
                            <span>ポスティング</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->is_admin || isset($permission['posting']['post']))
                                <li>
                                    <a href="/posting/create">ポスティング入力</a>
                                </li>
                                @endif
                                @if (auth()->user()->is_admin || isset($permission['posting']['get']))
                                <li>
                                    <a href="/posting">ポスティング一覧</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-journal-text" viewBox="0 0 16 16">
                                <path
                                    d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>
                            <span>マスタ管理</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->is_admin || isset($permission['customer']['get']))
                                <li>
                                    <a href="/customer">顧客管理</a>
                                </li>
                                @endif
                                @if (auth()->user()->is_admin || isset($permission['posting']['get']))
                                <li>
                                    <a href="/posting-vender">業者管理</a>
                                </li>
                                @endif
                                @if (auth()->user()->is_admin || isset($permission['emp']['get']))
                                <li>
                                    <a href="/emp">スタッフ管理</a>
                                </li>
                                @endif
                                @if (auth()->user()->is_admin || isset($permission['role']['get']))
                                <li>
                                    <a href="/role">権限管理</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="/workshift">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-calendar-date" viewBox="0 0 16 16">
                                <path
                                    d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                            <span>シフト表</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            <span>帳票出力</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                @if (auth()->user()->is_admin || isset($permission['form']['get']))
                                <li>
                                    <a href="/">ルート表出力</a>
                                </li>
                                @endif
                                <li>
                                    <a href="/">業務日報出力</a>
                                </li>
                                <li>
                                    <a href="/">反響出力</a>
                                </li>
                                <li>
                                    <a href="/">個人売上出力</a>
                                </li>
                                <li>
                                    <a href="/">アポ率出力</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="header-menu">
                        <span style="padding-right: 0;">Shortcut</span>
                        <span style="padding: 0;"><a href="/shortcut" style="padding-left: 5px;"
                                class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg></a></span>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                <path
                                    d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                            </svg>
                            <span>お気に入りメニュー</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
            </a>
            <a data-toggle="modal" data-target="#testModal">
                <i class="fas fa-map-marked-alt"></i>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
            </a>
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->



    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                        <div class="modal-title" id="myModalLabel">距離計算（車での移動時間）</div>
                    </h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="button" class="btn btn-success">受付入力へ</button>
                </div>
            </div>
        </div>
    </div>





    <script>
        jQuery(function($) {
            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                    .parent()
                    .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });

            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });
        });

    </script>
