<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="edit-loader">
                    <div class="sk-chase sk-primary">
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                    </div>
                </div>
                <div class="card mb-6 modal-card" id="user-info">
                    <div class="card-body pt-12">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mb-4" src="{{asset('assets/img/default/user.png')}}"
                                    height="120" width="120" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h5></h5>
                                    <span class="badge bg-label-secondary"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap my-6 gap-0 gap-md-3 gap-lg-4">
                            <div class="d-flex align-items-center gap-4" id="modalSocialIcons">
                            </div>
                        </div>
                        <h5 class="pb-4 border-bottom mb-4">{{ __('Details') }}</h5>
                        <div class="info-container">
                            <ul class="list-unstyled mb-6">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>