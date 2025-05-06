<!-- resources/views/partials/breadcrumb.blade.php -->
<div class="breadcrumb-area breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">{{ $title ?? 'Page Title' }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        @if (!empty($breadcrumbs))
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="tmp-breadcrumb-item {{ $loop->last ? 'active' : '' }}">
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
        </div>
    </div>
</div>
