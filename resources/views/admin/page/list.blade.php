@extends('admin.layout')

@section('content')
    <hr />
    <!-- <ol class="breadcrumb bc-3">
        <li> <a href="../../dashboard/main/index.html"><i class="fa-home"></i>Home</a> </li>
        <li> <a href="../../ui/panels/index.html">UI Elements</a> </li>
        <li class="active"> <strong>Buttons</strong> </li>
    </ol> -->
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.5 18q-1.05 0-1.775-.725T12 15.5q0-1.05.725-1.775T14.5 13q1.05 0 1.775.725T17 15.5q0 1.05-.725 1.775T14.5 18ZM5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Z"/></svg>
        コンテンツ管理</h2> <br />

    <div class="tile-stats tile-primary frm-head"> コンテンツ管理</div>

    <div class="panel panel-primary contents-adj" data-collapsed="0">
        <form role="form" method="post" action="{{ route('admin.page.save') }}" class="form-horizontal form-groups-bordered" id="frmCompanion" >
            @csrf
            <div class="col-md-2 img-resister">
                <a href="{{ route('admin.gallery.list') }}" class="btn btn-orange">画像をギャラリーに登録する</a>
            </div>
            <div class="row p-1">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3 control-label content-label">{{ __('Page') }}</label>
                        <div class="col-sm-9">
                            <select name="page" class="form-control frm_page_name" >
                                <option></option>
                                <option value="header" {{ $page_name == 'header' ? 'selected' : '' }} >Header</option>
                                <option value="footer" {{ $page_name == 'footer' ? 'selected' : '' }} >Footer</option>
                                <option value="main" {{ $page_name == 'main' ? 'selected' : '' }} >Main</option>
                                <option value="attendance_sheet" {{ $page_name == 'attendance_sheet' ? 'selected' : '' }} >Attendance Sheet</option>
                                <option value="enrollment_table" {{ $page_name == 'enrollment_table' ? 'selected' : '' }} >Enrollment Table</option>
                                <option value="movie" {{ $page_name == 'movie' ? 'selected' : '' }} >Movie</option>
                                <option value="ranking" {{ $page_name == 'ranking' ? 'selected' : '' }} >Ranking</option>
                                <option value="av" {{ $page_name == 'av' ? 'selected' : '' }} >AV Actress</option>
                                <option value="event" {{ $page_name == 'event' ? 'selected' : '' }} >Event</option>
                                <option value="privacy_policy" {{ $page_name == 'privacy_policy' ? 'selected' : '' }} >Privacy Policy</option>
                                <option value="summary" {{ $page_name == 'summary' ? 'selected' : '' }} >Mens recruitment</option>
                                <option value="entry" {{ $page_name == 'entry' ? 'selected' : '' }} >Model recruitment</option>
                                <option value="concept" {{ $page_name == 'concept' ? 'selected' : '' }} >Concept</option>
                                <option value="price" {{ $page_name == 'price' ? 'selected' : '' }} >Price</option>
                                <option value="campaign" {{ $page_name == 'campaign' ? 'selected' : '' }} >Campaign</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>

            <hr/>

            <div class="row p-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="frmShortMessage" class="col-sm-12 control-label" style="text-align:left;">{{ __('Text Data1') }}</label>
                        <div class="col-sm-12 frm-inpt">
                            <div class="row mt-1 pd-adj1">
                                <textarea  name="text_data1" class="form-control" id="frmShortMessage" rows="15" >{{ $text_data1 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="frmShortMessage" class="col-sm-12 control-label"  style="text-align:left;">{{ __('Text Data2') }}</label>
                        <div class="col-sm-12 frm-inpt">
                            <div class="row mt-1 pd-adj1">
                                <textarea  name="text_data2" class="form-control" id="frmShortMessage" rows="15">{{ $text_data2 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="frmShortMessage" class="col-sm-12 control-label"  style="text-align:left;">{{ __('Text Data3') }}</label>
                        <div class="col-sm-12 frm-inpt">
                            <div class="row mt-1 pd-adj1">
                                <textarea  name="text_data3" class="form-control" id="frmShortMessage" rows="15">{{ $text_data3 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <button type="submit" class="btn btn-orange btn-icon-align">
                    <svg class="bi bi-plus-circle-fill"fill=currentColor height=16 viewBox="0 0 16 16"width=16 xmlns=http://www.w3.org/2000/svg><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg>
                    <span class="title ml-1">{{__('SAVE')}}</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('change','.frm_page_name', function(){
                let frm_page_name = $(this).val()
                window.location.href = `{{ route('admin.page.list') }}?page=`+frm_page_name;
            })
        })
    </script>


@endsection
