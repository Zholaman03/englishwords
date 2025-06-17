@extends('layouts.user')

@section('content')

    <div class="container">
    <div class="card shadow-sm" style="max-width: 540px; margin: 0 auto;">
        <div class="row g-0">
            <div class="col-md-4 p-3 text-center">
                <img src="https://randomuser.me/api/portraits/men/64.jpg" class="rounded-circle img-thumbnail" alt="Profile Picture">
                <div class="mt-2">
                    <span class="badge bg-success">Online</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        John Doe
                        <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                    </h5>
                    <p class="card-text text-muted">
                        <i class="fas fa-briefcase"></i> Senior Developer
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i> San Francisco, CA
                            </small>
                    </p>
                    <div class="border-top pt-2">
                        <div class="row text-center">
                            <div class="col">
                                <h6>Projects</h6>
                                <strong>25</strong>
                            </div>
                            <div class="col border-start">
                                <h6>Following</h6>
                                <strong>142</strong>
                            </div>
                            <div class="col border-start">
                                <h6>Followers</h6>
                                <strong>289</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-around">
                <button class="btn btn-link text-decoration-none">
                        <i class="fas fa-user-plus"></i> Follow
                    </button>
                <button class="btn btn-link text-decoration-none">
                        <i class="fas fa-envelope"></i> Message
                    </button>
                <button class="btn btn-link text-decoration-none">
                        <i class="fas fa-share"></i> Share
                    </button>
            </div>
        </div>
    </div>
</div>

@endsection