@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>画像</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> 画像</div>

    <div class="gallery-env">
        <div class="row">
            <div class="col-sm-12">
                <h3>イメージ一覧</h3>
            </div>    
            <form role="form" method="post" action="{{ route('admin.gallery.upload') }}" enctype="multipart/form-data" >
                @csrf   
                <div class="row">
                    <div class="col-sm-4">
                        <input type="file" name="photos[]" class="form-control" multiple required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-blue">Upload</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-3 flex-img">
            @foreach($galleries as $gallery)
                <div class="col-sm-2 col-xs-4" data-tag="1d">
                    <article class="image-thumb"> 
                        <a href="#" class="image"> 
                            <img src="{{ $gallery->filename }}" class="gallery-thumb" />
                        </a>
                        <div class="image-options"> 
                            <a href="#" class="edit" data-src="{{ $gallery->filename }}" ><i class="entypo-pencil"></i></a>
                            <a href="#" class="delete" data-id="{{ $gallery->id }}"><i class="entypo-cancel"></i></a> 
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="d-flex">
            {!! $galleries->links() !!}
        </div>
    </div>

    <div class="modal fade" id="album-image-options">
        <div class="modal-dialog modal-dialog-md">
            <div class="modal-content">
                <div class="gallery-image-edit-env"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img src="" class="img-responsive view_image_src modal-preview-img" /> 
                    </div>
                    <div class="row m-0">
                        <h2>Image Path:</h2>
                        <span class="view_image_path text-blue"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $(document).on('click','a.edit', function(){
            let data_src = $(this).attr('data-src')
            $('.view_image_src').attr('src', data_src)
            $('.view_image_path').html(data_src)
            $("#album-image-options").modal('show');
        })

        $(document).on('click','a.delete', function(){
            let data_id = $(this).attr('data-id')
            swal({
                title: `{{__('Are you sure you want to remove?')}}`,
                text: ``,
                showCancelButton: true,
                confirmButtonText:'<i class="flaticon-checked-1"></i> '+`{{__('OK!')}}`,
                cancelButtonText:'<i class="flaticon-cancel-circle"></i> '+`{{__('Cancel')}}`,
                padding: '2em'
            }).then(function(result) {
                if(result.value){
                    window.location.href = "/admin/gallery/delete?id="+data_id;
                }
            })
        })
    })
</script>

@endsection