@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>ダッシュボード</h2>
    </div>

    {{-- Stats Cards --}}
    <div class="dashboard-stats">
        <a href="{{ route('admin.companion.list') }}" class="stat-card">
            <div class="stat-icon stat-icon-models">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05c1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $companionCount }}</div>
                <div class="stat-label">公開中モデル</div>
            </div>
        </a>
        <a href="{{ route('admin.reception.list') }}" class="stat-card">
            <div class="stat-icon stat-icon-reservations">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $reservationCount }}</div>
                <div class="stat-label">未対応 WEB予約</div>
            </div>
        </a>
        <a href="{{ route('admin.interview.list') }}" class="stat-card">
            <div class="stat-icon stat-icon-interviews">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $interviewCount }}</div>
                <div class="stat-label">未対応 面接予約</div>
            </div>
        </a>
        <a href="{{ route('admin.contact.list') }}" class="stat-card">
            <div class="stat-icon stat-icon-contacts">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/></svg>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $contactCount }}</div>
                <div class="stat-label">お問い合わせ</div>
            </div>
        </a>
    </div>

    {{-- Quick Actions --}}
    <div class="dashboard-section-title">よく使う機能</div>
    <div class="dashboard-grid">

        <a href="{{ route('admin.companion.list') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05c1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <div class="dash-card-title">モデル一覧</div>
            <div class="dash-card-desc">モデルの編集・表示設定・並び替え</div>
        </a>

        <a href="{{ route('admin.companion.add') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <div class="dash-card-title">モデル登録</div>
            <div class="dash-card-desc">新規モデルの追加</div>
        </a>

        <a href="{{ route('admin.attendance.list') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-7 5h5v5h-5v-5z"/></svg>
            </div>
            <div class="dash-card-title">出勤登録</div>
            <div class="dash-card-desc">カレンダーで出勤シフト管理</div>
        </a>

        <a href="{{ route('admin.attendance.bulk') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
            </div>
            <div class="dash-card-title">週間一括出勤</div>
            <div class="dash-card-desc">一週間分の出勤を一括登録</div>
        </a>

        <a href="{{ route('admin.reception.list') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>
            </div>
            <div class="dash-card-title">WEB予約</div>
            <div class="dash-card-desc">WEB予約受付の確認と対応</div>
        </a>

        <a href="{{ route('admin.interview.list') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
            </div>
            <div class="dash-card-title">面接予約</div>
            <div class="dash-card-desc">面接予約の確認と対応</div>
        </a>

        <a href="{{ route('admin.news.list') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="m22 3l-1.67 1.67L18.67 3L17 4.67L15.33 3l-1.66 1.67L12 3l-1.67 1.67L8.67 3L7 4.67L5.33 3L3.67 4.67L2 3v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V3zM11 19H4v-2h7v2zm9-4H4v-2h16v2zm0-4H4V9h16v2z"/></svg>
            </div>
            <div class="dash-card-title">ニュース編集</div>
            <div class="dash-card-desc">ニュースの追加・編集・並び替え</div>
        </a>

        <a href="{{ route('admin.page.list') }}" class="dash-card">
            <div class="dash-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
            </div>
            <div class="dash-card-title">ページ編集</div>
            <div class="dash-card-desc">サイトコンテンツの編集</div>
        </a>

    </div>

    {{-- Settings Section --}}
    <div class="dashboard-section-title">設定・管理</div>
    <div class="dashboard-grid dashboard-grid-sm">

        <a href="{{ route('admin.category.list') }}" class="dash-card dash-card-compact">
            <div class="dash-card-icon-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5s4.5-2.01 4.5-4.5s-2.01-4.5-4.5-4.5zm0 7a2.5 2.5 0 0 1 0-5a2.5 2.5 0 0 1 0 5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/></svg>
            </div>
            <div class="dash-card-title">カテゴリー</div>
        </a>

        <a href="{{ route('admin.price.list') }}" class="dash-card dash-card-compact">
            <div class="dash-card-icon-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15c0-1.09 1.01-1.85 2.7-1.85c1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61c0 2.31 1.91 3.46 4.7 4.13c2.5.6 3 1.48 3 2.41c0 .69-.49 1.79-2.7 1.79c-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55c0-2.84-2.43-3.81-4.7-4.4z"/></svg>
            </div>
            <div class="dash-card-title">料金設定</div>
        </a>

        <a href="{{ route('admin.photo_size.edit') }}" class="dash-card dash-card-compact">
            <div class="dash-card-icon-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M21 15h2v2h-2v-2zm0-4h2v2h-2v-2zm2 8h-2v2c1 0 2-1 2-2zM13 3h2v2h-2V3zm8 4h2v2h-2V7zm0-4v2h2c0-1-1-2-2-2zM1 7h2v2H1V7zm16-4h2v2h-2V3zm0 16h2v2h-2v-2zM3 3C2 3 1 4 1 5h2V3zm6 0h2v2H9V3zM5 3h2v2H5V3zm-4 8v8c0 1.1.9 2 2 2h12V11H1zm2 8l2.5-3.21l1.79 2.15l2.5-3.22L13 19H3z"/></svg>
            </div>
            <div class="dash-card-title">写真サイズ</div>
        </a>

        <a href="{{ route('admin.gallery.list') }}" class="dash-card dash-card-compact">
            <div class="dash-card-icon-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M22 16V4c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2zm-11-4l2.03 2.71L16 11l4 5H8l3-4zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"/></svg>
            </div>
            <div class="dash-card-title">ギャラリー</div>
        </a>

        <a href="{{ route('admin.blog_post.list') }}" class="dash-card dash-card-compact">
            <div class="dash-card-icon-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
            </div>
            <div class="dash-card-title">メルマガ</div>
        </a>

        <a href="{{ route('admin.users.list') }}" class="dash-card dash-card-compact">
            <div class="dash-card-icon-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="6" r="4"/><path stroke-linecap="round" d="M19.997 18c.003-.164.003-.331.003-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437"/></g></svg>
            </div>
            <div class="dash-card-title">管理ユーザー</div>
        </a>

    </div>
@endsection
