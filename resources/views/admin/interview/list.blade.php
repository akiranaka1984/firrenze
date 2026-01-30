@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>面接予約情報一覧</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> 面接予約一覧</div>
        
    
    <div class="panel panel-primary" >
        <div class="panel-body p-0 pl-15px">
            <form role="form" class="form-horizontal form-groups-bordered">
                <div class="row mt-1">
                    <div class="col-md-3 btn-icon-align-inline">
                        <div class="form-group"> 
                            <div class="col-sm-12"> 
                                <div class="checkbox"> <label> <input type="checkbox" class="show_hidden_checkbox" {{ ($is_hidden == 1) ? 'checked': '' }} >非表示ニュースを含めて表示する</label> </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-success sidemenu-href search_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0c.41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg>
                            <span class="title ml-1">検索</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<div class="col-md-12"> 
    <table class="table table-bordered"> 
        <thead> 
            <tr> 
                <th class="w-10">検索</th> 
                <th class="w-35">メールアドレス</th> 
                <th class="w-35">連絡先</th> 
                <th>編集</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($interviews as $interview)
                @if($interview->compatible == 0)
                    <tr>
                @else
                    <tr class="tr-highlight">
                @endif
                    <td>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href delete_btn" data-id="{{ $interview->id }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td> 
                    <td class="text-blue">{{ $interview->mail }}</td>
                    <td>{{ $interview->tel }}</td>
                    <td>
                        <!-- 面接日時を表示 -->
                        {{ \Carbon\Carbon::parse($interview->interview_date)->format('Y年m月d日 H:i') }}
                    </td>
                    <td class="dl-flex"> 
                        <button type="button" class="btn btn-success btn-icon-align openModelDetails" data-id="{{ $interview->id }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="currentColor" d="M247.31 124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57 61.26 162.88 48 128 48S61.43 61.26 36.34 86.35C17.51 105.18 9 124 8.69 124.76a8 8 0 0 0 0 6.5c.35.79 8.82 19.57 27.65 38.4C61.43 194.74 93.12 208 128 208s66.57-13.26 91.66-38.34c18.83-18.83 27.3-37.61 27.65-38.4a8 8 0 0 0 0-6.5ZM128 192c-30.78 0-57.67-11.19-79.93-33.25A133.47 133.47 0 0 1 25 128a133.33 133.33 0 0 1 23.07-30.75C70.33 75.19 97.22 64 128 64s57.67 11.19 79.93 33.25A133.46 133.46 0 0 1 231.05 128c-7.21 13.46-38.62 64-103.05 64Zm0-112a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Z"/></svg>
                            <span class="title ml-1">質問/ご意見</span>
                        </button>
                        <select class="form-control ml-1 change_compatible" data-id="{{ $interview->id }}" >
                            <option value="0" {{ ($interview->compatible == 0) ? "selected" : "" }} >未対応</option>
                            <option value="1" {{ ($interview->compatible == 1) ? "selected" : "" }}>対応中</option>
                            <option value="2" {{ ($interview->compatible == 2) ? "selected" : "" }}>対応済</option>
                        </select>
                    </td>
                </tr> 
            @endforeach
        </tbody> 
    </table> 
</div>

<div class="modal fade" id="modal-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">応募者詳細</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr class="tr_photo">
                                        <td class="w-30">写真</td>
                                        <td class="modal_photo"></td>
                                    </tr>
                                    <tr>
                                        <td class="w-30">内容</td>
                                        <td class="modal_content"></td>
                                    </tr>
                                    <tr>
                                        <td class="w-30">最終更新日</td>
                                        <td class="modal_last_update"></td>
                                    </tr>
                                    <tr>
                                        <td class="w-30">対応属性</td>
                                        <td class="modal_attribute"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let is_hidden = {{ $is_hidden }}
    $(document).ready(function(){
        $(document).on('click', '.openModelDetails', function () {
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.interview.list.id') }}`,
                headers: { "Content-Type": "application/json" },
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    id: id
                }),
                success: function (response) {
                    // 写真の表示
                    if (response.photo) {
                        $('.modal_photo').html(`<img src="{{ url('/storage/photos/interview') }}/` + response.photo + `" style="width:100%">`);
                        $('.tr_photo').show();
                    } else {
                        $('.modal_photo').html('写真がありません');
                        $('.tr_photo').show();
                    }
        
                    // その他のメッセージの表示
                    let otherMessage = response.other_message ? response.other_message : '特になし';
        
                    $('.modal_last_update').html(moment(response.updated_at).format('YYYY年M月D日 HH:mm'));
        
                    if (response.compatible == 0) {
                        $('.modal_attribute').html('未対応');
                    } else if (response.compatible == 1) {
                        $('.modal_attribute').html('対応中');
                    } else {
                        $('.modal_attribute').html('対応済');
                    }
        
                    let content = `お名前: ` + response.name + `<br>
                                   メールアドレス: ` + response.mail + `<br>
                                   電話番号: ` + response.tel + `<br>
                                   Line ID: ` + response.line_id + `<br>
                                   お問合わせ内容: ` + response.inquiry + `<br>
                                   ご年齢: ` + response.age + `歳<br>
                                   身長: ` + response.height + `cm<br>
                                   体重: ` + response.weight + `kg<br>
                                   バストサイズ: ` + response.bust + ` カップ<br>
                                   タトゥー・傷跡の有無など: ` + (response.tattoo == 0 ? '無し' : '有り') + `<br>
                                   面接希望日: ` + (response.interview_date ? moment(response.interview_date).format('YYYY年M月D日 HH:mm') : '未設定') + `<br>
                                   写真: ` + (response.photo ? `<a href="{{ url('/storage/images') }}/` + response.photo + `" target="_blank">写真を見る</a>` : '写真がありません') + `<br>
                                   その他のメッセージ: ` + otherMessage + `<br>`;
        
                    $('.modal_content').html(content);
                    $('#modal-1').modal('show');
                }, // success コールバック終了
        
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    alert('データを取得できませんでした。');
                }
            });
        });

        $(document).on('click','.delete_btn',function(){
            let id = $(this).attr('data-id')
            window.location.href = `{{ route('admin.interview.delete') }}?id=`+id;
        })

        $(document).on('change','.change_compatible',function(){
            let id = $(this).attr('data-id')
            let value = $(this).val()
            let mthis = $(this);
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.interview.compatible') }}`,
                headers: {"Content-Type": "application/json"},
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    id: id, 
                    value: value
                }),
                success: function (response) {
                    simpleMessage('success',`{{__('Save Changes')}}`);
                    if((value != 0)){
                        mthis.closest('tr').addClass('tr-highlight')
                    }else{
                        mthis.closest('tr').removeClass('tr-highlight')
                    }

                    if((is_hidden == 0) && (value == 2)){
                        mthis.closest('tr').remove()
                    }

                }
            })
        })

        $(document).on('click','.search_btn', function(){
            let show_hidden_checkbox = $('.show_hidden_checkbox').prop('checked')
            if(show_hidden_checkbox === true){
                window.location.href = `{{ route('admin.interview.list') }}?is_hidden=`+1;
            }else{
                window.location.href = `{{ route('admin.interview.list') }}`;
            }
        })
    })
 </script>       


@endsection