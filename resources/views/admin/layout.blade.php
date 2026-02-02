<!DOCTYPE html>
<html lang="ja">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Club Firenze Admin" />
        <link rel="icon" href="{{ url('/assets/images/favicon.ico') }}">
        <title>Club Firenze - 管理パネル</title>
        <link rel="stylesheet" href="{{ url('/assets/css/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/entypo.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-core.css') }}?v=1.5" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-theme.css') }}?v=1.5" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-forms.css') }}?v=1.5" >
        <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}?v=1.5" >
        <link rel="stylesheet" href="{{ url('/assets/css/fullcalendar.min.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.min.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/select2-bootstrap.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/select2.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/datatables.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/dragula.css') }}" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=Noto+Sans+JP:wght@400;500;600;700&display=swap">
        <link rel="stylesheet" href="{{ url('/assets/css/admin-redesign.css') }}?v=7.0" >

        <script src="{{ url('/assets/js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ url('/assets/js/TweenMax.min.js') }}"></script>
        <script src="{{ url('/assets/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/js/joinable.js') }}"></script>
        <script src="{{ url('/assets/js/resizeable.js') }}"></script>
        <script src="{{ url('/assets/js/neon-api.js') }}"></script>
        <script src="{{ url('/assets/js/cookies.min.js') }}"></script>

        <script src="{{ url('/assets/js/neon-chat.js') }}"></script>
        <script src="{{ url('/assets/js/neon-login.js') }}"></script>
        <script src="{{ url('/assets/js/neon-custom.js') }}"></script>
        <script src="{{ url('/assets/js/neon-demo.js') }}"></script>
        <script src="{{ url('/assets/js/jquery.multi-select.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ url('/assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ url('/assets/js/fileinput.js') }}"></script>
        <script src="{{ url('/assets/js/custom-alert.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ url('/assets/js/moment.min.js') }}"></script>
        <script src="{{ url('/assets/js/toastr.js') }}"></script>

        <script src="{{ url('/assets/js/select2.min.js') }}" defer></script>
        <script src="{{ url('/assets/js/dragula.min.js') }}"></script>
        <script src="{{ url('/assets/js/datatables.js') }}"></script>
        <script src="{{ url('/assets/js/fullcalendar.min.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.25.1/full/ckeditor.js"></script>
        <script src="{{ url('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/assets/js/additional-methods.min.js') }}"></script>

    </head>

    <body class="page-body">
        <div class="page-container">
            <div class="sidebar-menu">
                <div class="sidebar-menu-inner">
                    <header class="logo-env">
                        <div class="logo"> <a href="/"> <img src="{{ url('/assets/images/firenze_logo_gold.png') }}" width="120" alt /> </a>  </div>
                        <div class="sidebar-collapse"> <a href="#" class="sidebar-collapse-icon"> <i class="entypo-menu"></i> </a> </div>
                        <div class="sidebar-mobile-menu visible-xs"> <a href="#" class="with-animation"> <i class="entypo-menu"></i> </a> </div>
                    </header>
                    <ul id="main-menu" class="main-menu">

                        {{-- Dashboard --}}
                        <li>
                            <a href="{{ route('admin.dashbord') }}" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v8zm1-17v4a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1z"/></svg>
                                <span class="title ml-1">ダッシュボード</span>
                            </a>
                        </li>

                        {{-- モデル管理 --}}
                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05c1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                                <span class="title ml-1">モデル管理</span>
                            </a>
                            <ul>
                                <li><a href="{{ route('admin.companion.list') }}" class="sidemenu-href"><span class="title">モデル一覧</span></a></li>
                                <li><a href="{{ route('admin.companion.add') }}" class="sidemenu-href"><span class="title">モデル登録</span></a></li>
                            </ul>
                        </li>

                        {{-- 出勤管理 --}}
                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-7 5h5v5h-5v-5z"/></svg>
                                <span class="title ml-1">出勤管理</span>
                            </a>
                            <ul>
                                <li><a href="{{ route('admin.attendance.list') }}" class="sidemenu-href"><span class="title">出勤登録</span></a></li>
                                <li><a href="{{ route('admin.attendance.bulk') }}" class="sidemenu-href"><span class="title">週間一括出勤</span></a></li>
                            </ul>
                        </li>

                        {{-- 予約管理 --}}
                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>
                                <span class="title ml-1">予約管理</span>
                            </a>
                            <ul>
                                <li><a href="{{ route('admin.reception.list') }}" class="sidemenu-href"><span class="title">WEB予約一覧</span></a></li>
                                <li><a href="{{ route('admin.interview.list') }}" class="sidemenu-href"><span class="title">面接予約一覧</span></a></li>
                            </ul>
                        </li>

                        {{-- コンテンツ --}}
                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                                <span class="title ml-1">コンテンツ</span>
                            </a>
                            <ul>
                                <li><a href="{{ route('admin.news.list') }}" class="sidemenu-href"><span class="title">ニュース編集</span></a></li>
                                <li><a href="{{ route('admin.page.list') }}" class="sidemenu-href"><span class="title">ページ編集</span></a></li>
                                <li><a href="{{ route('admin.gallery.list') }}" class="sidemenu-href"><span class="title">ギャラリー</span></a></li>
                            </ul>
                        </li>

                        {{-- 配信管理 --}}
                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
                                <span class="title ml-1">配信管理</span>
                            </a>
                            <ul>
                                <li><a href="{{ route('admin.blog_post.list') }}" class="sidemenu-href"><span class="title">メルマガ管理</span></a></li>
                                <li><a href="{{ route('admin.blog_post.create') }}" class="sidemenu-href"><span class="title">メール定型文編集</span></a></li>
                                <li><a href="{{ route('admin.telegram.cred') }}" class="sidemenu-href"><span class="title">Telegram設定</span></a></li>
                                <li><a href="{{ route('admin.telegram.list') }}" class="sidemenu-href"><span class="title">テンプレート</span></a></li>
                                <li><a href="{{ route('admin.contact.list') }}" class="sidemenu-href"><span class="title">お問い合わせ</span></a></li>
                            </ul>
                        </li>

                        {{-- 設定 --}}
                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19.14 12.94c.04-.3.06-.61.06-.94c0-.32-.02-.64-.07-.94l2.03-1.58a.49.49 0 0 0 .12-.61l-1.92-3.32a.49.49 0 0 0-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 0 0-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96a.49.49 0 0 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.07.62-.07.94s.02.64.07.94l-2.03 1.58a.49.49 0 0 0-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6A3.6 3.6 0 1 1 12 8.4a3.6 3.6 0 0 1 0 7.2z"/></svg>
                                <span class="title ml-1">設定</span>
                            </a>
                            <ul>
                                <li><a href="{{ route('admin.category.list') }}" class="sidemenu-href"><span class="title">カテゴリー</span></a></li>
                                <li><a href="{{ route('admin.recommended_point.list') }}" class="sidemenu-href"><span class="title">おすすめポイント</span></a></li>
                                <li><a href="{{ route('admin.price.list') }}" class="sidemenu-href"><span class="title">料金設定</span></a></li>
                                <li><a href="{{ route('admin.photo_size.edit') }}" class="sidemenu-href"><span class="title">写真サイズ</span></a></li>
                                <li><a href="{{ route('admin.users.list') }}" class="sidemenu-href"><span class="title">管理ユーザー</span></a></li>
                            </ul>
                        </li>

                        {{-- サイトに戻る --}}
                        <li>
                            <a href="{{ route('page.index') }}" class="sidemenu-href sidebar-back-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M20 11H7.83l5.59-5.59L12 4l-8 8l8 8l1.41-1.41L7.83 13H20v-2z"/></svg>
                                <span class="title ml-1">サイトに戻る</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="admin-topbar">
                    <div class="topbar-left">
                        <a href="{{ route('admin.dashbord') }}" class="topbar-brand-link" title="ダッシュボード">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v8zm1-17v4a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1z"/></svg>
                            <span class="topbar-brand-text">Club Firenze</span>
                        </a>
                    </div>
                    <div class="topbar-right">
                        <span class="topbar-user-name">{{ Auth::user()->name ?? '管理者' }}</span>
                        <a href="{{ route('admin.signout') }}" class="topbar-logout">ログアウト</a>
                    </div>
                </div>

                <div class="main-content-inner">
                    @yield('content')
                </div>

            </div>
        </div>


    </body>
    <script>
        @if(session('error'))
            simpleMessage('error',`{{session('error')}}`);
        @endif
        @if(session('success'))
            simpleMessage('success',`{{session('success')}}`);
        @endif
    </script>

</html>
