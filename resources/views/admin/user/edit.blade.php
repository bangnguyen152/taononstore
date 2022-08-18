@extends('layout.master')
@section('content');
    <div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class=" container-xxl ">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                         data-bs-target="#kt_account_profile_details" aria-expanded="true"
                         aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>

                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="post"
                              action="{{route('update',$user)}}">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Full
                                        Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="full_name"
                                                       class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                       value="{{$user->full_name}}"
                                                       placeholder="Full Name"/>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->

                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="email"
                                               class="form-control form-control-lg form-control-solid"
                                               value="{{$user->email}}"
                                               placeholder="Email"/>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        Phone Number
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="phone_number"
                                               class="form-control form-control-lg form-control-solid"
                                               value="{{$user->phone_number}}"
                                               placeholder="Phone number"/>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Address</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="address"
                                               class="form-control form-control-lg form-control-solid"
                                               value="{{$user->address}}"
                                               placeholder="Address"/>
                                    </div>
                                    <!--end::Col-->
                                </div>
                               <!-- <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Password</label>

                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password"
                                               class="form-control form-control-lg form-control-solid"
                                               value=""
                                               placeholder="Password"/>
                                    </div>-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Level</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!--begin::Options-->
                                        <div class="d-flex align-items-center mt-3">
                                            <!--begin::Option-->
                                            @if(checkSuperAdmin())
                                            <label class="form-check form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="level" type="radio"
                                                       value="1"/>
                                                <span class="fw-bold ps-2 fs-6">Admin</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-inline form-check-solid">
                                                <input class="form-check-input" name="level" type="radio"
                                                       value="0" />
                                                <span class="fw-bold ps-2 fs-6">SuAdmin</span>
                                            </label>
                                            @else
                                            <label class="form-check form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="level" type="radio"
                                                       value="1"/>
                                                <span class="fw-bold ps-2 fs-6">Admin</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-inline form-check-solid">
                                                <input class="form-check-input" name="level" type="radio"
                                                       value="0" disabled/>
                                                <span class="fw-bold ps-2 fs-6">SuAdmin</span>
                                            </label>
                                            @endif
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    @if($user->status==0)
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch fv-row">
                                                <label>
                                                    <input class="form-check-input w-45px h-30px" type="checkbox"
                                                           name="status" value="active"/>
                                                </label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch fv-row">
                                                <label>
                                                    <input class="form-check-input w-45px h-30px" type="checkbox"
                                                           name="status" value="active" checked/>
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    <!--begin::Label-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">
                                    Discard
                                </button>
                                <button type="submit" class="btn btn-primary"
                                        id="kt_account_profile_details_submit">Update
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>

                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Post-->
</div>
@endsection
