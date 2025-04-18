@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.945 2.765a1.552 1.552 0 0 0-1.572-.244L2.456 9.754a1.543 1.543 0 0 0 .078 2.884L6.4 13.98l2.095 6.926c.004.014.017.023.023.036a.486.486 0 0 0 .093.15a.49.49 0 0 0 .226.143c.01.004.017.013.027.015h.006l.003.001a.448.448 0 0 0 .233-.012c.008-.002.016-.002.025-.005a.495.495 0 0 0 .191-.122c.006-.007.016-.008.022-.014l3.013-3.326l4.397 3.405c.267.209.596.322.935.322c.734 0 1.367-.514 1.518-1.231L22.469 4.25a1.533 1.533 0 0 0-.524-1.486zM9.588 15.295l-.707 3.437l-1.475-4.878l7.315-3.81l-4.997 4.998a.498.498 0 0 0-.136.253zm8.639 4.772a.54.54 0 0 1-.347.399a.525.525 0 0 1-.514-.078l-4.763-3.689a.5.5 0 0 0-.676.06L9.83 19.07l.706-3.427l7.189-7.19a.5.5 0 0 0-.584-.797L6.778 13.054l-3.917-1.362A.526.526 0 0 1 2.5 11.2a.532.532 0 0 1 .334-.518l17.914-7.233a.536.536 0 0 1 .558.086a.523.523 0 0 1 .182.518l-3.261 16.015z"/></svg>
    テンプレート</h2> <br />

    <div class="tile-stats tile-primary frm-head"> テンプレート</div>

    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="{{ route('admin.telegram.create') }}" type="button" class="btn btn-green btn-lg btn-block btn-icon"> {{ __('Create') }} </a>
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
                            <td style="display: flex;">
                                <a href="{{ route('admin.telegram.edit', ['id' => $data->id]) }}" type="button" class="btn btn-success" data-id="{{ $data->id }}">
                                    <svg class="bi bi-pencil"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm ml-1 sidemenu-href delete_btn" data-id="{{ $data->id }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                                </button>
                                <a href="{{ route('admin.telegram.sent', ['id' => $data->id]) }}" type="button" class="btn btn-blue ml-1" data-id="{{ $data->id }}">
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
