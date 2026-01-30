@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>テンプレート</h2>
    </div>

    <div class="tile-stats tile-primary frm-head"> テンプレート</div>

    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="{{ route('admin.telegram.create') }}" class="btn btn-green btn-lg btn-block btn-icon"> {{ __('Create') }} </a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>テンプレート名</th>
                        <th>コンテンツ</th>
                        <th class="w-15">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($template_data as $data)
                        <tr class="item_div" data-id="{{ $data->id }}">
                            <td>{{ $data->template_name }}</td>
                            <td>{!! $data->content !!}</td>
                            <td class="td-actions">
                                <a href="{{ route('admin.telegram.edit', ['id' => $data->id]) }}" class="btn btn-success" data-id="{{ $data->id }}">
                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm ml-1 sidemenu-href delete_btn" data-id="{{ $data->id }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                                </button>
                                <a href="{{ route('admin.telegram.sent', ['id' => $data->id]) }}" class="btn btn-blue ml-1" data-id="{{ $data->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"></path></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function(){
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
                        window.location.href = "/admin/telegram/delete?id="+id;
                    }
                })
            })

        })
    </script>

@endsection
