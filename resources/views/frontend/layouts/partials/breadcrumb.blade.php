<!-- breadcrumb -->
<div class="site-breadcrumb" style="background: #0cb0ff;">
    <div class="container">
        <h2 class="breadcrumb-title">{{ $title ?? 'Page Title' }}</h2>
        <ul class="breadcrumb-menu">
            <li><a href="{{ route('frontend.home') }}">Home</a></li>
            @if (!empty($breadcrumbs))
                @foreach ($breadcrumbs as $breadcrumb)
                    <li class="{{ $loop->last ? 'active' : '' }}">
                        @if (!empty($breadcrumb['url']) && !$loop->last)
                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                        @else
                            {{ $breadcrumb['label'] }}
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
<!-- breadcrumb end -->
