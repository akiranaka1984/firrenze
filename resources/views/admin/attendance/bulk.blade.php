@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>一括出勤登録</h2>
    </div>

    <form role="form" method="get" action="{{ route('admin.attendance.bulk') }}" class="form-horizontal form-groups-bordered" >
        <div class="row mt-1">
            <div class="col-md-3">
                <input type="text" name="search_q" class="form-control txt_search_q" value="{{ $search_q }}" placeholder="名前の一部または全体を入力してください">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-success sidemenu-href search_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0c.41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg>
                    <span class="title ml-1">検索</span>
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-red sidemenu-href reset_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M10 20a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm5-11H5v2h10V9z"></path></svg>
                    <span class="title ml-1">検索解除</span>
                </button>
            </div>
        </div>
    </form>

    <div class="tile-stats tile-primary frm-head mt-1"> 出勤登録</div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" >
                <div class="panel-body">
                    <p>操作後、[出勤確定]ボタンを押すことで出勤が登録されます</p>                    
                    <p>表上部の「女性名」の部分をクリックすると名前順に並び替える事が出来ます。</p>
                </div>
            </div>
        </div>        
        <div class="col-md-12">
            <button type="button" class="btn btn-orange btn-icon-align">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path></svg>
                <span class="title ml-1">出勤確定</span>
            </button>
        </div>
    </div>

    <table class="table table-bordered table-striped mt-1" id="table-2">
        <thead>
            <tr>
                <th>モデル名</th>
                @foreach($jadates as $jadate)
                    <th>{{ $jadate }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($companions as $companion)
                <tr>
                    <td>
                        <div class="panel panel-primary" >
                            <div class="panel-body text-center">
                                <h3 class="text-center"><a href="{{ route('admin.companion.edit',['id'=>$companion['id'], 'stab' => 1]) }}" class="text-info">{{ $companion->name }}({{ $companion->age }})</a></h3>
                                <h4 class="text-center">{!! $companion->kana !!} </h4>
                                <a href="{{ route('admin.companion.edit') }}?stab=1&id={{ $companion->id }}"> 
                                    @php
                                        if(!empty($companion['home_image'])){
                                            $imgPath = '/storage/photos/'.($companion['id']).'/'.($companion['home_image']['photo']);       
                                        }else{
                                            $imgPath = '/storage/photos/default/images.jpg';       
                                        }
                                    @endphp
                                    <img src="{{ url($imgPath) }}" class="thmb_class" /> 
                                </a> 
                                <p class="text-center mt-1">T{{ $companion->height }}.B{{ $companion->bust }}({{ $companion->cup }}).W{{ $companion->waist }}.H{{ $companion->hip }} </p>
                            </div>
                        </div>
                    </td>

                    @foreach($xdates as $dkey=>$xdate)
                        @php $flag = false;  @endphp                
                        @foreach($companion->attendances as $attendance)
                            @if($xdate == $attendance->date) 
                                 @php  $flag = true; @endphp       
                                    <td class="trow" data-date="{{ $xdate }}" data-companion="{{ $companion->id }}" >
                                        <div class="panel panel-primary" >

                                                @if(($dkey == 'today') || (check_saturday($xdate)))
                                                    <div class="panel-body form-horizontal p-5px bulk-bg-today">
                                                @elseif(check_sunday($xdate))
                                                    <div class="panel-body form-horizontal p-5px bulk-bg-sunday">
                                                @else
                                                    <div class="panel-body form-horizontal p-5px">
                                                @endif
                                            
                                                <div class="form-group m-0">
                                                    <div class="col-sm-12 text-left">
                                                        <div class="checkbox"> <label> <input type="checkbox" name="undetermined_hours" class="undetermined_hours"  {{ $attendance->undetermined_hours == 1 ? 'checked' : '' }} >時間未定</label> </div> 
                                                        <div class="checkbox"> <label> <input type="checkbox" name="hidden_hours" class="hidden_hours"  {{ $attendance->hidden_hours == 1 ? 'checked' : '' }} >時間非表示 </label> </div> 
                                                        <div class="checkbox"> <label> <input type="checkbox" name="without_end_time_display" class="without_end_time_display"  {{ $attendance->without_end_time_display == 1 ? 'checked' : '' }}>終了時間非表示</label> </div> 
                                                    </div> 
                                                </div>

                                                <select name="start_date" class="form-control mt-1 start_date">
                                                    <option></option>
                                                    <option value="12:00" {{ $attendance->start_time == '12:00' ? 'selected' : '' }}>12:00</option>
                                                    <option value="12:30" {{ $attendance->start_time == '12:30' ? 'selected' : '' }}>12:30</option>
                                                    <option value="13:00" {{ $attendance->start_time == '13:00' ? 'selected' : '' }}>13:00</option>
                                                    <option value="13:30" {{ $attendance->start_time == '13:30' ? 'selected' : '' }}>13:30</option>
                                                    <option value="14:00" {{ $attendance->start_time == '14:00' ? 'selected' : '' }}>14:00</option>
                                                    <option value="14:30" {{ $attendance->start_time == '14:30' ? 'selected' : '' }}>14:30</option>
                                                    <option value="15:00" {{ $attendance->start_time == '15:00' ? 'selected' : '' }}>15:00</option>
                                                    <option value="15:30" {{ $attendance->start_time == '15:30' ? 'selected' : '' }}>15:30</option>
                                                    <option value="16:00" {{ $attendance->start_time == '16:00' ? 'selected' : '' }}>16:00</option>
                                                    <option value="16:30" {{ $attendance->start_time == '16:30' ? 'selected' : '' }}>16:30</option>
                                                    <option value="17:00" {{ $attendance->start_time == '17:00' ? 'selected' : '' }}>17:00</option>
                                                    <option value="17:30" {{ $attendance->start_time == '17:30' ? 'selected' : '' }}>17:30</option>
                                                    <option value="18:00" {{ $attendance->start_time == '18:00' ? 'selected' : '' }}>18:00</option>
                                                    <option value="18:30" {{ $attendance->start_time == '18:30' ? 'selected' : '' }}>18:30</option>
                                                    <option value="19:00" {{ $attendance->start_time == '19:00' ? 'selected' : '' }}>19:00</option>
                                                    <option value="19:30" {{ $attendance->start_time == '19:30' ? 'selected' : '' }}>19:30</option>
                                                    <option value="20:00" {{ $attendance->start_time == '20:00' ? 'selected' : '' }}>20:00</option>
                                                    <option value="20:30" {{ $attendance->start_time == '20:30' ? 'selected' : '' }}>20:30</option>
                                                    <option value="21:00" {{ $attendance->start_time == '21:00' ? 'selected' : '' }}>21:00</option>
                                                    <option value="21:30" {{ $attendance->start_time == '21:30' ? 'selected' : '' }}>21:30</option>
                                                    <option value="22:00" {{ $attendance->start_time == '22:00' ? 'selected' : '' }}>22:00</option>
                                                    <option value="22:30" {{ $attendance->start_time == '22:30' ? 'selected' : '' }}>22:30</option>
                                                    <option value="23:00" {{ $attendance->start_time == '23:00' ? 'selected' : '' }}>23:00</option>
                                                    <option value="23:30" {{ $attendance->start_time == '23:30' ? 'selected' : '' }}>23:30</option>
                                                    <option value="00:00" {{ $attendance->start_time == '00:00' ? 'selected' : '' }}>00:00</option>
                                                    <option value="00:30" {{ $attendance->start_time == '00:30' ? 'selected' : '' }}>00:30</option>
                                                    <option value="01:00" {{ $attendance->start_time == '01:00' ? 'selected' : '' }}>01:00</option>
                                                    <option value="01:30" {{ $attendance->start_time == '01:30' ? 'selected' : '' }}>01:30</option>
                                                    <option value="02:00" {{ $attendance->start_time == '02:00' ? 'selected' : '' }}>02:00</option>
                                                    <option value="02:30" {{ $attendance->start_time == '02:30' ? 'selected' : '' }}>02:30</option>
                                                    <option value="03:00" {{ $attendance->start_time == '03:00' ? 'selected' : '' }}>03:00</option>
                                                    <option value="03:30" {{ $attendance->start_time == '03:30' ? 'selected' : '' }}>03:30</option>
                                                    <option value="04:00" {{ $attendance->start_time == '04:00' ? 'selected' : '' }}>04:00</option>
                                                    <option value="04:30" {{ $attendance->start_time == '04:30' ? 'selected' : '' }}>04:30</option>
                                                    <option value="05:00" {{ $attendance->start_time == '05:00' ? 'selected' : '' }}>05:00</option>
                                                </select>                                                
                                                <h3 class="text-center m-0">~</h3>
                                                <select name="end_date"  class="form-control end_date">
                                                    <option></option>
                                                    <option value="00:00" {{ $attendance->end_time == '00:00' ? 'selected' : '' }} >00:00</option>
                                                    <option value="00:30" {{ $attendance->end_time == '00:30' ? 'selected' : '' }} >00:30</option>
                                                    <option value="01:00" {{ $attendance->end_time == '01:00' ? 'selected' : '' }} >01:00</option>
                                                    <option value="01:30" {{ $attendance->end_time == '01:30' ? 'selected' : '' }} >01:30</option>
                                                    <option value="02:00" {{ $attendance->end_time == '02:00' ? 'selected' : '' }} >02:00</option>
                                                    <option value="02:30" {{ $attendance->end_time == '02:30' ? 'selected' : '' }} >02:30</option>
                                                    <option value="03:00" {{ $attendance->end_time == '03:00' ? 'selected' : '' }} >03:00</option>
                                                    <option value="03:30" {{ $attendance->end_time == '03:30' ? 'selected' : '' }} >03:30</option>
                                                    <option value="04:00" {{ $attendance->end_time == '04:00' ? 'selected' : '' }} >04:00</option>
                                                    <option value="04:30" {{ $attendance->end_time == '04:30' ? 'selected' : '' }} >04:30</option>
                                                    <option value="05:00" {{ $attendance->end_time == '05:00' ? 'selected' : '' }} >05:00</option>
                                                    <option value="12:00" {{ $attendance->end_time == '12:00' ? 'selected' : '' }} >12:00</option>
                                                    <option value="12:30" {{ $attendance->end_time == '12:30' ? 'selected' : '' }} >12:30</option>
                                                    <option value="13:00" {{ $attendance->end_time == '13:00' ? 'selected' : '' }} >13:00</option>
                                                    <option value="13:30" {{ $attendance->end_time == '13:30' ? 'selected' : '' }} >13:30</option>
                                                    <option value="14:00" {{ $attendance->end_time == '14:00' ? 'selected' : '' }} >14:00</option>
                                                    <option value="14:30" {{ $attendance->end_time == '14:30' ? 'selected' : '' }} >14:30</option>
                                                    <option value="15:00" {{ $attendance->end_time == '15:00' ? 'selected' : '' }} >15:00</option>
                                                    <option value="15:30" {{ $attendance->end_time == '15:30' ? 'selected' : '' }} >15:30</option>
                                                    <option value="16:00" {{ $attendance->end_time == '16:00' ? 'selected' : '' }} >16:00</option>
                                                    <option value="16:30" {{ $attendance->end_time == '16:30' ? 'selected' : '' }} >16:30</option>
                                                    <option value="17:00" {{ $attendance->end_time == '17:00' ? 'selected' : '' }} >17:00</option>
                                                    <option value="17:30" {{ $attendance->end_time == '17:30' ? 'selected' : '' }} >17:30</option>
                                                    <option value="18:00" {{ $attendance->end_time == '18:00' ? 'selected' : '' }} >18:00</option>
                                                    <option value="18:30" {{ $attendance->end_time == '18:30' ? 'selected' : '' }} >18:30</option>
                                                    <option value="19:00" {{ $attendance->end_time == '19:00' ? 'selected' : '' }} >19:00</option>
                                                    <option value="19:30" {{ $attendance->end_time == '19:30' ? 'selected' : '' }} >19:30</option>
                                                    <option value="20:00" {{ $attendance->end_time == '20:00' ? 'selected' : '' }} >20:00</option>
                                                    <option value="20:30" {{ $attendance->end_time == '20:30' ? 'selected' : '' }} >20:30</option>
                                                    <option value="21:00" {{ $attendance->end_time == '21:00' ? 'selected' : '' }} >21:00</option>
                                                    <option value="21:30" {{ $attendance->end_time == '21:30' ? 'selected' : '' }} >21:30</option>
                                                    <option value="22:00" {{ $attendance->end_time == '22:00' ? 'selected' : '' }} >22:00</option>
                                                    <option value="22:30" {{ $attendance->end_time == '22:30' ? 'selected' : '' }} >22:30</option>
                                                    <option value="23:00" {{ $attendance->end_time == '23:00' ? 'selected' : '' }} >23:00</option>
                                                    <option value="23:30" {{ $attendance->end_time == '23:30' ? 'selected' : '' }} >23:30</option>
                                                </select>
                                                
                                                <div class="text-right mt-1">
                                                    <button type="button" class="btn btn-link text-red reset_btn">リセット</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                            @endif
                        @endforeach

                        @if($flag == false)                 
                            <td class="trow" data-date="{{ $xdate }}" data-companion="{{ $companion->id }}">
                                <div class="panel panel-primary" >

                                        @if(($dkey == 'today') || (check_saturday($xdate)))
                                            <div class="panel-body form-horizontal p-5px bulk-bg-today">
                                        @elseif(check_sunday($xdate))
                                            <div class="panel-body form-horizontal p-5px bulk-bg-sunday">
                                        @else
                                            <div class="panel-body form-horizontal p-5px">
                                        @endif

                                        <div class="form-group m-0">
                                            <div class="col-sm-12 text-left">
                                                <div class="checkbox"> <label> <input type="checkbox" name="undetermined_hours" class="undetermined_hours"  >時間未定</label> </div> 
                                                <div class="checkbox"> <label> <input type="checkbox" name="hidden_hours" class="hidden_hours"  >時間非表示 </label> </div> 
                                                <div class="checkbox"> <label> <input type="checkbox" name="without_end_time_display" class="without_end_time_display"  >終了時間非表示</label> </div> 
                                            </div> 
                                        </div>

                                        <select name="start_date" class="form-control mt-1 start_date">
                                            <option></option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                        </select>                                        
                                        <h3 class="text-center m-0">~</h3>
                                        <select name="end_date" class="form-control end_date">
                                            <option></option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                        </select>                                        
                                        <div class="text-right mt-1">
                                            <button type="button" class="btn btn-link text-red reset_btn">リセット</button>
                                        </div>
                                    </div>
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
                <td colspan="6" class="text-right">
                    {{ $companions->links() }}
                </td>
            </tr>    
        </tfoot>                                 
    </table>

    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            
        </div>                           
    </div>    

    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <button type="button" class="btn btn-orange btn-icon-align">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"></path></svg>
                <span class="title ml-1">出勤確定</span>
            </button>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
             $(document).on('click','.undetermined_hours', function(){
                let mthis = $(this)
                updateBulkRecord(mthis)
             })
             
             $(document).on('click','.hidden_hours', function(){
                let mthis = $(this)
                updateBulkRecord(mthis)
            })
            $(document).on('click','.without_end_time_display', function(){
                let mthis = $(this)
                updateBulkRecord(mthis)
            })
            $(document).on('change','.start_date', function(){
                let mthis = $(this)
                updateBulkRecord(mthis)
            })
            $(document).on('change','.end_date', function(){
                let mthis = $(this)
                updateBulkRecord(mthis)
            })
            $(document).on('click', '.reset_btn', function() {
                // クリックされたボタンの行全体を対象とする
                let container = $(this).closest('.trow');
                
                // 日付とコンパニオンIDを取得
                let date = container.attr('data-date');
                let companion = container.attr('data-companion');
                
                // チェックボックスを未チェックに戻す
                container.find('input[type="checkbox"]').prop('checked', false);
                
                // セレクトボックスの値を初期状態に戻す
                container.find('select').val('');
                
                // 確認ダイアログを表示（オプション）
                if (confirm('この出勤情報を削除しますか？')) {
                    // レコードを完全に削除するAjaxリクエスト
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
        })
        function updateBulkRecord(mthis)
        {
            let date = mthis.closest('.trow').attr('data-date')
            let companion = mthis.closest('.trow').attr('data-companion')
            let undetermined_hours =   mthis.closest('.trow').find('.undetermined_hours').prop("checked")
            let hidden_hours =   mthis.closest('.trow').find('.hidden_hours').prop("checked")
            let without_end_time_display =   mthis.closest('.trow').find('.without_end_time_display').prop("checked")
            let start_date =   mthis.closest('.trow').find('.start_date').val()
            let end_date =   mthis.closest('.trow').find('.end_date').val()
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
            })
        }
    </script>

@endsection