@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.92 11H18v2h-5v2h5v2h-5v4h-2v-4H6v-2h5v-2H6v-2h4.08L5 3h2.37L12 10.29L16.63 3H19l-5.08 8Z"/></svg>
    価格</h2> <br />
    
    <div class="tile-stats tile-primary frm-head"> 価格</div>
        
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary" >
                <div class="panel-body">
                        
                    <form method="post" action="{{ route('admin.price.save') }}" role="form" class="form-horizontal form-groups-bordered">
                        @csrf
                        <input type="hidden" name="id" id="txtId" value="{{ $category_id }}" > 
                        <table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th class="w-33">時間</th> 
                                    <th>金額</th> 
                                    <th>備考</th> 
                                    <th></th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td class="text-center text-dark">  
                                        <input type="text" name="time_interval" class="form-control" required/>  
                                    </td>
                                    <td> 
                                        <input type="text" name="start_price" class="form-control" required/> 
                                    </td>
                                    <td class="text-center text-dark">  
                                        <input type="text" name="end_price" class="form-control"/>  
                                    </td>
                                    <td class="text-center text-dark">  
                                        <button type="submit" class="btn btn-success btn-icon-align">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path fill="currentColor" d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16z"/></svg>
                                            <span class="title ml-1">追加</span>
                                        </button>
                                    </td>
                                </tr> 
                            </tbody> 
                        </table> 
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12"> 

        <table class="table table-bordered"> 
            <thead> 
                <tr> 
                    <th class="w-50">時間</th> 
                    <th>金額</th> 
                    <th>備考</th> 
                    <th></th> 
                </tr> 
            </thead> 
            <tbody id="left-events" class="dragula"> 
                
                @foreach($prices as $price)
                    <tr class="trow" data-id="{{ $price->id }}"> 
                        <td class="text-center text-dark">{{ $price->time_interval }}</td>
                        <td class="text-center text-dark">{{ $price->start_price }}</td>
                        <td class="text-center text-dark">{{ $price->end_price }}</td>
                        <td class="text-center text-dark">  
                            <button type="button" class="btn btn-danger btn-sm ml-1 delete_btn" data-id="{{ $price->id }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            </button>
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
                window.location.href = "/admin/price/delete?id="+id;
            }
        })
    })


    $(document).on('click','.save_all_position', function(){
        $.ajax({
            type: 'POST',
            url: `{{ route('admin.price.position.save') }}`,
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