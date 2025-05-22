
<form id="filterForm" method="GET" action="{{ route('frontend.inventory') }}">
    <div class="car-sidebar">
        <div class="car-widget" style="margin-bottom: 0 !important;">
            <div class="car-search-form">
                <h4 class="car-widget-title">Search</h4>
                <form action="{{ route('frontend.inventory') }}" method="GET">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="car-widget" style="background: transparent !important; margin-top: 0 !important;">
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#filtersModal">
                Additional Filters
            </button>
        </div>
        <div class="car-widget">
            <h4 class="car-widget-title">Brands</h4>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="brand"
                            {{ !request('brands') ? 'checked' : '' }}>
                        <label class="form-check-label" for="brand"> All Brands</label>
                    </div>
                </li>
                @if (isset($carBrands) && count($carBrands) > 0)
                    @foreach ($carBrands as $brand)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="brands[]"
                                    value="{{ $brand->id }}" id="brand{{ $brand->id }}"
                                    {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="brand{{ $brand->id }}">
                                    {{ $brand->name }}</label>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="car-widget">
            <h4 class="car-widget-title">Price Range</h4>
            <div class="price-range-box">
                <div class="price-range-input">
                    <input type="text" id="price-amount" readonly>
                </div>
                <div class="price-range" data-max="{{ $maxPrice }}"
                    data-symbol="{{ \App\Helpers\Helper::currencySymbol() }}"></div>
                <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', $maxPrice) }}">
            </div>
        </div>
        <div class="car-widget">
            <h4 class="car-widget-title">Year</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>From</label>
                        <select name="from_year" id="fromYearSelect" class="select">
                            <option selected disabled>Year</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>To</label>
                        <select name="to_year" id="toYearSelect" class="select">
                            <option selected disabled>Year</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="car-widget">
            <h4 class="car-widget-title">Transmission</h4>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tran1" name="transmission[]"
                            value="automatic"
                            {{ in_array('automatic', request('transmission', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tran1"> Automatic</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tran2" name="transmission[]"
                            value="manual" {{ in_array('manual', request('transmission', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tran2"> Manual</label>
                    </div>
                </li>
            </ul>
        </div>
        {{-- <div class="car-widget">
            <h4 class="car-widget-title">Condition</h4>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tran1" name="condition[]" value="new" {{ in_array('new', request('condition', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tran1"> New</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tran2" name="condition[]" value="used"  {{ in_array('used', request('condition', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tran2"> Used</label>
                    </div>
                </li>
            </ul>
        </div> --}}
        <div class="car-widget">
            <h4 class="car-widget-title">Fuel Type</h4>
            <ul>
                @if (isset($carFuelTypes) && count($carFuelTypes) > 0)
                    @foreach ($carFuelTypes as $fuelType)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fuel{{ $fuelType->id }}"
                                    name="fuel_types[]" value="{{ $fuelType->id }}"
                                    {{ in_array($fuelType->id, request('fuel_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="fuel{{ $fuelType->id }}">
                                    {{ $fuelType->name }}</label>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="car-widget">
            <h4 class="car-widget-title">Features</h4>
            <ul>
                @if (isset($carFeatures) && count($carFeatures) > 0)
                    @foreach ($carFeatures as $feature)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="feature{{ $feature->id }}"
                                    name="features[]" value="{{ $feature->name }}"
                                    {{ in_array($feature->name, request('features', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="feature{{ $feature->id }}">
                                    {{ $feature->name }}</label>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</form>
