@extends('admin.layout')

@section('content')
    @if(session('success'))
        <script>
            simpleMessage('success',`{{ session('success') }}`);
        </script>
    @endif
    @if(session('error'))
        <script>
            simpleMessage('error',`{{ session('error') }}`);
        </script>
    @endif
    <div class="page-header-block">
        <h2>モデル一覧</h2>
    </div>

    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-body">
            <div class="companion-toolbar">
                <form method="GET" action="{{ route('admin.companion.list') }}" class="companion-search-form">
                    <div class="input-group">
                        <input type="text" name="search_q" class="form-control" id="txtSearchId" placeholder="名前で検索..." value="{{ request('search_q') }}">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </span>
                    </div>
                </form>
                <div class="companion-toolbar-actions">
                    <button type="button" class="btn btn-orange save_all_position">並び順を確定する</button>
                    <button type="button" class="btn btn-green" id="bulkAddingButton" data-toggle="modal" data-target="#bulkAddingModal">一括登録</button>
                </div>
            </div>
        </div>
    </div>

    <div id="bulkAddingModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.companion.bulk.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>モデルの一括追加</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="uploadZip">zip ファイルをアップロードする</label>
                            <input type="file" name="zip" class="form-control" id="uploadZip" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">モデルの追加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="companion-count-bar">
        <span>全 {{ $companions->count() }} 名</span>
    </div>

    <div class="row dragula" id="left-events">
    @foreach($companions->sortBy('position') as $index => $companion)
        <div class="col-md-3 trow" data-id="{{ $companion->id }}">
            <div class="cmp-card">
                <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}" class="cmp-card-img-link">
                    @php
                        if(!empty($companion['home_image'])){
                            $imgPath = '/storage/photos/'.($companion['id']).'/'.($companion['home_image']['photo']);
                        }else{
                            $imgPath = '/storage/photos/default/images.jpg';
                        }
                    @endphp
                    <img src="{{ url($imgPath) }}" class="cmp-card-img" />
                    @if($companion['status'] == 2)
                        <span class="cmp-status-overlay cmp-status-hidden">非公開</span>
                    @elseif($companion['status'] == 3)
                        <span class="cmp-status-overlay cmp-status-deleted">削除</span>
                    @endif
                </a>
                <div class="cmp-card-body">
                    @if(isset($companion['category']['name']))
                        <span class="cmp-rank">{{ $companion['category']['name'] }}</span>
                    @else
                        <span class="cmp-rank cmp-rank-none">未設定</span>
                    @endif
                    <a href="{{ route('admin.companion.edit', ['id'=>$companion['id'], 'stab' => 1]) }}" class="cmp-name">{{ $companion['name'] }}</a>

                    <form role="form" method="post" action="{{ route('admin.companion.status.save') }}" class="cmp-status-form">
                        @csrf
                        <input type="hidden" name="companion_id" value="{{ $companion->id }}" required />
                        <select name="status" class="form-control cmp-status-select">
                            <option value="1" {{ ($companion['status'] == 1) ? 'selected' :'' }}>表示</option>
                            <option value="2" {{ ($companion['status'] == 2) ? 'selected' :'' }}>非公開</option>
                            <option value="3" {{ ($companion['status'] == 3) ? 'selected' :'' }}>削除</option>
                        </select>
                        <button type="submit" class="btn btn-xs btn-primary cmp-status-btn">確定</button>
                    </form>
                </div>
            </div>
        </div>
        @if($loop->iteration % 4 == 0 && $loop->remaining > 0)
        <div class="clearfix visible-md visible-lg"></div>
        @endif
    @endforeach
    </div>

    <script>
    function openModal() {
        $('#bulkAddingModal').modal('show');
    }
    function closeModal() {
        $('#bulkAddingModal').modal('hide');
    }

    let nPsitionObj = {};

    function resetPosition(){
        nPsitionObj = {};
        $('.trow').each(function(index, rtag){
            let id = $(this).attr('data-id');
            nPsitionObj[id] = index + 1;
        });
    }

    function rebuildClearfix() {
        $('#left-events .clearfix').remove();
        let $items = $('#left-events .trow');
        let total = $items.length;
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

        $(document).on('keypress','#txtSearchId', function(e){
            if(e.which == 13){
                let search = $(this).val();
                window.location.href = `{{ route('admin.companion.list') }}?search_q=` + encodeURIComponent(search);
            }
        });

        resetPosition();
        rebuildClearfix();
    })
</script>
    <div class="clearfix"></div>
@endsection
