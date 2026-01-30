@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>Telegram管理</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> Telegram管理</div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('admin.telegram.cred.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmCompanion" >
                        @csrf   
                        <div class="form-group"> <label for="frmName" class="col-sm-3 control-label">テレグラムボット名<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_name" class="form-control" id="frmName" placeholder="電報ボット名を入力してください。" value="{{ !empty($telegramCred) ? $telegramCred->botname : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmToken" class="col-sm-3 control-label">テレグラムボットトークン<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_token" class="form-control" id="frmToken" placeholder="Telegram ボットのトークンを入力してください。" value="{{ !empty($telegramCred) ? $telegramCred->token : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmBrodcastId" class="col-sm-3 control-label">ブロードキャストまたはグループID<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_brod_id" class="form-control" id="frmBrodcastId" placeholder="ブロードキャストまたはグループID" value="{{ !empty($telegramCred) ? $telegramCred->brodcast_id : '' }}"> </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <button type="submit" class="btn btn-orange btn-icon-align">
                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                <span class="title ml-1">登録</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){

    })
</script>         


@endsection