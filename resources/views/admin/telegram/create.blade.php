@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.945 2.765a1.552 1.552 0 0 0-1.572-.244L2.456 9.754a1.543 1.543 0 0 0 .078 2.884L6.4 13.98l2.095 6.926c.004.014.017.023.023.036a.486.486 0 0 0 .093.15a.49.49 0 0 0 .226.143c.01.004.017.013.027.015h.006l.003.001a.448.448 0 0 0 .233-.012c.008-.002.016-.002.025-.005a.495.495 0 0 0 .191-.122c.006-.007.016-.008.022-.014l3.013-3.326l4.397 3.405c.267.209.596.322.935.322c.734 0 1.367-.514 1.518-1.231L22.469 4.25a1.533 1.533 0 0 0-.524-1.486zM9.588 15.295l-.707 3.437l-1.475-4.878l7.315-3.81l-4.997 4.998a.498.498 0 0 0-.136.253zm8.639 4.772a.54.54 0 0 1-.347.399a.525.525 0 0 1-.514-.078l-4.763-3.689a.5.5 0 0 0-.676.06L9.83 19.07l.706-3.427l7.189-7.19a.5.5 0 0 0-.584-.797L6.778 13.054l-3.917-1.362A.526.526 0 0 1 2.5 11.2a.532.532 0 0 1 .334-.518l17.914-7.233a.536.536 0 0 1 .558.086a.523.523 0 0 1 .182.518l-3.261 16.015z"/></svg>
    テンプレートを編集する</h2> <br />

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
