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

    <form role="form" method="post" action="{{ route('admin.blog_post.update') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmBlogPost" >
        @csrf  
        <input type="hidden" name="post_id" class="form-control input-lg" value="{{ $blog_post->id }}" />
        <div class="row">
            <select name="mtmp_name" id="mtmp_name" onchange="change_id(this)">
                <option value=""></option>
                <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email membership application Automatic reply (to the customer)</font></font></option>
                <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email membership application Automatic reply (to the store)</font></font></option>
                <option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WEB reservation automatic reply (to the customer)</font></font></option>
                <option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WEB reservation automatic reply (to the store)</font></font></option>
                <option value="7" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Recruitment application automatic reply (addressed to the applicant)</font></font></option>
                <option value="8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Recruit application automatic reply (addressed to the store)</font></font></option>
            </select> 
        </div> <br />
        
        <div class="row">
            <div class="col-sm-12 frm-inpt"> 
                <input type="text" name="post_title" class="form-control input-lg" placeholder="Post title" value="{{ $blog_post->title }}" /> 
            </div>
        </div> <br />
        <div class="row">
            <div class="col-sm-12 frm-inpt"> 
                <textarea name="post_content" class="form-control ckeditor" rows="18" id="frmPostContent">{{ $blog_post->details }}</textarea> 
            </div>
        </div> <br />
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
                post_title: { required: true },    
                post_content:{ 
                    required: function(){
                        CKEDITOR.instances.frmPostContent.updateElement();
                    }
                }
            },
            messages: {
                post_title: { required: "{{ __('This field is required') }}" },
                post_content: { required: "{{ __('This field is required') }}" }
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