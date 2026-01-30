@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>メール定型文編集</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> メール定型文編集</div>

    <form role="form" method="post" action="{{ route('admin.blog_post.update') }}" enctype="multipart/form-data" class="form-horizontal form-groups-bordered" id="frmBlogPost" >
        @csrf  
        <input type="hidden" name="post_id" class="form-control input-lg" value="{{ $blog_post->id }}" />
        <div class="row">
            <select name="mtmp_name" id="mtmp_name" onchange="change_id(this)">
                <option value=""></option>
                <option value="1"><span>Email membership application Automatic reply (to the customer)</span></option>
                <option value="2"><span>Email membership application Automatic reply (to the store)</span></option>
                <option value="5"><span>WEB reservation automatic reply (to the customer)</span></option>
                <option value="6"><span>WEB reservation automatic reply (to the store)</span></option>
                <option value="7" selected=""><span>Recruitment application automatic reply (addressed to the applicant)</span></option>
                <option value="8"><span>Recruit application automatic reply (addressed to the store)</span></option>
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