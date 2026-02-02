@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>出勤登録</h2>
    </div>

    <div class="att-layout">
        {{-- 左: カレンダー --}}
        <div class="att-calendar-pane">
            <div class="frm-section-card">
                <div class="frm-section-header">カレンダー</div>
                <div class="frm-section-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        {{-- 右: 登録フォーム --}}
        <div class="att-form-pane">
            <div class="frm-section-card">
                <div class="frm-section-header">出勤登録</div>
                <div class="frm-section-body">
                    <form role="form" method="post" action="{{ route('admin.attendance.save') }}" id="frmAttendance">
                        @csrf
                        <input type="hidden" name="position" value="{{ $attendance->position ?? '' }}">
                        <input type="hidden" name="selected_date" class="selected_date" value="{{ $currentDate }}">

                        <h3 class="att-date-display selected_date_text"></h3>

                        <div class="frm-field" style="margin-bottom:12px;">
                            <label for="frmCompanionId">モデル名</label>
                            <select name="companion_id" data-allow-clear="true" data-placeholder="" id="frmCompanionId">
                                <option></option>
                                @foreach($companionLists as $companionList)
                                    <option value="{{ $companionList->id }}">{{ $companionList->name }}({{ $companionList->age }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="frm-field" style="margin-bottom:12px;">
                            <label>出勤時間</label>
                            <div class="att-time-row">
                                <select name="start_time" class="form-control start_time">
                                    @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                        <option value="{{ $t }}" {{ $t == '12:00' ? 'selected' : '' }}>{{ $t }}</option>
                                    @endforeach
                                </select>
                                <span class="att-time-sep">~</span>
                                <select name="end_time" class="form-control end_time">
                                    @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                        <option value="{{ $t }}" {{ $t == '05:00' ? 'selected' : '' }}>{{ $t }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="att-checks">
                            <label class="att-check-label"><input type="checkbox" class="undetermined_hours" name="undetermined_hours"> 時間未定</label>
                            <label class="att-check-label"><input type="checkbox" class="hidden_hours" name="hidden_hours"> 時間非表示</label>
                            <label class="att-check-label"><input type="checkbox" class="without_end_time_display" name="without_end_time_display"> 終了時間非表示</label>
                        </div>

                        <div class="frm-field" style="margin-bottom:14px;">
                            <label for="frmMsg">出勤メッセージ</label>
                            <input type="text" name="message" class="form-control" id="frmMsg" placeholder="プロフィール用/10文字目安">
                        </div>

                        <button type="submit" class="btn btn-orange btn-block">出勤登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- 編集モーダル --}}
    <div class="modal fade" id="editAttendanceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">出勤情報の編集</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ route('admin.attendance.save') }}" id="frmAttendanceEdit">
                        @csrf
                        <input type="hidden" name="selected_date" class="selected_date" value="{{ $currentDate }}">

                        <div class="frm-field" style="margin-bottom:12px;">
                            <label for="frmCompanionId2">モデル名</label>
                            <select name="companion_id" data-allow-clear="true" data-placeholder="" id="frmCompanionId2">
                                <option></option>
                                @foreach($companionLists as $companionList)
                                    <option value="{{ $companionList->id }}">{{ $companionList->name }}({{ $companionList->age }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="frm-field" style="margin-bottom:12px;">
                            <label>出勤時間</label>
                            <div class="att-time-row">
                                <select name="start_time" class="form-control start_time">
                                    @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                        <option value="{{ $t }}" {{ $t == '12:00' ? 'selected' : '' }}>{{ $t }}</option>
                                    @endforeach
                                </select>
                                <span class="att-time-sep">~</span>
                                <select name="end_time" class="form-control end_time">
                                    @foreach(['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00'] as $t)
                                        <option value="{{ $t }}" {{ $t == '05:00' ? 'selected' : '' }}>{{ $t }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="att-checks">
                            <label class="att-check-label"><input type="checkbox" class="undetermined_hours" name="undetermined_hours"> 時間未定</label>
                            <label class="att-check-label"><input type="checkbox" class="hidden_hours" name="hidden_hours"> 時間非表示</label>
                            <label class="att-check-label"><input type="checkbox" class="without_end_time_display" name="without_end_time_display"> 終了時間非表示</label>
                        </div>

                        <div class="frm-field" style="margin-bottom:14px;">
                            <label for="frmMsgEdit">出勤メッセージ</label>
                            <input type="text" name="message" class="form-control" id="frmMsgEdit" placeholder="プロフィール用/10文字目安">
                        </div>

                        <button type="submit" class="btn btn-orange btn-block">出勤登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- 出勤者リスト --}}
    <div class="frm-section-card" style="margin-top:20px;">
        <div class="frm-section-header" style="display:flex; align-items:center; justify-content:space-between;">
            <span>出勤者リスト</span>
            <button type="button" class="btn btn-orange btn-sm save_all_position">並び順を確定する</button>
        </div>
        <div class="frm-section-body">
            <div id="left-events" class="row dragula"></div>
        </div>
    </div>

    <script>
        let nPsitionObj = {}
        let $events_data = [];
        let attendance_list = []
        $(document).ready(function(){

            $('#frmCompanionId').select2({
                placeholder: "",
                allowClear: true
            });

            var calendar = $('#calendar');
            calendar.fullCalendar({
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                dayClick: function(day) {
                    $('.selected_date').val(day.format())

                    let jp_date = moment(String(day.format())).format('YYYY年M月D日')
                    let day_name = ['日','月','火','水','木','金','土'][moment(String(day.format())).format('d')]
                    $('.selected_date_text').html(jp_date+' ('+day_name+') の出勤登録')

                    let jp_date_original = moment(String(day.format())).format('YYYY-MM-DD')
                    fetchAttendanceList(jp_date_original)
                },
                buttonText: {
                    prevYear: '&laquo;',
                    nextYear: '&raquo;',
                    today:    '今日',
                    month:    '月',
                    week:     '週',
                    day:      '日'
                },
                monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
                dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
                selectable: true,
                selectHelper: true,
                editable: true,
                firstDay: 1,
                height: 500,
                events: function(start, end, timezone, callback) {
                    let startDate = moment(start).format('YYYY-MM-DD');
                    let endDate = moment(end).format('YYYY-MM-DD');

                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: "{{ route('admin.attendance.list.api') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            startDate: startDate,
                            endDate: endDate
                        },
                        success:function(data){
                            $events_data = data
                            callback($events_data);
                        }
                    });
                },
                eventAfterAllRender: function(event) {
                    var row, cell, date;
                    $('.fc-content-skeleton').each(function(i) {
                        row = $(this);
                        $('thead td', row).each(function(k) {
                            cell = $(this);
                            let cmdate = cell.data('date');
                            let xdata = $events_data.find((item)=>{ return item.date == cmdate })
                            if(xdata){
                                let count = xdata.count
                                $('tbody td', row).eq(k).data('count', count);
                                $('tbody td', row).eq(k).html(count+'名出勤');
                            }
                        });
                    });
                }
            });

            $('#frmAttendance').validate({
                ignore: [],
                debug: false,
                rules: {
                    companion_id: { required: true },
                    start_time: { required: true }
                },
                messages: {
                    companion_id: { required: "{{ __('This field is required') }}" },
                    start_time: { required: "{{ __('This field is required') }}" }
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

            let org_date = $('.selected_date').val();
            if (!org_date) {
                org_date = moment().format('YYYY-MM-DD');
                $('.selected_date').val(org_date);
            }
            let jp_date = moment(org_date).format('YYYY年M月D日');
            let day_name = ['日','月','火','水','木','金','土'][moment(org_date).format('d')];
            $('.selected_date_text').html(jp_date + ' (' + day_name + ') の出勤登録');
            fetchAttendanceList(org_date);

            dragula([document.getElementById("left-events")])
            .on('drag', function (el) {
                el.className += ' el-drag-ex-2';
                el.className = el.className.replace('ex-moved', '');
            })
            .on('drop', function (el, target, source, sibling) {
                el.className = el.className.replace('el-drag-ex-2', '');
                el.className += ' ex-moved';
                setTimeout(() => { resetPosition() }, 200);
            })
            .on('over', function (el, container) {
                container.className += ' ex-over';
            })
            .on('out', function (el, container) {
                container.className = container.className.replace('ex-over', '');
            })
            .on('cancel', function (el) {
                el.className = el.className.replace('el-drag-ex-2', '');
            });

            $(document).on('click', '.edit_btn', function() {
                let id = $(this).attr('data-id');
                let attendance = attendance_list.find((item) => { return item.id == id });

                $('.selected_date').val(attendance.date);
                let jp_date = moment(attendance.date).format('YYYY年M月D日');
                let day_name = ['日', '月', '火', '水', '木', '金', '土'][moment(attendance.date).format('d')];
                $('.selected_date_text').html(jp_date + ' (' + day_name + ') の出勤登録');

                $('#frmCompanionId').val(attendance.companion_id).trigger('change');
                $('#frmCompanionId2').val(attendance.companion_id).trigger('change');
                $('.start_time').val(attendance.start_time);
                $('.end_time').val(attendance.end_time);

                $('.undetermined_hours').prop('checked', (attendance.undetermined_hours == 1));
                $('.hidden_hours').prop('checked', (attendance.hidden_hours == 1));
                $('.without_end_time_display').prop('checked', (attendance.without_end_time_display == 1));
                $('#frmMsg').val(attendance.message);
                $('#frmMsgEdit').val(attendance.message);

                $('#editAttendanceModal').modal('show');
            });

            $(document).on('click','.delete_btn', function(){
                let mthis = $(this)
                let id = mthis.attr('data-id')
                if (!confirm('この出勤情報を削除しますか？')) return;
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: "{{ route('admin.attendance.delete') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success:function(data){
                        mthis.closest('.item_div').remove()
                        simpleMessage('success', data.message);
                        $('#calendar').fullCalendar('removeEvents');
                        $('#calendar').fullCalendar('refetchEvents');
                    }
                })
            })

            $(document).on('click', '.save_all_position', function(){
                $.ajax({
                    type: 'POST',
                    url: `{{ route('admin.attendance.position.save') }}`,
                    headers: {"Content-Type": "application/json"},
                    data: JSON.stringify({
                        "_token": "{{ csrf_token() }}",
                        date: $('.selected_date').val(),
                        data: nPsitionObj
                    }),
                    success: function (response) {
                        simpleMessage('success',`{{__('Save Changes')}}`);
                    }
                })
            })
        })

        function resetPosition() {
            nPsitionObj = {};
            $('.item_div').each(function(index, rtag){
                let id = $(this).attr('data-id');
                nPsitionObj[id] = index + 1;
            })
        }

        function fetchAttendanceList(selectedDate) {
            $('#left-events').html('');

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: "{{ route('admin.attendance.list.details') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    selectedDate: selectedDate
                },
                success: function(data) {
                    data.sort((a, b) => a.position - b.position);
                    attendance_list = data;

                    if (data.length === 0) {
                        $('#left-events').html('<div class="col-md-12 text-center" style="padding:30px;color:var(--text-muted);">この日の出勤者はまだ登録されていません</div>');
                        return;
                    }

                    data.forEach((item, index) => {
                        let photoURL = item.companion.home_image
                            ? `{{ url('/storage/photos') }}/` + item.companion_id + "/" + item.companion.home_image.photo
                            : `{{ url('/storage/photos') }}/default/images.jpg`;

                        let html = `
                            <div class="col-md-2 item_div" data-id="${item.id}">
                                <div class="att-list-card">
                                    <a href="{{ route('admin.companion.edit') }}?stab=1&id=${item.companion_id}" class="att-list-img-link">
                                        <img src="${photoURL}" class="att-list-img" />
                                    </a>
                                    <div class="att-list-body">
                                        <a href="{{ route('admin.companion.edit') }}?stab=1&id=${item.companion_id}" class="att-list-name">${item.companion.name}</a>
                                        <span class="att-list-time">${item.start_time} ~ ${(item.end_time ? item.end_time : '未設定')}</span>
                                        <div class="att-list-actions">
                                            <button type="button" class="btn btn-xs btn-default edit_btn" data-id="${item.id}">編集</button>
                                            <button type="button" class="btn btn-xs btn-danger delete_btn" data-id="${item.id}">削除</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#left-events').append(html);
                    });

                    resetPosition();
                }
            });
        }
    </script>
@endsection
