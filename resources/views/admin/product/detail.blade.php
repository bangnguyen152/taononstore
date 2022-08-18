@extends('layout.master')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
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
                                            @foreach ($images as $image)
                                            <div class="col-lg-4 d-none d-lg-block">
                                                <div class="card">
                                                    <img src="{{ asset('/'.$image->thumbnail) }}" alt="" title="" height="100px" width="100px">
                                                    <div class="card-body">
                                                        <form action="{{route('image.remove',$image->id)}}" method="post" reload="true">
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
                                            @endforeach
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
                <form action="{{route('upload.process',$product)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pt-0">
                        <div class="fv-row mb-2">
                            <div class="dropzone" id="kt_ecommerce_add_product_media">
                                <div class="ms-4">
                                    <input type="file" class="form-control" name="photos[]" multiple/>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-md-end">
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Upload</span>
                                <span class="indicator-progress">Please wait...
											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <form action="{{route('product.update',$product)}}" method="post" enctype="multipart/form-data">
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
                            <label class="required form-label">Product Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control mb-2"
                                   placeholder="Product name" value="{{$product->title}}"/>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A product name is required and recommended to be
                                unique.
                            </div>
                            <!--end::Description-->
                        </div>
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Thumbnail</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control" name="photo" value="{{$product->photo}}"/>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A product name is required and recommended to be
                                unique.
                            </div>
                            <!--end::Description-->
                        </div>
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Product Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <label>
                                <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option"  name="category_id">
                                    <option></option>
                                    <option value="1">Iphone</option>
                                    <option value="2">Ipad</option>
                                    <option value="3">Mac</option>
                                    <option value="4">Apple Watch</option>
                                    <option value="5">Âm Thanh</option>
                                    <option value="6">Phụ Kiện</option>
                                </select>
                            </label>

                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A product name is required and recommended to be
                                unique.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->

                        <div>
                            <!--begin::Label-->
                            <label class="form-label">Description</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample2" rows="8" name="description">{{$product->description}}</textarea>
                                <label class="form-label" for="textAreaExample2"></label>
                            </div>
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set a description to the product for better
                                visibility.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Pricing</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Base Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="price" class="form-control mb-2"
                                   placeholder="Product price" value="{{$product->price}}"/>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the product price.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                                <!--begin::Label-->
                                <!--begin::Label-->
                                @if($product->status===0)
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
    </div>

@endsection
