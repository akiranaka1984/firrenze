@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2Z"></path></svg>
    写真/カテゴリ編集</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> 写真/カテゴリ登録</div>
        
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary" >
                <div class="panel-body">
                        
                    <form method="post" action="{{ route('admin.category.save') }}" role="form" class="form-horizontal form-groups-bordered">
                        @csrf
                        <input type="hidden" name="id" id="txtId" > 
                        <div class="form-group mt-1"> 
                            <label class="col-sm-2 control-label">カテゴリー(必須)</label>
                            <div class="col-sm-8"> 
                                <input type="text" name="name" class="form-control" id="txtName" required/> 
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success btn-icon-align">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16z"/></svg>
                                    <span class="title ml-1">追加</span>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> 写真サイズ/カテゴリ編集</div>


    <div class="col-md-12"> 
        <table class="table table-bordered"> 
            <thead> 
                <tr> 
                    <th class="w-75">種別名</th> 
                    <th>編集</th> 
                </tr> 
            </thead> 
            <tbody id="left-events" class="dragula"> 
                @foreach($categories as $category)
                    <tr class="trow" data-id="{{ $category->id }}"> 
                        <td class="text-center text-dark"> {{ $category->name }} </td>
                        <td class="dl-flex"> 
                            <button type="button" class="btn btn-success btn-sm edit_btn" data-id="{{ $category->id }}" data-name="{{ $category->name }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z"/><path fill="currentColor" d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"/></svg>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm ml-1 delete_btn" data-id="{{ $category->id }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            </button>
                            <a href="{{ route('admin.price.list', ['id'=>$category->id]) }}" class="btn btn-info btn-sm ml-1" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M13.92 11H18v2h-5v2h5v2h-5v4h-2v-4H6v-2h5v-2H6v-2h4.08L5 3h2.37L12 10.29L16.63 3H19l-5.08 8Z"/></svg>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody> 
        </table> 
    </div>
    <div class="form-group"> 
        <div class="col-sm-2">
            <button type="button" class="btn btn-orange btn-icon-align save_all_position">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3C7.58 3 4 4.79 4 7s3.58 4 8 4s8-1.79 8-4s-3.58-4-8-4M4 9v3c0 2.21 3.58 4 8 4s8-1.79 8-4V9c0 2.21-3.58 4-8 4s-8-1.79-8-4m0 5v3c0 2.21 3.58 4 8 4s8-1.79 8-4v-3c0 2.21-3.58 4-8 4s-8-1.79-8-4Z"></path></svg>
                <span class="title ml-1">並び順を確定する</span>
            </button>
        </div>
    </div>


<script>

    let nPsitionObj = {}

    $(document).ready(function(){
        $(document).on('click','.edit_btn', function(){
            let id = $(this).attr('data-id')
            let name = $(this).attr('data-name')
            $('#txtId').val(id)
            $('#txtName').val(name)
        })

        $(document).on('click','.delete_btn', function(){
            let id = $(this).attr('data-id')
            swal({
                title: `{{__('Are you sure you want to remove?')}}`,
                text: ``,
                showCancelButton: true,
                confirmButtonText:'<i class="flaticon-checked-1"></i> '+`{{__('OK!')}}`,
                cancelButtonText:'<i class="flaticon-cancel-circle"></i> '+`{{__('Cancel')}}`,
                padding: '2em'
            }).then(function(result) {
                if(result.value){
                    window.location.href = "/admin/category/delete?id="+id;
                }
            })
        })


        $(document).on('click','.save_all_position', function(){
            $.ajax({
                type: 'POST',
                url: `{{ route('admin.category.position.save') }}`,
                headers: {"Content-Type": "application/json"},
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    data:nPsitionObj
                }),
                success: function (response) {
                    simpleMessage('success',`{{__('Save Changes')}}`);
                }
            })
        })

        resetPosition()

    })

    dragula([document.getElementById("left-events")])
        .on('drag', function (el) {
            el.className += ' el-drag-ex-2';
            el.className = el.className.replace('ex-moved', '');
        })
        .on('drop', function (el, target, source, sibling) {
            el.className = el.className.replace('el-drag-ex-2', '');
            el.className += ' ex-moved';
            setTimeout(() => {
                resetPosition()
            }, 200);
        })
        .on('over', function (el, container) {
            container.className += ' ex-over';
        })
        .on('out', function (el, container) {
            container.className = container.className.replace('ex-over', '');
        })
        .on('cancel', function (el) {
            el.className = el.className.replace('el-drag-ex-2', '');
        });


    function resetPosition()
    {
        nPsitionObj = {};
        $('.trow').each(function(index, rtag){
            let id = $(this).attr('data-id');
            nPsitionObj[id] = index + 1;
        })
    }

 </script>       


@endsection