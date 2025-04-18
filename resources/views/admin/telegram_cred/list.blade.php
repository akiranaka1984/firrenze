@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.945 2.765a1.552 1.552 0 0 0-1.572-.244L2.456 9.754a1.543 1.543 0 0 0 .078 2.884L6.4 13.98l2.095 6.926c.004.014.017.023.023.036a.486.486 0 0 0 .093.15a.49.49 0 0 0 .226.143c.01.004.017.013.027.015h.006l.003.001a.448.448 0 0 0 .233-.012c.008-.002.016-.002.025-.005a.495.495 0 0 0 .191-.122c.006-.007.016-.008.022-.014l3.013-3.326l4.397 3.405c.267.209.596.322.935.322c.734 0 1.367-.514 1.518-1.231L22.469 4.25a1.533 1.533 0 0 0-.524-1.486zM9.588 15.295l-.707 3.437l-1.475-4.878l7.315-3.81l-4.997 4.998a.498.498 0 0 0-.136.253zm8.639 4.772a.54.54 0 0 1-.347.399a.525.525 0 0 1-.514-.078l-4.763-3.689a.5.5 0 0 0-.676.06L9.83 19.07l.706-3.427l7.189-7.19a.5.5 0 0 0-.584-.797L6.778 13.054l-3.917-1.362A.526.526 0 0 1 2.5 11.2a.532.532 0 0 1 .334-.518l17.914-7.233a.536.536 0 0 1 .558.086a.523.523 0 0 1 .182.518l-3.261 16.015z"/></svg>
    Telegram管理</h2> <br />
    
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
                        <hr/>
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