<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="Laborator.co" />
        <link rel="icon" href="{{ url('/assets/images/favicon.ico') }}">
        <title>管理パネル</title>
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
        <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/assets/js/additional-methods.min.js') }}"></script>
        <!-- レイアウトファイルのheadセクションに追加 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                        <li>
                            <a href="{{ route('page.index') }}" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M44 40.836c-4.893-5.973-9.238-9.362-13.036-10.168c-3.797-.805-7.412-.927-10.846-.365V41L4 23.545L20.118 7v10.167c6.349.05 11.746 2.328 16.192 6.833c4.445 4.505 7.009 10.117 7.69 16.836Z" clip-rule="evenodd"/></svg>
                                <span class="title ml-1">サイトに戻る</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashbord') }}" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>
                                <span class="title  ml-1">ダッシュボード</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
                                <span class="title ml-1">お知らせ管理</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.news.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
                                        <span class="title ml-1">ニュース編集</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="title ml-1">登録関係管理</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.companion.add') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                        <span class="title ml-1">モデル登録</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.companion.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                        <span class="title ml-1">モデル編集</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.attendance.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                        <span class="title ml-1">出勤登録</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.attendance.bulk') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                        <span class="title ml-1">週間一括出勤登録</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.reception.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                        <span class="title ml-1">WEB予約受付一覧</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.interview.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                        <span class="title ml-1">面接予約一覧</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        {{-- <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
                                <span class="title ml-1">店舗ブログ</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
                                        <span class="title ml-1">投稿一覧</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
                                        <span class="title ml-1">新規投稿</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
                                <span class="title ml-1">メール管理</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.blog_post.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
                                        <span class="title ml-1">メルマガ管理</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.blog_post.create') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
                                        <span class="title ml-1">メール定型文編集</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2Z"/></svg>
                                <span class="title ml-1">詳細設定</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.photo_size.edit') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2Z"/></svg>
                                        <span class="title ml-1">基本写真サイズ編集</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('admin.users.list') }}" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="6" r="4"/><path stroke-linecap="round" d="M19.997 18c.003-.164.003-.331.003-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437"/></g></svg>
                                <span class="title  ml-1">ユーザー</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.page.list') }}" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.5 18q-1.05 0-1.775-.725T12 15.5q0-1.05.725-1.775T14.5 13q1.05 0 1.775.725T17 15.5q0 1.05-.725 1.775T14.5 18ZM5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Z"/></svg>
                                <span class="title  ml-1">コンテンツ管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.contact.list') }}" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" d="M1 2h21v16h-8l-8 4v-4H1zm5 8h1v1H6zm5 0h1v1h-1zm5 0h1v1h-1z"/></svg>
                                <span class="title  ml-1">ユーザー連絡先</span>
                            </a>
                        </li>
                         <li class="has-sub">
                            <a href="#" class="sidemenu-href">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.945 2.765a1.552 1.552 0 0 0-1.572-.244L2.456 9.754a1.543 1.543 0 0 0 .078 2.884L6.4 13.98l2.095 6.926c.004.014.017.023.023.036a.486.486 0 0 0 .093.15a.49.49 0 0 0 .226.143c.01.004.017.013.027.015h.006l.003.001a.448.448 0 0 0 .233-.012c.008-.002.016-.002.025-.005a.495.495 0 0 0 .191-.122c.006-.007.016-.008.022-.014l3.013-3.326l4.397 3.405c.267.209.596.322.935.322c.734 0 1.367-.514 1.518-1.231L22.469 4.25a1.533 1.533 0 0 0-.524-1.486zM9.588 15.295l-.707 3.437l-1.475-4.878l7.315-3.81l-4.997 4.998a.498.498 0 0 0-.136.253zm8.639 4.772a.54.54 0 0 1-.347.399a.525.525 0 0 1-.514-.078l-4.763-3.689a.5.5 0 0 0-.676.06L9.83 19.07l.706-3.427l7.189-7.19a.5.5 0 0 0-.584-.797L6.778 13.054l-3.917-1.362A.526.526 0 0 1 2.5 11.2a.532.532 0 0 1 .334-.518l17.914-7.233a.536.536 0 0 1 .558.086a.523.523 0 0 1 .182.518l-3.261 16.015z"/></svg>
                                <span class="title ml-1">Telegram管理</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.telegram.cred') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.945 2.765a1.552 1.552 0 0 0-1.572-.244L2.456 9.754a1.543 1.543 0 0 0 .078 2.884L6.4 13.98l2.095 6.926c.004.014.017.023.023.036a.486.486 0 0 0 .093.15a.49.49 0 0 0 .226.143c.01.004.017.013.027.015h.006l.003.001a.448.448 0 0 0 .233-.012c.008-.002.016-.002.025-.005a.495.495 0 0 0 .191-.122c.006-.007.016-.008.022-.014l3.013-3.326l4.397 3.405c.267.209.596.322.935.322c.734 0 1.367-.514 1.518-1.231L22.469 4.25a1.533 1.533 0 0 0-.524-1.486zM9.588 15.295l-.707 3.437l-1.475-4.878l7.315-3.81l-4.997 4.998a.498.498 0 0 0-.136.253zm8.639 4.772a.54.54 0 0 1-.347.399a.525.525 0 0 1-.514-.078l-4.763-3.689a.5.5 0 0 0-.676.06L9.83 19.07l.706-3.427l7.189-7.19a.5.5 0 0 0-.584-.797L6.778 13.054l-3.917-1.362A.526.526 0 0 1 2.5 11.2a.532.532 0 0 1 .334-.518l17.914-7.233a.536.536 0 0 1 .558.086a.523.523 0 0 1 .182.518l-3.261 16.015z"/></svg>
                                        <span class="title ml-1">Telegram管理</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.telegram.list') }}" class="sidemenu-href">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.945 2.765a1.552 1.552 0 0 0-1.572-.244L2.456 9.754a1.543 1.543 0 0 0 .078 2.884L6.4 13.98l2.095 6.926c.004.014.017.023.023.036a.486.486 0 0 0 .093.15a.49.49 0 0 0 .226.143c.01.004.017.013.027.015h.006l.003.001a.448.448 0 0 0 .233-.012c.008-.002.016-.002.025-.005a.495.495 0 0 0 .191-.122c.006-.007.016-.008.022-.014l3.013-3.326l4.397 3.405c.267.209.596.322.935.322c.734 0 1.367-.514 1.518-1.231L22.469 4.25a1.533 1.533 0 0 0-.524-1.486zM9.588 15.295l-.707 3.437l-1.475-4.878l7.315-3.81l-4.997 4.998a.498.498 0 0 0-.136.253zm8.639 4.772a.54.54 0 0 1-.347.399a.525.525 0 0 1-.514-.078l-4.763-3.689a.5.5 0 0 0-.676.06L9.83 19.07l.706-3.427l7.189-7.19a.5.5 0 0 0-.584-.797L6.778 13.054l-3.917-1.362A.526.526 0 0 1 2.5 11.2a.532.532 0 0 1 .334-.518l17.914-7.233a.536.536 0 0 1 .558.086a.523.523 0 0 1 .182.518l-3.261 16.015z"/></svg>
                                        <span class="title  ml-1">Telegramテンプレート</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="row flex-cl">
                    <div class="col-md-9 col-sm-8 clearfix width75-adj">
                        <div class="input-group-btn top-menu-btn-group">
                            <a href="{{ route('admin.companion.list') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="ml-1">モデル一覧</span>
                            </a>
                            <a href="{{ route('admin.companion.add') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="ml-1">モデル登録</span>
                            </a>
                            <a href="{{ route('admin.attendance.list') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="ml-1">出勤登録</span>
                            </a>
                            <a href="{{ route('admin.attendance.bulk') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="ml-1">一括出勤登錄</span>
                            </a>
                            <a href="{{ route('admin.news.list') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16.786 3.725a1.75 1.75 0 0 0-2.846.548L12.347 7.99A4.745 4.745 0 0 0 8.07 9.291l-1.71 1.71a.75.75 0 0 0 0 1.06l2.495 2.496l-5.385 5.386a.75.75 0 1 0 1.06 1.06l5.386-5.385l2.495 2.495a.75.75 0 0 0 1.061 0l1.71-1.71a4.745 4.745 0 0 0 1.302-4.277l3.716-1.592a1.75 1.75 0 0 0 .548-2.846l-3.962-3.963Zm-1.468 1.139a.25.25 0 0 1 .407-.078l3.963 3.962a.25.25 0 0 1-.079.407l-4.315 1.85a.75.75 0 0 0-.41.941a3.25 3.25 0 0 1-.763 3.396l-1.18 1.18l-4.99-4.99l1.18-1.18a3.25 3.25 0 0 1 3.396-.762a.75.75 0 0 0 .942-.41l1.85-4.316Z" clip-rule="evenodd"/></svg>
                                <span class="ml-1">ニュース編集</span>
                            </a>
                            <a href="#" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
                                <span class="ml-1">メルマガ管理</span>
                            </a>
                       {{--  </div>
                        <div class="input-group-btn top-menu-btn-group"> --}}
                            <a href="{{ route('admin.reception.list') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="ml-1">WEB予約受付情報一覧</span>
                            </a>
                            <a href="{{ route('admin.interview.list') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                <span class="ml-1">面接予約情報一覧</span>
                            </a>

                            <a href="{{ route('admin.dashbord') }}" class="btn btn-default top-menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 clearfix hidden-xs">
                        <ul class="list-inline links-list pull-right">
                            <li>
                                <a href="{{ route('admin.signout') }}" class="btn btn-danger sidemenu-href">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M10 20a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm5-11H5v2h10V9z"/></svg>
                                    <span class="title ml-1">ログアウト</span> </a>
                            </li>
                        </ul>
                    </div>
                </div>

                @yield('content')

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
