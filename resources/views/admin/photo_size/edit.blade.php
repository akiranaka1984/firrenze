@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2Z"></path></svg>
    基本写真サイズ編集</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> 基本写真サイズ登録</div>
        
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary" >
                <div class="panel-body p-0 pl-15px">
                        
                    <form method="post" action="{{ route('admin.photo_size.save') }}"  role="form" class="form-horizontal form-groups-bordered">
                        @csrf
                        <div class="form-group mt-1"> 
                            <label class="col-sm-3 control-label">カテゴリー(必須)</label>
                            <div class="col-sm-5"> 
                                <select name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{ route('admin.photo.category.list') }}" class="btn btn-success btn-icon-align">
                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                    <span class="title ml-1">カテゴリー編集</span>
                                </a>
                            </div>
                        </div>
                        <div class="form-group"> <label for="field-2" class="col-sm-3 control-label">設定名称(必須)</span></label>
                            <div class="col-sm-8"> <input type="text" name="setting_name" class="form-control" id="field-2" placeholder="写真サイズの設定名称を入力してください" required> </div>
                        </div>
                        <div class="form-group"> <label for="field-3" class="col-sm-3 control-label">かな</label>
                            <div class="col-sm-8"> <input type="text" name="setting_kana"  class="form-control" id="field-3" placeholder="ローマ字、 ひらがな等全体を統一してください" required> </div>
                        </div>
                        <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">横(px)ⅹ縦(px)</label>
                            <div class="col-sm-8"> 
                                <div class="input-group">
                                    <input type="text" name="setting_hpx"  class="form-control" placeholder="横サイズを入力してください">
                                    <span class="input-group-addon input-group-addon-bg-light">px</span> 
                                    <input type="text" name="setting_vpx"  class="form-control" placeholder="縦サイズを入力してください">
                                    <span class="input-group-addon input-group-addon-bg-light">px</span> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="field-ta" class="col-sm-3 control-label">接頭語(英数字のみ)(必須)</label>
                            <div class="col-sm-8"><input type="text" name="setting_prefix" class="form-control" id="field-age" placeholder="接頭語を入力してください" required>“pic”と入力した場合にファイル名に”pic_”が追加されます</div>
                        </div>
                 
                        <div class="col-md-3 mt-1 mb-1">
                            <button type="submit" class="btn btn-orange btn-icon-align">
                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                <span class="title ml-1">新規追加</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> 基本写真サイズ編集</div>


    <div class="col-md-12"> 
        <table class="table table-bordered"> 
            <thead> 
                <tr> 
                    <th class="w-7">削除</th> 
                    <th class="w-20">名称</th> 
                    <th class="w-20">カテゴリー</th> 
                    <th class="w-10">横(px)</th> 
                    <th class="w-10">縦(px)</th> 
                    <th class="w-15">接頭語</th> 
                    <th>編集</th> 
                </tr> 
            </thead> 
            <tbody> 
                @foreach($photoSizeSettings as $photoSizeSetting)
                    <form method="post" action="{{ route('admin.photo_size.update') }}"  role="form" class="form-horizontal form-groups-bordered">
                        @csrf
                        <input type="hidden" name="id" class="form-control setting_name" value="{{ $photoSizeSetting->id }}" />
                        <tr> 
                            <td>
                                <button type="button" class="btn btn-danger btn-sm sidemenu-href delete_btn" data-id="{{ $photoSizeSetting->id }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                                </button>
                            </td> 
                            <td>
                                <input type="text" name="setting_name" class="form-control setting_name" placeholder="ローマ字、 ひらがな等全体を統一してください" value="{{ $photoSizeSetting->name }}" required />
                            </td>
                            <td>
                                <select name="category_id" class="form-control category_id" required>
                                    @foreach($categories as $category)
                                        @if($category->id == $photoSizeSetting->category_id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="setting_hpx" class="form-control setting_hpx" placeholder="横(px)" value="{{ $photoSizeSetting->hpx }}" />
                            </td>
                            <td>
                                <input type="text" name="setting_vpx" class="form-control setting_vpx" placeholder="縦(px)" value="{{ $photoSizeSetting->vpx }}" />
                            </td>
                            <td>
                                <input type="text" name="setting_prefix" class="form-control setting_prefix" placeholder="接頭語を入力してください" value="{{ $photoSizeSetting->prefix }}" required />
                            </td>
                            <td class="dl-flex"> 
                                <button type="submit" class="btn btn-success btn-icon-align">
                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                    <span class="title ml-1">編集する</span>
                                </button>
                                <button type="button" class="btn btn-blue ml-1">
                                    <span class="title ml-1">サムネール編集画面</span>
                                </button>
                            </td>
                        </tr> 
                    </form>
                @endforeach
            </tbody> 
        </table> 
    </div>



<script>
    $(document).ready(function(){
        $(document).on('click','.delete_btn', function(){
            let id = $(this).attr('data-id')
            swal({
                title: `{{__('Are you sure you want to remove?')}}`,
                text: ``,
                showCancelButton: true,
                confirmButtonText:'<i class="flaticon-checked-1"></i> '+`{{__('OK!')}}`,
                cancelButtonText:'<i class="flaticon-cancel-circle"></i> '+`{{__('Cancel')}}`,
                padding: '2em'
            }).then(function(result) {
                if(result.value){
                    window.location.href = "/admin/photo/delete?id="+id;
                }
            })
        })
    })
 </script>       


@endsection