@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
    メルマガ管理</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> メルマガ管理</div>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('admin.mail.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmCompanion" >
                        @csrf   
                        <div class="form-group"> <label for="frmName" class="col-sm-3 control-label">Name<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_name" class="form-control" id="frmName" placeholder="" value="{{ !empty($emailCreds) ? $emailCreds->name : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmAddress" class="col-sm-3 control-label">Address<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_address" class="form-control" id="frmAddress" placeholder=""  value="{{ !empty($emailCreds) ? $emailCreds->address : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmDriver" class="col-sm-3 control-label">Driver<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_driver" class="form-control" id="frmDriver" placeholder=""  value="{{ !empty($emailCreds) ? $emailCreds->driver : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmHost" class="col-sm-3 control-label">Host<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_host" class="form-control" id="frmHost" placeholder="" value="{{ !empty($emailCreds) ? $emailCreds->host : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmPort" class="col-sm-3 control-label">Port<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_port" class="form-control" id="frmPort" placeholder="" value="{{ !empty($emailCreds) ? $emailCreds->port : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmEncryption" class="col-sm-3 control-label">Encryption<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_encryption" class="form-control" id="frmEncryption" placeholder="" value="{{ !empty($emailCreds) ? $emailCreds->encryption : '' }}" required> </div>
                        </div>
                        <div class="form-group"> <label for="frmUsername" class="col-sm-3 control-label">Username<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_username" class="form-control" id="frmUsername" placeholder="" value="{{ !empty($emailCreds) ? $emailCreds->username : '' }}"  required> </div>
                        </div>
                        <div class="form-group"> <label for="frmPassword" class="col-sm-3 control-label">Password<span class="text-danger">※必須</span></label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_password" class="form-control" id="frmPassword" placeholder=""  value="{{ !empty($emailCreds) ? $emailCreds->password : '' }}"  required> </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <button type="submit" class="btn btn-orange btn-icon-align">
                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                <span class="title ml-1">コンパニオン登録</span>
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