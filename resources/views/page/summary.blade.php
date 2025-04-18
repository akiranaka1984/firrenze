@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    <article id="event">
        <h2 class="ttl"><span>当クラブとサービスについて</span></h2>

        {!!  $summary->text_data1 !!}
        {!!  $summary->text_data2 !!}
        {!!  $summary->text_data3 !!}

    </article>

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.recruit') }}"><span itemprop="name">求人情報</span></a>
                <meta itemprop="position" content="2" />
            </li>

            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.summary') }}"><span itemprop="name">当クラブとサービスについて</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>

@endsection
