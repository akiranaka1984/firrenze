@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>テンプレートを編集する</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> テンプレートを編集する</div>

    <form role="form" method="post" action="{{ route('admin.telegram.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmTelegram" >
        @csrf
        <div class="row">
            <label for="frmTemplateName" class="col-sm-2 control-label">テンプレート名</label>
            <div class="col-sm-8 frm-inpt">
                <input type="text" name="post_title" class="form-control input-lg" placeholder="" />
            </div>
        </div> <br />
        <div class="row">
            <label for="frmContent" class="col-sm-2 control-label">本文</label>
            <div class="col-sm-8 frm-inpt">
                <textarea name="post_content" class="form-control ckeditor" rows="18" id="frmPostContent"></textarea>
            </div>
        </div> <br />
        <div class="row">
            <label for="frmContent" class="col-sm-2 control-label"></label>
            <div class="col-sm-2 post-save-changes">
                <button type="submit" class="btn btn-green btn-lg btn-block btn-icon"> {{ __('SAVE') }} <i class="entypo-check"></i></button>
            </div>
        </div>
    </form>

@endsection
