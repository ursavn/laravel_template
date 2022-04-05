@extends('layouts.app')

@section('title')
    {{ __('Profile') }}
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div
                class="bg-primary card border-0 shadow rounded overflow-hidden p-4"
                style="background: url('templates/landrick/images/account/bg.png') center;"
            >
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="text-center bg-white p-4 rounded">
                            <img
                                src="{{ asset('templates/landrick/images/client/05.jpg') }}" class="rounded-circle shadow avatar avatar-md-md"
                                alt=""
                            >
                            <h5 class="mt-3 mb-0">{{ $user->name }}</h5>
                            <small class="text-muted">UI / UX Designer</small>

                            <ul class="list-unstyled social-icon social mb-0 mt-4">
                                <li class="list-inline-item mb-0">
                                    <a href="javascript::void(0)" class="rounded">
                                        <i class="ti ti-brand-dribbble align-middle" title="dribbble"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="javascript::void(0)" class="rounded">
                                        <i class="ti ti-brand-facebook align-middle" title="facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="javascript::void(0)" class="rounded">
                                        <i class="ti ti-brand-instagram align-middle" title="instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="javascript::void(0)" class="rounded">
                                        <i class="ti ti-brand-twitter align-middle" title="twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="javascript::void(0)" class="rounded">
                                        <i class="ti ti-mail align-middle" title="email"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="javascript::void(0)" class="rounded">
                                        <i class="ti ti-world align-middle" title="website"></i>
                                    </a>
                                </li>
                            </ul><!--end icon-->

                            <div class="row mt-4">
                                <div class="col-6 text-center">
                                    <i class="ti ti-user-plus text-primary mb-2 fs-5"></i>
                                    <h5 class="mb-0">2588</h5>
                                    <p class="text-muted mb-0">Followers</p>
                                </div><!--end col-->
                                <div class="col-6 text-center">
                                    <i class="ti ti-users text-primary mb-2 fs-5"></i>
                                    <h5 class="mb-0">454</h5>
                                    <p class="text-muted mb-0">Following</p>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-6 mt-4 order-md-1 order-lg-2 order-1">
            <div class="card border-0 shadow rounded p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templates/landrick/images/client/05.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">Cristina Julia</h6>
                            <small class="text-muted">13th Sept 2021 at 11:04AM</small>
                        </div>
                    </div>

                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3">
                            <a class="dropdown-item text-dark" href="#">
                                <span class="mb-0 d-inline-block me-1">
                                    <i class="ti ti-settings"></i>
                                </span> Edit
                            </a>
                            <a class="dropdown-item text-dark" href="#">
                                <span class="mb-0 d-inline-block me-1">
                                    <i class="ti ti-trash"></i>
                                </span> Delete
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="javascript:void(0)">
                        <img src="{{ asset('templates/landrick/images/blog/bg1.jpg') }}" class="img-fluid rounded" alt="">
                    </a>
                </div>

                <div class="mt-4">
                    <div class="post-meta d-flex justify-content-between">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item me-2 mb-0">
                                <a href="javascript:void(0)" class="text-muted like">
                                    <i class="ti ti-heart me-1"></i>33
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="text-muted comments">
                                    <i class="ti ti-message-circle me-1"></i>08
                                </a>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" class="text-muted">
                            <i class="ti ti-share"></i>
                        </a>
                    </div>

                    <ul class="media-list list-unstyled mb-0 border-top mt-4">
                        <li class="mt-4">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a class="pe-3" href="#">
                                        <img src="{{ asset('templates/landrick/images/client/01.jpg') }}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                    </a>
                                    <div class="commentor-detail">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)" class="text-dark media-heading">
                                                Lorenzo Peterson
                                            </a>
                                        </h6>
                                        <small class="text-muted">
                                            15th September, 2021 at 01:25 pm
                                        </small>
                                    </div>
                                </div>
                                <a href="#" class="text-muted">
                                    <i class="mdi mdi-reply"></i> Reply
                                </a>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted fst-italic p-3 bg-light rounded">
                                    " There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "
                                </p>
                            </div>
                        </li>

                        <li class="mt-4">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a class="pe-3" href="#">
                                        <img src="{{ asset('templates/landrick/images/client/02.jpg') }}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                    </a>
                                    <div class="commentor-detail">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)" class="media-heading text-dark">
                                                Tammy Camacho
                                            </a>
                                        </h6>
                                        <small class="text-muted">
                                            15th September, 2021 at 05:44 pm
                                        </small>
                                    </div>
                                </div>
                                <a href="#" class="text-muted">
                                    <i class="mdi mdi-reply"></i> Reply
                                </a>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted fst-italic p-3 bg-light rounded">
                                    " There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow rounded p-4 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templates/landrick/images/client/05.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                Cristina Julia
                            </h6>
                            <small class="text-muted">
                                13th Sept 2021 at 11:04AM
                            </small>
                        </div>
                    </div>

                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3">
                            <a class="dropdown-item text-dark" href="#">
                                <span class="mb-0 d-inline-block me-1">
                                    <i class="ti ti-settings"></i>
                                </span> Edit
                            </a>
                            <a class="dropdown-item text-dark" href="#">
                                <span class="mb-0 d-inline-block me-1">
                                    <i class="ti ti-trash"></i>
                                </span> Delete
                            </a>
                        </div>
                    </div>
                </div>

                <p class="text-muted mb-0 mt-4">Business metting 🤑</p>

                <div class="mt-4">
                    <a href="javascript:void(0)">
                        <img src="{{ asset('templates/landrick/images/blog/bg2.jpg') }}" class="img-fluid rounded" alt="">
                    </a>
                </div>

                <div class="mt-4">
                    <div class="post-meta d-flex justify-content-between">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item me-2 mb-0">
                                <a href="javascript:void(0)" class="text-muted like">
                                    <i class="ti ti-heart me-1"></i>33
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="text-muted comments">
                                    <i class="ti ti-message-circle me-1"></i>08
                                </a>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" class="text-muted">
                            <i class="ti ti-share"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow rounded p-4 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templates/landrick/images/client/05.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                Cristina Julia
                            </h6>
                            <small class="text-muted">
                                13th Sept 2021 at 11:04AM
                            </small>
                        </div>
                    </div>

                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3">
                            <a class="dropdown-item text-dark" href="#">
                                <span class="mb-0 d-inline-block me-1">
                                    <i class="ti ti-settings"></i>
                                </span> Edit
                            </a>
                            <a class="dropdown-item text-dark" href="#">
                                <span class="mb-0 d-inline-block me-1">
                                    <i class="ti ti-trash"></i>
                                </span> Delete
                            </a>
                        </div>
                    </div>
                </div>

                <p class="text-muted mb-0 mt-4">Fresh vegetables and fruits 🤑</p>

                <div class="mt-4">
                    <a href="javascript:void(0)">
                        <img src="{{ asset('templates/landrick/images/blog/bg3.jpg') }}" class="img-fluid rounded" alt="">
                    </a>
                </div>

                <div class="mt-4">
                    <div class="post-meta d-flex justify-content-between">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item me-2 mb-0">
                                <a href="javascript:void(0)" class="text-muted like">
                                    <i class="ti ti-heart me-1"></i>33
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="text-muted comments">
                                    <i class="ti ti-message-circle me-1"></i>08
                                </a>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" class="text-muted">
                            <i class="ti ti-share"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <span class="h6 mb-0">Loading.. <i class="mdi mdi-loading mdi-spin h4 mb-0 align-middle"></i></span>
            </div>
        </div><!--end col-->

        <div class="col-lg-3 col-md-6 mt-4 order-md-2 order-lg-1 order-2">
            <div class="card border-0 rounded shadow p-4">
                <h5 class="mb-0">
                    {{ __('Personal Details :') }}
                    <a href="{{ route('profile.edit') }}" class="text-muted float-end">
                        <i class="ti ti-edit icon-ex-lg"></i>
                    </a>
                </h5>
                <div class="mt-4">
                    <div class="d-flex align-items-center">
                        <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">
                                {{ __('Email :') }}
                            </h6>
                            <a href="javascript:void(0)" class="text-muted">
                                {{ $user->email }}
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <i data-feather="bookmark" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">
                                {{ __('Skills :') }}
                            </h6>
                            <a href="javascript:void(0)" class="text-muted">html</a>, <a href="javascript:void(0)" class="text-muted">css</a>, <a href="javascript:void(0)" class="text-muted">js</a>, <a href="javascript:void(0)" class="text-muted">mysql</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <i data-feather="italic" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">{{ __('Language :') }}</h6>
                            <a href="javascript:void(0)" class="text-muted">English</a>, <a href="javascript:void(0)" class="text-muted">Japanese</a>, <a href="javascript:void(0)" class="text-muted">Chinese</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <i data-feather="globe" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">{{ __('Website :') }}</h6>
                            <a href="javascript:void(0)" class="text-muted">
                                www.kristajoseph.com
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <i data-feather="gift" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">{{ __('Birthday :') }}</h6>
                            <p class="text-muted mb-0">2nd March, 1996</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <i data-feather="map-pin" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">{{ __('Location :') }}</h6>
                            <a href="javascript:void(0)" class="text-muted">Beijing, China</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <i data-feather="phone" class="fea icon-ex-md text-muted me-3"></i>
                        <div class="flex-1">
                            <h6 class="text-primary mb-0">{{ __('Cell No :') }}</h6>
                            <a href="javascript:void(0)" class="text-muted">(+12) 1254-56-4896</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 rounded shadow p-4 mt-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Followers :</h5>
                    <a href="javascript:void(0)" class="text-muted">See more <i class="ti ti-arrow-right"></i></a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/01.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Calvin Carlo
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/02.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Nobita Kety
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/03.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Nairobi Valy
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/04.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">Cristino Julia</h6>
                            <small class="text-muted">Designer</small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/06.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Justin Lata
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-3 col-md-6 mt-4 order-md-2 order-lg-3 order-3">
            <div class="card border-0 rounded shadow p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('Following :') }}</h5>
                    <a href="javascript:void(0)" class="text-muted">
                        See more <i class="ti ti-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/01.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Calvin Carlo
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/02.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Nobita Kety
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/03.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Nairobi Valy
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/04.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Cristino Julia
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" class="d-flex align-items-center mt-4">
                        <img src="{{ asset('templates/landrick/images/client/06.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0 text-dark">
                                Justin Lata
                            </h6>
                            <small class="text-muted">
                                Designer
                            </small>
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}" class="text-primary">
                        <i class="ti ti-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="card border-0 rounded shadow p-4 widget mt-4">
                <h5 class="mb-0">Latest Picture :</h5>
                <div class="widget-grid overflow-hidden mt-3">
                    <div class="item">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('templates/landrick/images/blog/travel/01.jpg') }}" alt="img-missing" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('templates/landrick/images/blog/travel/02.jpg') }}" alt="img-missing" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('templates/landrick/images/blog/travel/03.jpg') }}" alt="img-missing" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('templates/landrick/images/blog/travel/04.jpg') }}" alt="img-missing" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('templates/landrick/images/blog/travel/05.jpg') }}" alt="img-missing" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('templates/landrick/images/blog/travel/06.jpg') }}" alt="img-missing" class="img-fluid rounded">
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-0 rounded shadow p-4 mt-4">
                <h5 class="mb-0">Recent News :</h5>

                <div class="mt-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templates/landrick/images/blog/01.jpg') }}" class="avatar avatar-small rounded" style="width: auto;" alt="">
                        <div class="flex-1 ms-3">
                            <a href="agency-blog-detail.html" class="d-block widget-post-title text-dark">Consultant Business</a>
                            <span class="text-muted">16th August 2021</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <img src="{{ asset('templates/landrick/images/blog/02.jpg') }}" class="avatar avatar-small rounded" style="width: auto;" alt="">
                        <div class="flex-1 ms-3">
                            <a href="agency-blog-detail.html" class="d-block widget-post-title text-dark">Grow Your Business</a>
                            <span class="text-muted">16th August 2021</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <img src="{{ asset('templates/landrick/images/blog/03.jpg') }}" class="avatar avatar-small rounded" style="width: auto;" alt="">
                        <div class="flex-1 ms-3">
                            <a href="agency-blog-detail.html" class="d-block widget-post-title text-dark">Look On The Glorious Balance</a>
                            <span class="text-muted">16th August 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">{{ __('Profile') }}</div>--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div>Name: {{ $user->name }}</div>--}}
    {{--                        <div>Email: {{ $user->email }}</div>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-footer">--}}
    {{--                        <a class="btn btn-info" href="{{ route('profile.edit') }}">Edit</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
