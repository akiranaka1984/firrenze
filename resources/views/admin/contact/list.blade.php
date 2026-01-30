@extends('admin.layout')

@section('content')
    <div class="page-header-block">
        <h2>お問い合わせ管理</h2>
    </div>

    <div class="tile-stats tile-primary frm-head">お問い合わせリスト</div>

    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="w-10"></th>
                    <th class="w-20">メールアドレス</th>
                    <th class="w-20">件名</th>
                    <th class="w-50">メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td class="td-actions">
                            <button type="button" class="btn btn-danger btn-sm sidemenu-href delete_btn" data-id="{{ $contact->id }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            </button>
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click','.delete_btn',function(){
                let id = $(this).attr('data-id')
                window.location.href = `{{ route('admin.contact.delete') }}?id=`+id;
            })
        })
    </script>


@endsection
