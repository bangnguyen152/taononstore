@extends('layout.master')
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="d-flex flex-column gap-7 gap-lg-10">
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Image</h2>
                    </div>
                </div>

                <div class="card-body py-4">
                        <!-- Carousel wrapper -->
                        <div
                            id="carouselMultiItemExample"
                            class="carousel slide carousel-dark text-center"
                            data-mdb-ride="carousel"
                        >
                            <!-- Controls -->
                            <!-- Inner -->
                            <div class="carousel-inner py-4">
                                <!-- Single item -->

                                <div class="carousel-item active">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 d-none d-lg-block">
                                                <div class="card" align="center">
                                                    <img src="{{ asset('/'.$banner->thumbnail) }}" alt="" title="" ">
                                                    <div class="card-body">
                                                        <form action="{{route('remove',$banner)}}" method="post" reload="true">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                <span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path
                                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                        fill="currentColor"/>
																	<path opacity="0.5"
                                                                          d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                          fill="currentColor"/>
																	<path opacity="0.5"
                                                                          d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                          fill="currentColor"/>
																</svg>
															</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single item -->

                                <!-- Single item -->
                            </div>
                            <!-- Inner -->
                        </div>
                        <!-- Carousel wrapper -->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
            </div>
            <form action="{{route('banner.update',$banner)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Title </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control mb-2"
                                   placeholder="Product name" value="{{$banner->title}}"/>
                            <!--end::Input-->
                            <!--begin::Description-->

                            <!--end::Description-->
                        </div>
                        <div class="fv-row mb-10">
                            <div class="dropzone" id="kt_ecommerce_add_product_media">
                                <div class="ms-4">
                                    <input type="file" class="form-control" name="photo" value="{{$banner->thumbnail}}"/>
                                </div>
                            </div>
                        </div>
                            <!--end::Col-->
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div>
                            <!--begin::Label-->
                            <label class="form-label">Description</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample2" rows="8" name="description">{{$banner->description}}</textarea>
                                <label class="form-label" for="textAreaExample2"></label>
                            </div>
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set a description to the product for better
                                visibility.
                            </div>
                            <!--end::Description-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Start</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <label>
                                    <input type="date" name="start_at"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="start_at" value="{{$banner->start_at}}"/>
                                </label>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">End</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <label>
                                    <input type="date" name="end_at"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="end_at" value="{{$banner->end_at}}"/>
                                </label>
                            </div>
                            <!--end::Col-->
                        </div>


                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2></h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                                <!--begin::Label-->
                                <!--begin::Label-->
                                @if($banner->status===0)
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

                    </div>
                    <!--end::Card header-->
                    <div class="d-flex justify-content-md-center">
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
