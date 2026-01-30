@extends('admin.layout')

@section('content')
    @if(session('success'))
        <script>
            simpleMessage('success',`{{ session('success') }}`);
        </script>
    @endif
    @if(session('error'))
        <script>
            simpleMessage('error',`{{ session('success') }}`);
        </script>
    @endif
    <div class="page-header-block">
        <h2>モデル一覧</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> 検索</div>

    <div class="panel panel-primary" data-collapsed="0">
        <div class="row p-1">
            <div class="col-md-4">
                <form method="GET" action="{{ route('admin.companion.list') }}">
                    <div class="form-group">
                        <label for="txtSearchId" class="col-sm-3 control-label text-right mt-5px">検索 : </label>
                        <div class="col-sm-8">
                            <input type="text" name="search_q" class="form-control" id="txtSearchId" placeholder="" value="{{ request('search_q') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-orange save_all_position  btn_fixed">並び順を確定する</button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-green" id="bulkAddingButton" onclick="openModal()">Excelファイル一括登録</button>
            </div>  
            <div id="bulkAddingModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.companion.bulk.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <span class="close" id="bulkAddingClose" onclick="closeModal()">&times;</span>
                                <h4>モデルの一括追加</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label for="uploadCSV">zip ファイルをアップロードする</label>
                                    <input  type="file" name="zip" class="form-control" id="uploadZip" required/>
                                </div>
                            </div>

                            {{-- <div class="modal-body">
                                <div>
                                    <label for="uploadCSV">Excelファイルをアップロードする</label>
                                    <input  type="file" name="csv" class="form-control" id="uploadCSV" accept=".xls,.xlsx" required/>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label for="uploadCSV">すべての画像をアップロードする</label>
                                    <input type="file" name="images[]" class="form-control" id="uploadImages" multiple required/>
                                </div>
                            </div> --}}
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">モデルの追加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tile-stats tile-primary frm-head">モデル一覧</div>

    <div class="row dragula" id="left-events">
    {{--@foreach($companions->sortByDesc('created_at') as $index => $companion)--}}
    @foreach($companions->sortBy('position') as $index => $companion)
        <div class="col-md-3 trow" data-id="{{ $companion->id }}">
            <div class="panel panel-primary companion-card">
                <div class="panel-body text-center">
                    <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}">
                        @php
                            if(!empty($companion['home_image'])){
                                $imgPath = '/storage/photos/'.($companion['id']).'/'.($companion['home_image']['photo']);
                            }else{
                                $imgPath = '/storage/photos/default/images.jpg';
                            }
                        @endphp
                        <img src="{{ url($imgPath) }}" class="topi_class" />
                    </a>
                    @if(isset($companion['category']['name']))
                        <h2 class="text-center"><span class="rank-badge">{{ $companion['category']['name'] }}</span></h2>
                    @else
                        <h2 class="text-center rank-list">カテゴリーが設定されていません</h2>
                    @endif
                    
                    <h3 class="text-center">
                        <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}" class="text-info">{{ $companion['name'] }}</a>
                    </h3>
                    <h4 class="text-center look-like">表示設定</h4>

                    <form role="form" method="post" action="{{ route('admin.companion.status.save') }}">
                        @csrf
                        <input type="hidden" name="companion_id" value="{{ $companion->id }}" required />
                        <div class="text-center">
                            <select name="status" class="form-control w-50 d-inline-block">
                                <option value="1" {{ ($companion['status'] == 1) ? 'selected' :'' }}>表示</option>
                                <option value="2" {{ ($companion['status'] == 2) ? 'selected' :'' }}>非公開</option>
                                <option value="3" {{ ($companion['status'] == 3) ? 'selected' :'' }}>削除</option>
                            </select>
                        </div>
                        <div class="text-center mt-1">
                            <button type="submit" class="btn btn-primary">確定</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- 4つごとにclearfixを挿入 -->
        @if($loop->iteration % 4 == 0 && $loop->remaining > 0)
        <div class="clearfix visible-md visible-lg"></div>
        @endif
        <!--
        @if(($index + 1) % 4 == 0 && $index + 1 < $companions->count())
            <div class="clearfix visible-md visible-lg"></div>
        @endif
        -->
    @endforeach
    </div>

    <script>
    let nPsitionObj = {};

    // 既存のポジション再設定関数
    function resetPosition(){
        nPsitionObj = {};
        $('.trow').each(function(index, rtag){
            let id = $(this).attr('data-id');
            nPsitionObj[id] = index + 1;
        });
    }

    // 新しく clearfix を再構築する関数を追加
    function rebuildClearfix() {
        // 既存の clearfix 要素を削除
        $('#left-events .clearfix').remove();
        // 現在の .trow 要素を取得
        let $items = $('#left-events .trow');
        let total = $items.length;
        // 各要素をループして、4個ごと（ただし最終行以外）に clearfix を挿入
        $items.each(function(index, element) {
            if ((index + 1) % 4 === 0 && (index + 1) < total) {
                $('<div class="clearfix visible-md visible-lg"></div>').insertAfter($(element));
            }
        });
    }

    $(document).ready(function(){

        dragula([document.getElementById("left-events")])
        .on('drag', function (el) {
            el.className += ' el-drag-ex-2';
            el.className = el.className.replace('ex-moved', '');
        })
        .on('drop', function (el, target, source, sibling) {
            el.className = el.className.replace('el-drag-ex-2', '');
            el.className += ' ex-moved';
            // ドラッグ＆ドロップ後、位置情報を更新し clearfix を再構築
            setTimeout(() => {
                resetPosition();
                rebuildClearfix();
            }, 200);
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


        $(document).on('click','.save_all_position', function(){
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.companion.position.save') }}`,
                headers: {"Content-Type": "application/json"},
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    data: nPsitionObj
                }),
                success: function (response) {
                    simpleMessage('success',`{{__('Save Changes')}}`);
                }
            })
        })

        // ここに検索フォーム用のコードを追加
        $(document).on('keypress','#txtSearchId', function(e){
            if(e.which == 13){
                let search = $(this).val();
                window.location.href = `{{ route('admin.companion.list') }}?search_q=` + encodeURIComponent(search);
            }
        });

        // 初期読み込み時にも位置情報と clearfix をセット
        resetPosition();
        rebuildClearfix();
    })
</script>
    <div class="clearfix"></div>
@endsection


