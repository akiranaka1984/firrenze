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
    
    <div class="tile-stats tile-primary frm-head"> ユーザーリスト</div>

    <div class="panel panel-primary" data-collapsed="0">
        <div class="row p-1">
            <div class="col-md-4">
                <div class="form-group"> 
                    <label for="txtSearchId" class="col-sm-3 control-label text-right mt-5px">検索 : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="txtSearchId" placeholder="" value="{{ $search_q }}" > 
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2">
                <a href="{{ route('admin.users.add') }}" class="btn btn-blue">{{__('Create')}}</a>
            </div>
        </div>
    </div>

    <div class="tile-stats tile-primary frm-head"> コンパニオン一覧</div>

    <div class="col-md-12"> 
    <table class="table table-bordered"> 
        <thead> 
            <tr> 
                <th>名前</th>  <!--  name -->
                <th>Eメール</th>  <!--  email -->
                <th>電話番号</th>  <!--  tel -->
                <th>アクション</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tel }}</td>
                    <td class="dl-flex"> 
                        <a href="{{ route('admin.users.edit', ['id' => $user->id ]) }}" class="btn btn-info btn-sm sidemenu-href" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585l1.594-1.58zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006v-1.589z"/><path fill="currentColor" d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"/></svg>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm sidemenu-href delete_btn ml-1" data-id="{{ $user->id }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>
                    </td>
                </tr> 
            @endforeach
        </tbody> 
    </table> 
</div>

    <script>
        let nPsitionObj = {}
        $(document).ready(function(){
            $(document).on('keypress','#txtSearchId', function(e){
                if(e.which == 13){
                    let search = $(this).val();
                    window.location.href = `{{ route('admin.companion.list') }}?q=`+search;
                }
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
                        window.location.href = "/admin/users/delete?id="+id;
                    }
                })
            })

        })



    </script>
@endsection