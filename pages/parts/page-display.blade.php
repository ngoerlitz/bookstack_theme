<div dir="auto">

    <h1 class="break-text page-title" id="bkmrk-page-title">{{$page->name}}</h1>

    <hr class="secondary-background">

    <div style="clear:left;"></div>

    @if (isset($diff) && $diff)
        {!! $diff !!}
    @else
        {!! isset($page->renderedHTML) ? $page->renderedHTML : $page->html !!}
    @endif
</div>