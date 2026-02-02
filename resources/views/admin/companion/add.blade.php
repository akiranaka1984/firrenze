@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>モデル登録</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form role="form" method="post" action="{{ route('admin.companion.save') }}" enctype="multipart/form-data" id="frmCompanion">
        @csrf

        {{-- セクション1: 基本情報 --}}
        <div class="frm-section-card">
            <div class="frm-section-header">基本情報</div>
            <div class="frm-section-body">
                <div class="frm-row">
                    <div class="frm-field frm-field-half">
                        <label for="frmName">名前 <span class="text-danger">※必須</span></label>
                        <input type="text" name="frm_name" class="form-control" id="frmName" placeholder="表示名全体を漢字で入力" value="{{ old('frm_name') }}">
                    </div>
                    <div class="frm-field frm-field-half">
                        <label for="frmKana">かな</label>
                        <input type="text" name="frm_kana" class="form-control" id="frmKana" placeholder="ローマ字、ひらがな等" value="{{ old('frm_kana') }}">
                    </div>
                </div>
                <div class="frm-row">
                    <div class="frm-field frm-field-full">
                        <label>ランク/コース</label>
                        <div class="frm-inline-group">
                            <select name="category_id" class="form-control" style="flex:1;">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <a href="{{ route('admin.category.list') }}" class="btn btn-default btn-sm">ランク編集</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- セクション2: スペック --}}
        <div class="frm-section-card">
            <div class="frm-section-header">スペック</div>
            <div class="frm-section-body">
                <div class="frm-row">
                    <div class="frm-field frm-field-third">
                        <label for="frmAge">年齢</label>
                        <div class="frm-unit-wrap">
                            <input type="text" name="frm_age" class="form-control" id="frmAge" placeholder="例: 22" value="{{ old('frm_age') }}">
                            <span class="frm-unit">歳</span>
                        </div>
                    </div>
                    <div class="frm-field frm-field-third">
                        <label for="frmHeight">身長</label>
                        <div class="frm-unit-wrap">
                            <input type="text" name="frm_height" class="form-control" id="frmHeight" placeholder="例: 160" value="{{ old('frm_height') }}">
                            <span class="frm-unit">cm</span>
                        </div>
                    </div>
                    <div class="frm-field frm-field-third">
                        <label for="frmBust">バスト</label>
                        <div class="frm-unit-wrap">
                            <input type="text" name="frm_bust" class="form-control" id="frmBust" placeholder="例: 86" value="{{ old('frm_bust') }}">
                            <span class="frm-unit">cm</span>
                        </div>
                    </div>
                </div>
                <div class="frm-row">
                    <div class="frm-field frm-field-third">
                        <label for="frmCup">カップ</label>
                        <select name="frm_cup" id="frmCup" class="form-control">
                            @foreach(['A','B','C','D','E','F','G','H','I','J','K','L'] as $cup)
                                <option value="{{ $cup }}" {{ old('frm_cup') == $cup ? 'selected' : '' }}>{{ $cup }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="frm-field frm-field-third">
                        <label for="frmWaist">ウエスト</label>
                        <div class="frm-unit-wrap">
                            <input type="text" name="frm_waist" class="form-control" id="frmWaist" placeholder="例: 58" value="{{ old('frm_waist') }}">
                            <span class="frm-unit">cm</span>
                        </div>
                    </div>
                    <div class="frm-field frm-field-third">
                        <label for="frmHip">ヒップ</label>
                        <div class="frm-unit-wrap">
                            <input type="text" name="frm_hip" class="form-control" id="frmHip" placeholder="例: 85" value="{{ old('frm_hip') }}">
                            <span class="frm-unit">cm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- セクション3: おすすめポイント --}}
        <div class="frm-section-card">
            <div class="frm-section-header">おすすめポイント <span class="frm-section-hint">最大4つまで選択</span></div>
            <div class="frm-section-body">
                <div class="frm-tag-grid">
                    @foreach($recommendedPoints as $point)
                        @php $tag = $point->name; @endphp
                        <label class="frm-tag-item">
                            <input name="frm_rookie[]" type="checkbox" value="{{ $tag }}">
                            <span>{{ $tag }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- セクション4: PR情報 --}}
        <div class="frm-section-card">
            <div class="frm-section-header">PR情報</div>
            <div class="frm-section-body">
                <div class="frm-row">
                    <div class="frm-field frm-field-half">
                        <label for="frmHobby">趣味</label>
                        <input type="text" name="frm_hobby" class="form-control" id="frmHobby" placeholder="趣味を簡潔に記入" value="{{ old('frm_hobby') }}">
                    </div>
                    <div class="frm-field frm-field-half">
                        <label for="frmSalePoint">セールスポイント</label>
                        <input type="text" name="frm_sale_point" class="form-control" id="frmSalePoint" placeholder="セールスポイント" value="{{ old('frm_sale_point') }}">
                    </div>
                </div>
                <div class="frm-row">
                    <div class="frm-field frm-field-full">
                        <label>フォントカラー</label>
                        <div class="frm-radio-group">
                            <label class="frm-radio"><input type="radio" name="frm_font_color" value="黒" checked> 黒</label>
                            <label class="frm-radio"><input type="radio" name="frm_font_color" value="デフォルト"> デフォルト</label>
                            <label class="frm-radio"><input type="radio" name="frm_font_color" value="青"> 青</label>
                        </div>
                    </div>
                </div>
                <div class="frm-row">
                    <div class="frm-field frm-field-full">
                        <label for="frmShortMessage">店舗メッセージ</label>
                        <textarea name="short_message" class="ckeditor form-control" id="frmShortMessage">{{ old('short_message') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- セクション5: 追加設定 --}}
        <div class="frm-section-card">
            <div class="frm-section-header">追加設定</div>
            <div class="frm-section-body">
                <div class="frm-row">
                    <div class="frm-field frm-field-third">
                        <label for="frmEntryDate">入店日 <span class="text-danger">※必須</span></label>
                        <div class="input-group">
                            <input type="text" name="frm_entry_date" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="カレンダーから選択" id="frmEntryDate" value="{{ old('frm_entry_date') }}">
                            <div class="input-group-addon"><a href="#"><i class="entypo-calendar"></i></a></div>
                        </div>
                    </div>
                    <div class="frm-field frm-field-third">
                        <label for="frmPosition">前(現)職</label>
                        <input type="text" name="frm_position" class="form-control" id="frmPosition" value="{{ old('frm_position') }}">
                    </div>
                    <div class="frm-field frm-field-third">
                        <label for="frmLookALive">似ている芸能人</label>
                        <input type="text" name="frm_celebrities_who_look_alike" class="form-control" id="frmLookALive" placeholder="似ている芸能人" value="{{ old('frm_celebrities_who_look_alike') }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- セクション6: 写真 --}}
        <div class="frm-section-card">
            <div class="frm-section-header">写真管理</div>
            <div class="frm-section-body">
                <div class="frm-row">
                    <div class="frm-field frm-field-half">
                        <label for="frmPhoto">ファイル指定</label>
                        <input type="file" name="frm_photo" class="form-control" id="frmPhoto">
                        <span class="frm-help-text">推奨: 300px × 400px（サイドピックアップ: 207px × 356px）</span>
                    </div>
                    <div class="frm-field frm-field-half">
                        <label for="frmTitle">写真タイトル</label>
                        <input type="text" name="frm_title" class="form-control" id="frmTitle" placeholder="写真タイトルを入力" value="{{ old('frm_title') }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- 送信ボタン --}}
        <div class="frm-submit-bar">
            <button type="submit" class="btn btn-orange btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
                モデル登録
            </button>
        </div>
    </form>

    <script>
        $(document).ready(function(){
            $('#frmCompanion').validate({
                ignore: [],
                debug: false,
                rules: {
                    category_id: { required: true },
                    frm_name: { required: true },
                    frm_kana: { required: true },
                    frm_age: { required: true },
                    frm_height: { required: true },
                    frm_bust: { required: true },
                    frm_cup: { required: true },
                    frm_waist: { required: true },
                    frm_hip: { required: true },
                    'frm_rookie[]': { required: true, maxlength:4 },
                    frm_sale_point: { required: true, maxlength:100 },
                    frm_entry_date: { required: true }
                },
                messages: {
                    category_id: { required: "{{ __('This field is required') }}" },
                    frm_name: { required: "{{ __('This field is required') }}" },
                    frm_kana: { required: "{{ __('This field is required') }}" },
                    frm_age: { required: "{{ __('This field is required') }}" },
                    frm_height: { required: "{{ __('This field is required') }}" },
                    frm_bust: { required: "{{ __('This field is required') }}" },
                    frm_cup: { required: "{{ __('This field is required') }}" },
                    frm_waist: { required: "{{ __('This field is required') }}" },
                    frm_hip: { required: "{{ __('This field is required') }}" },
                    'frm_rookie[]': { required: "{{ __('This field is required') }}", maxlength: "{{ __('Max 4 checkbox allowed') }}" },
                    frm_sale_point: { required: "{{ __('This field is required') }}", maxlength: "{{ __('Max 100 characters allowed') }}" },
                    frm_entry_date: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-field').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        })
    </script>
@endsection
