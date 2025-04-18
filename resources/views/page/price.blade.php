@extends('page.layout')

@section('content')

    {!! $priceData->text_data1 !!}
    <section class="system" id="system">
        <div class="wrapper">
            <div class="breadcrumbs">
                <div class="breadcrumb_inner">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}" class="home">
                            <span property="name">HOME</span>
                        </a>
                        <meta property="position" content="1">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-page current-item">料金について</span>
                        <meta property="url" content="{{ route('page.price') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="ex_wrap">
                <h3 class="ex_headline">料金システム</h3>
                <p class="ex_txt">
                    当店の料金システムは、クラス毎に明瞭な料金体系になっております。また、プロフィールと異なる女性がお伺いするという、風俗店でありがちな「振替行為」も一切ございませんので安心してご利用ください。
                </p>

                @foreach($categories as $category)
                    <div class="price mgb_30">

                        @if($category->name == "BLACK")
                            <p class="price_info_ttl black_rank">BLACK</p>
                        @elseif($category->name == "PLATINUM")
                            <p class="price_info_ttl platinum_rank">PLATINUM</p>
                        @elseif($category->name == "DIAMOND")
                            <p class="price_info_ttl diamond_rank">DIAMOND</p>
                        @elseif($category->name == "RED DIAMOND")
                            <p class="price_info_ttl red_diamond">RED DIAMOND</p>
                        @endif

                        @if(!empty($category->prices))
                            <table class="price">
                                <tbody>
                                    @foreach($category->prices as $price)
                                        <tr>
                                            <th>{{ $price->time_interval }}</th>
                                            <td>{{ $price->start_price }} {{ !empty($price->end_price) ? " ~ ".($price->end_price) : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endforeach
            </div>

            {!! $priceData->text_data2 !!}
            {!! $priceData->text_data3 !!}

        </div>
    </section>

@endsection
