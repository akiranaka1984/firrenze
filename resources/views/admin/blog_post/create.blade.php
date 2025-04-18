@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z"/></svg>
    メール定型文編集</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> メール定型文編集</div>

    <form role="form" method="post" action="{{ route('admin.blog_post.save') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmBlogPost" >
        @csrf  

        <div class="form-group"> 
            <label for="frmTemplateName" class="col-sm-2 control-label">テンプレート名</label> 
            <div class="col-sm-8"> 
                <select name="template_name" class="form-control" id="frmTemplateName"> 
                    <option value=""></option>
                    <option value="1" {{ ($mid == 1) ? "selected" : "" }} >メール会員申込 自動返信（お客様宛て）</option>
                    <option value="2" {{ ($mid == 2) ? "selected" : "" }} >メール会員申込 自動返信（店舗宛て）</option>
                    <option value="5" {{ ($mid == 5) ? "selected" : "" }} >WEB予約 自動返信（お客様宛て）</option>
                    <option value="6" {{ ($mid == 6) ? "selected" : "" }} >WEB予約 自動返信（店舗宛て）</option>
                    <option value="7" {{ ($mid == 7) ? "selected" : "" }} >リクルート申込 自動返信（申込者宛て）</option>
                    <option value="8" {{ ($mid == 8) ? "selected" : "" }} >リクルート申込 自動返信（店舗宛て）</option>
                </select> 
            </div> 
        </div>

        <div class="form-group"> 
            <label for="frmSenderName" class="col-sm-2 control-label">送信者名</label> 
            <div class="col-sm-8 frm-inpt"> 
                <input type="text" name="sender_name" class="form-control" id="frmSenderName" value="{{ !empty($blogPost)  ? $blogPost->sender_name : '' }}" placeholder=""> 
            </div> 
        </div>

        <div class="form-group"> 
            <label for="frmSenderAddress" class="col-sm-2 control-label">送信者アドレス</label> 
            <div class="col-sm-8 frm-inpt"> 
                <input type="text" name="sender_address" class="form-control" id="frmSenderAddress" value="{{ !empty($blogPost)  ? $blogPost->sender_address : '' }}" placeholder=""> 
            </div> 
        </div>

        <div class="form-group"> 
            <label for="frmSubject" class="col-sm-2 control-label">件名</label> 
            <div class="col-sm-8 frm-inpt"> 
                <input type="text" name="subject" class="form-control" id="frmSubject" value="{{ !empty($blogPost)  ? $blogPost->subject : '' }}" placeholder=""> 
            </div> 
        </div>

        <div class="form-group"> 
            <label for="frmContent" class="col-sm-2 control-label">本文</label> 
            <div class="col-sm-8 frm-inpt"> 
                <textarea name="content" class="form-control ckeditor" rows="18" id="frmContent">{{ !empty($blogPost)  ? $blogPost->content : '' }}</textarea> 
            </div> 
        </div>
        <div class="row">
            <div class="col-sm-2 post-save-changes"> 
                <button type="submit" class="btn btn-green btn-lg btn-block btn-icon"> {{ __('SAVE') }} <i class="entypo-check"></i></button> 
            </div>
        </div> 
    </form>


    <script>
    $(document).ready(function(){
        $('#frmBlogPost').validate({
            ignore: [],
            debug: false,
            rules: {
                sender_name: { required: true },
                sender_address: { required: true },    
                subject: { required: true },    
                content:{ 
                    required: function(){
                        CKEDITOR.instances.frmContent.updateElement();
                    }
                }
            },
            messages: {
                sender_name: { required: "{{ __('This field is required') }}" },
                sender_address: { required: "{{ __('This field is required') }}" },
                subject: { required: "{{ __('This field is required') }}" },
                content: { required: "{{ __('This field is required') }}" }
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

        $(document).on('change','#frmTemplateName', function(){
            let template_name = $(this).val()
            window.location.href = "/admin/blog_post/create?id="+template_name;
        })
    })

 </script>         


@endsection