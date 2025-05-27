<div class="user-profile-sidebar">
    <div class="user-profile-sidebar-top">
        <div class="user-profile-img">
            <img src="{{ asset(Auth::user()->profile->profile_image ?? 'assets/img/default/user.png') }}"
                alt="{{ Auth::user()->name }}">
            <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
            <input type="file" class="profile-img-file" id="profile-img-file">
        </div>
        <h5>{{ Auth::user()->name }}</h5>
        <p><a href="#">{{ Auth::user()->email }}</a></p>
    </div>
    <ul class="user-profile-sidebar-list">
        <li><a class="{{ request()->routeIs('frontend.dashboard') ? 'active' : '' }}"
                href="{{ route('frontend.dashboard') }}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
        <li><a class="{{ request()->routeIs('frontend.profile') ? 'active' : '' }}"
                href="{{ route('frontend.profile') }}"><i class="far fa-user"></i> My Profile</a></li>
        <li><a class="{{ request()->routeIs('frontend.my-listings') ? 'active' : '' }}"
                href="{{ route('frontend.my-listings') }}"><i class="far fa-layer-group"></i> My Listing</a></li>
        <li><a class="{{ request()->routeIs('frontend.add-listings') ? 'active' : '' }}"
                href="{{ route('frontend.add-listings') }}"><i class="far fa-plus-circle"></i> Add Listing</a></li>
        <li><a class="{{ request()->routeIs('frontend.my-favourites') ? 'active' : '' }}"
                href="{{ route('frontend.my-favourites') }}"><i class="far fa-heart"></i> My Favorites</a></li>
        {{-- <li><a href="profile-message.html"><i class="far fa-envelope"></i> Messages <span
                    class="badge badge-danger">02</span></a></li> --}}
        {{-- <li><a class="{{ request()->routeIs('frontend.settings') ? 'active' : '' }}"
                href="{{ route('frontend.settings') }}"><i class="far fa-gear"></i> Settings</a></li> --}}
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
                <i class="far fa-sign-out"></i> Logout
            </a>
            <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            $('#profile-img-file').on('change', function() {
                let fileInput = this;

                if (fileInput.files && fileInput.files[0]) {
                    let formData = new FormData();
                    formData.append('profile_image', fileInput.files[0]);

                    $.ajax({
                        url: '{{ route('frontend.update-profile-image') }}', // define this route in web.php
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            // Optionally show a loader
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function() {
                            alert('Failed to upload image.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
