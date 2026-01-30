@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>ユーザー</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> ユーザーの編集</div>

    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('admin.users.update') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmCompanion" >
                        @csrf   
                        
                        <input type="hidden" name="id" value="{{ $user->id }}" placeholder="" >

                        <div class="form-group"> <label for="frmName" class="col-sm-3 control-label">お名前(登録希望名)</label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_name" class="form-control" id="frmName" value="{{ $user->name }}" placeholder="" > </div>
                        </div>
                        <div class="form-group"> <label for="frmEmail" class="col-sm-3 control-label">メールアドレス</label>
                            <div class="col-sm-8 frm-inpt"> <input type="email" name="frm_email" class="form-control" id="frmEmail" value="{{ $user->email }}" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmPassword" class="col-sm-3 control-label">パスワード</label>
                            <div class="col-sm-8 frm-inpt"> <input type="password" name="frm_password" class="form-control" id="frmPassword" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmTel" class="col-sm-3 control-label">お電話番号</label>
                            <div class="col-sm-8 frm-inpt"><input type="text" name="frm_tel" class="form-control" id="frmTel" value="{{ $user->tel }}" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmLine" class="col-sm-3 control-label">LINE ID</label>
                            <div class="col-sm-8 frm-inpt"> <input type="text" name="frm_line_id" class="form-control" value="{{ $user->lineid }}" id="frmLine" placeholder=""></div>
                        </div>
                        <div class="form-group"> <label for="frmCourse" class="col-sm-3 control-label">ご希望のコース</label>
                            <div class="col-sm-8 frm-inpt"> 
                                <select name="frm_cource" class="form-control">
                                    <option value="">選択してください</option>
                                    @foreach($prices as $price)
                                        <option value="{{ $price->id }}" {{ ($user->cource == $price->id) ? 'selected' : '' }} >{{ $price->name }} {{ $price->time_interval }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group"> <label for="frmPaymentMethod" class="col-sm-3 control-label">お支払方法</label>
                            <div class="col-sm-8 frm-inpt"> 
                                <select name="frm_payment_method" class="form-control" id="frmPaymentMethod">
                                    <option value="">選択してください</option>
                                    <option value="現金" {{ ($user->pay == "現金") ? 'selected' : '' }} >現金</option>
                                    <option value="クレジットカード" {{ ($user->pay == "クレジットカード") ? 'selected' : '' }} >クレジットカード</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"> <label for="frmOthers" class="col-sm-3 control-label">その他</label>
                            <div class="col-sm-8 frm-inpt"> <textarea name="frm_cmnt" class="form-control" id="frmOthers" rows="5" placeholder="">{{ $user->cmnt }}</textarea></div>
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
                    frm_tel: { required: true }
                },
                messages: {
                    frm_name: { required: "{{ __('This field is required') }}" },
                    frm_email: { required: "{{ __('This field is required') }}" },
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