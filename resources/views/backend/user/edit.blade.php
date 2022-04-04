@extends('layouts.app')

@section('title')
    {{ __('Profile Editing') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 mt-4">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="text-md-start text-center mb-0">{{ __('Personal Detail :') }}</h5>

                    <div class="mt-4 text-md-start text-center d-sm-flex">
                        <img
                            src="{{ asset('templates/landrick/images/client/05.jpg') }}"
                            class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt=""
                        >

                        <div class="mt-md-4 mt-3 mt-sm-0">
                            <a href="javascript:void(0)" class="btn btn-primary mt-2">
                                {{ __('Change Picture') }}
                            </a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary mt-2 ms-2">
                                {{ __('Delete') }}
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="name">
                                        {{ __('Your Name') }}
                                    </label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input
                                            name="name"
                                            id="name"
                                            type="text"
                                            class="form-control ps-5"
                                            placeholder="Name :"
                                            value="{{ $user->name }}"
                                        >
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email">
                                        {{ __('Your Email') }}
                                    </label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input
                                            name="email"
                                            id="email"
                                            type="email"
                                            class="form-control ps-5"
                                            placeholder="Your email :"
                                            value="{{ $user->email }}"
                                        >
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="occupation">
                                        {{ __('Occupation') }}
                                    </label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                        <input
                                            name="occupation"
                                            id="occupation"
                                            type="text"
                                            class="form-control ps-5"
                                            placeholder="Occupation :"
                                        >
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="description">
                                        {{ __('Description') }}
                                    </label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                        <textarea
                                            name="description"
                                            id="description"
                                            rows="4"
                                            class="form-control ps-5"
                                            placeholder="Description :"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <input
                                    type="submit"
                                    id="submit"
                                    name="send"
                                    class="btn btn-primary"
                                    value="Save Changes"
                                >
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div>

            <div class="card border-0 rounded shadow p-4 mt-4">
                <h5 class="mb-0">Contact Info :</h5>

                <form>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="number">{{ __('Phone No. :') }}</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="phone" class="fea icon-sm icons"></i>
                                    <input
                                        name="number" id="number" type="number" class="form-control ps-5"
                                        placeholder="Phone :"
                                    >
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="url">{{ __('Website :') }}</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="globe" class="fea icon-sm icons"></i>
                                    <input name="url" id="url" type="url" class="form-control ps-5" placeholder="Url :">
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12 mt-2 mb-0">
                            <button class="btn btn-primary">Add</button>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 mt-4">
            <div class="card border-0 rounded shadow p-4">
                <h5 class="mb-0">{{ __('Change password :') }}</h5>
                <form>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="old_password">{{ __('Old password :') }}</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input
                                        id="old_password"
                                        type="password" class="form-control ps-5" placeholder="Old password" required=""
                                    >
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="new_password">New password :</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input
                                        id="new_password"
                                        type="password" class="form-control ps-5" placeholder="New password" required=""
                                    >
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label
                                    class="form-label" for="password_confirmation"
                                >{{ __('Re-type New password :') }}</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input
                                        id="password_confirmation"
                                        type="password" class="form-control ps-5" placeholder="Re-type New password"
                                        required=""
                                    >
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12 mt-2 mb-0">
                            <button class="btn btn-primary">
                                {{ __('Save password') }}
                            </button>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>

            <div class="card border-0 rounded shadow p-4 mt-4">
                <h5 class="mb-0">
                    {{ __('Account Notifications :') }}
                </h5>

                <div class="mt-4">
                    <div class="d-flex justify-content-between pb-4">
                        <h6 class="mb-0">{{ __('When someone mentions me') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="noti1">
                            <label class="form-check-label" for="noti1"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-4 border-top">
                        <h6 class="mb-0">{{ __('When someone follows me') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" checked id="noti2">
                            <label class="form-check-label" for="noti2"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-4 border-top">
                        <h6 class="mb-0">{{ __('When shares my activity') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="noti3">
                            <label class="form-check-label" for="noti3"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-4 border-top">
                        <h6 class="mb-0">{{ __('When someone messages me') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="noti4">
                            <label class="form-check-label" for="noti4"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 mt-4">
            <div class="card border-0 rounded shadow p-4">
                <h5 class="mb-0">{{ __('Marketing Notifications :') }}</h5>

                <div class="mt-4">
                    <div class="d-flex justify-content-between pb-4">
                        <h6 class="mb-0">{{ __('There is a sale or promotion') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="noti5">
                            <label class="form-check-label" for="noti5"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-4 border-top">
                        <h6 class="mb-0">{{ __('Company news') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="noti6">
                            <label class="form-check-label" for="noti6"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-4 border-top">
                        <h6 class="mb-0">{{ __('Weekly jobs') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" checked id="noti7">
                            <label class="form-check-label" for="noti7"></label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-4 border-top">
                        <h6 class="mb-0">{{ __('Unsubscribe News') }}</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" checked id="noti8">
                            <label class="form-check-label" for="noti8"></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 rounded shadow p-4 mt-4">
                <h5 class="mb-0 text-danger">
                    {{ __('Delete Account :') }}
                </h5>

                <div class="mt-4">
                    <h6 class="mb-0">
                        {{ __('Do you want to delete the account? Please press below "Delete" button') }}
                    </h6>
                    <div class="mt-4">
                        <button class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </div><!--end col-->
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection
