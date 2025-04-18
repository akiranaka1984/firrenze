@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="6" r="4"/><path stroke-linecap="round" d="M19.997 18c.003-.164.003-.331.003-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437"/></g></svg>
        ユーザー</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> ユーザーを作成</div>

    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('admin.users.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmCompanion" >
                        @csrf   
                        <div class="form-group"> <label for="frmName" class="col-sm-3 control-label">お名前(登録希望名)</label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_name" class="form-control" id="frmName" placeholder="" > </div>
                        </div>
                        <div class="form-group"> <label for="frmEmail" class="col-sm-3 control-label">メールアドレス</label>
                            <div class="col-sm-8 frm-inpt"> <input type="email" name="frm_email" class="form-control" id="frmEmail" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmPassword" class="col-sm-3 control-label">パスワード</label>
                            <div class="col-sm-8 frm-inpt"> <input type="password" name="frm_password" class="form-control" id="frmPassword" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmTel" class="col-sm-3 control-label">お電話番号</label>
                            <div class="col-sm-8 frm-inpt"><input type="text" name="frm_tel" class="form-control" id="frmTel" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmLine" class="col-sm-3 control-label">LINE ID</label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_line_id" class="form-control" id="frmLine" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmCourse" class="col-sm-3 control-label">ご希望のコース</label>
                            <div class="col-sm-8 frm-inpt"> 
                                <select name="frm_cource" class="form-control">
                                    <option value="">選択してください</option>
                                    @foreach($prices as $price)
                                        <option value="{{ $price->id }}">{{ $price->name }} {{ $price->time_interval }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group"> <label for="frmPaymentMethod" class="col-sm-3 control-label">お支払方法</label>
                            <div class="col-sm-8 frm-inpt"> 
                                <select name="frm_payment_method" class="form-control" id="frmPaymentMethod">
                                    <option value="">選択してください</option>
                                    <option value="現金">現金</option>
                                    <option value="クレジットカード">クレジットカード</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"> <label for="frmOthers" class="col-sm-3 control-label">その他</label>
                            <div class="col-sm-8 frm-inpt"> <textarea name="frm_cmnt" class="form-control" id="frmOthers" rows="5" placeholder=""></textarea></div>
                        </div>

                        <div class="col-md-3 mt-3">
                            <button type="submit" class="btn btn-orange btn-icon-align">
                                <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                                <span class="title ml-1">{{ __('SAVE') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#frmCompanion').validate({
                ignore: [],
                debug: false,
                rules: {
                    frm_name: { required: true },
                    frm_email: { required: true },
                    frm_password: { required: true },
                    frm_tel: { required: true }
                },
                messages: {
                    frm_name: { required: "{{ __('This field is required') }}" },
                    frm_email: { required: "{{ __('This field is required') }}" },
                    frm_password: { required: "{{ __('This field is required') }}" },
                    frm_tel: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-inpt').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        })
    </script>
@endsection