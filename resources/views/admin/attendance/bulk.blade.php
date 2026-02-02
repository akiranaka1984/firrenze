@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>一括出勤登録</h2>
    </div>

    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-body">
            <div class="bulk-attendance-toolbar">
                <form method="GET" action="{{ route('admin.attendance.bulk') }}" class="bulk-attendance-search">
                    <div class="input-group">
                        <input type="text" name="search_q" class="form-control" value="{{ $search_q }}" placeholder="名前で検索...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </span>
                    </div>
                    @if(!empty($search_q))
                        <a href="{{ route('admin.attendance.bulk') }}" class="btn btn-default bulk-reset-link">検索解除</a>
                    @endif
                </form>
                <div class="bulk-attendance-actions">
                    <span class="bulk-hint-text">操作後「出勤確定」で保存されます</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bulk-attendance-table-wrap">
        <table class="table table-bordered bulk-attendance-table" id="table-2">
            <thead>
                <tr>
                    <th class="bulk-th-name">モデル名</th>
                    @foreach($jadates as $jadate)
                        <th class="bulk-th-date">{{ $jadate }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($companions as $companion)
                    <tr>
                        <td class="bulk-td-companion">
                            <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}" class="bulk-companion-link">
                                @php
                                    if(!empty($companion['home_image'])){
                                        $imgPath = '/storage/photos/'.($companion['id']).'/'.($companion['home_image']['photo']);
                                    }else{
                                        $imgPath = '/storage/photos/default/images.jpg';
                                    }
                                @endphp
                                <img src="{{ url($imgPath) }}" class="bulk-companion-thumb" />
                                <div class="bulk-companion-info">
                                    <span class="bulk-companion-name">{{ $companion->name }}({{ $companion->age }})</span>
                                    <span class="bulk-companion-kana">{!! $companion->kana !!}</span>
                                    <span class="bulk-companion-stats">T{{ $companion->height }} B{{ $companion->bust }}({{ $companion->cup }}) W{{ $companion->waist }} H{{ $companion->hip }}</span>
                                </div>
                            </a>
                        </td>

                        @foreach($xdates as $dkey=>$xdate)
                            @php $flag = false; @endphp
                            @foreach($companion->attendances as $attendance)
                                @if($xdate == $attendance->date)
                                    @php $flag = true; @endphp
                                    <td class="trow bulk-td-cell @if(($dkey == 'today') || (check_saturday($xdate))) bulk-cell-today @elseif(check_sunday($xdate)) bulk-cell-sunday @endif" data-date="{{ $xdate }}" data-companion="{{ $companion->id }}">
                                        <div class="bulk-cell-inner">
                                            <div class="bulk-checks">
                                                <label class="bulk-check-label"><input type="checkbox" name="undetermined_hours" class="undetermined_hours" {{ $attendance->undetermined_hours == 1 ? 'checked' : '' }}> 時間未定</label>
                                                <label class="bulk-check-label"><input type="checkbox" name="hidden_hours" class="hidden_hours" {{ $attendance->hidden_hours == 1 ? 'checked' : '' }}> 時間非表示</label>
                                                <label class="bulk-check-label"><input type="checkbox" name="without_end_time_display" class="without_end_time_display" {{ $attendance->without_end_time_display == 1 ? 'checked' : '' }}> 終了非表示</label>
                                            </div>
                                            <div class="bulk-time-selects">
                                                <select name="start_date" class="form-control start_date">
                                                    <option value="">開始</option>
                                                    @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                                        <option value="{{ $t }}" {{ $attendance->start_time == $t ? 'selected' : '' }}>{{ $t }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="bulk-time-sep">~</span>
                                                <select name="end_date" class="form-control end_date">
                                                    <option value="">終了</option>
                                                    @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                                        <option value="{{ $t }}" {{ $attendance->end_time == $t ? 'selected' : '' }}>{{ $t }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-xs btn-default reset_btn">リセット</button>
                                        </div>
                                    </td>
                                @endif
                            @endforeach

                            @if($flag == false)
                                <td class="trow bulk-td-cell @if(($dkey == 'today') || (check_saturday($xdate))) bulk-cell-today @elseif(check_sunday($xdate)) bulk-cell-sunday @endif" data-date="{{ $xdate }}" data-companion="{{ $companion->id }}">
                                    <div class="bulk-cell-inner">
                                        <div class="bulk-checks">
                                            <label class="bulk-check-label"><input type="checkbox" name="undetermined_hours" class="undetermined_hours"> 時間未定</label>
                                            <label class="bulk-check-label"><input type="checkbox" name="hidden_hours" class="hidden_hours"> 時間非表示</label>
                                            <label class="bulk-check-label"><input type="checkbox" name="without_end_time_display" class="without_end_time_display"> 終了非表示</label>
                                        </div>
                                        <div class="bulk-time-selects">
                                            <select name="start_date" class="form-control start_date">
                                                <option value="">開始</option>
                                                @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                                    <option value="{{ $t }}">{{ $t }}</option>
                                                @endforeach
                                            </select>
                                            <span class="bulk-time-sep">~</span>
                                            <select name="end_date" class="form-control end_date">
                                                <option value="">終了</option>
                                                @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                                    <option value="{{ $t }}">{{ $t }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-xs btn-default reset_btn">リセット</button>
                                    </div>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-left">
                        Showing {{ $companions->firstItem() }} to {{ $companions->currentPage() * $companions->perPage() }} of {{ $companions->total() }} entries
                    </td>
                    <td colspan="{{ count($jadates) > 2 ? count($jadates) - 1 : 1 }}" class="text-right">
                        {{ $companions->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <button type="button" class="btn btn-orange btn-confirm-attendance" style="position:fixed;bottom:30px;right:30px;z-index:1000;padding:12px 24px;font-size:15px;box-shadow:0 4px 16px rgba(0,0,0,0.3);border-radius:8px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
        出勤確定
    </button>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.undetermined_hours', function(){
                updateBulkRecord($(this));
            });
            $(document).on('click','.hidden_hours', function(){
                updateBulkRecord($(this));
            });
            $(document).on('click','.without_end_time_display', function(){
                updateBulkRecord($(this));
            });
            $(document).on('change','.start_date', function(){
                updateBulkRecord($(this));
            });
            $(document).on('change','.end_date', function(){
                updateBulkRecord($(this));
            });
            $(document).on('click', '.reset_btn', function() {
                let container = $(this).closest('.trow');
                let date = container.attr('data-date');
                let companion = container.attr('data-companion');

                container.find('input[type="checkbox"]').prop('checked', false);
                container.find('select').val('');

                if (confirm('この出勤情報を削除しますか？')) {
                    $.ajax({
                        type: 'POST',
                        url: `{{ route('admin.attendance.bulk.delete') }}`,
                        headers: {"Content-Type": "application/json"},
                        data: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                            date: date,
                            companion: companion
                        }),
                        success: function (response) {
                            if (response.status === 1) {
                                simpleMessage('success', response.message);
                            } else {
                                simpleMessage('error', '削除に失敗しました');
                            }
                        },
                        error: function() {
                            simpleMessage('error', 'サーバーエラーが発生しました');
                        }
                    });
                }
            });
        });

        function updateBulkRecord(mthis) {
            let container = mthis.closest('.trow');
            let date = container.attr('data-date');
            let companion = container.attr('data-companion');
            let undetermined_hours = container.find('.undetermined_hours').prop("checked");
            let hidden_hours = container.find('.hidden_hours').prop("checked");
            let without_end_time_display = container.find('.without_end_time_display').prop("checked");
            let start_date = container.find('.start_date').val();
            let end_date = container.find('.end_date').val();

            $.ajax({
                type: 'POST',
                url: `{{ route('admin.attendance.bulk.save') }}`,
                headers: {"Content-Type": "application/json"},
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    date: date,
                    companion: companion,
                    undetermined_hours: undetermined_hours,
                    hidden_hours: hidden_hours,
                    without_end_time_display: without_end_time_display,
                    start_date: start_date,
                    end_date: end_date
                }),
                success: function (response) {
                    simpleMessage('success',`{{__('Save Changes')}}`);
                }
            });
        }
    </script>
@endsection
