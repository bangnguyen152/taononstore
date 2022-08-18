@extends('layout.master')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class=" container-xxl ">
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    <td>
                                        CPU
                                    </td>
                                    <td>
                                        {{$product_detail->chip}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ram
                                    </td>
                                    <td>
                                        {{$product_detail->ram}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Màn hình
                                    </td>
                                    <td>
                                        {{$product_detail->display}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ổ cứng
                                    </td>
                                    <td>
                                        {{$product_detail->capacity}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Đồ họa và âm thanh
                                    </td>
                                    <td>
                                        {{$product_detail->graphic_sound}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Cổng kết nối
                                    </td>
                                    <td>
                                        {{$product_detail->connector}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Kích thước và trọng lượng
                                    </td>
                                    <td>
                                        {{$product_detail->size_weight}}                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Thông tin khác
                                    </td>
                                    <td>
                                        {{$product_detail->other}}                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                    <div>
                        <section style="background-color: #f7f6f6;">
                            <div class="container my-5 py-5 text-dark">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h4 class="text-dark mb-0">Comments</h4>
                                            <div class="card">
                                                <div class="card-body p-2 d-flex align-items-center">
                                                    <h6 class="text-primary fw-bold small mb-0 me-1">Comments "ON"</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                                                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($comments as $comment)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex flex-start">
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="40"
                                                         height="40" />
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h6 class="text-primary fw-bold mb-0">
                                                                {{$comment->full_name}}
                                                                <span class="text-dark ms-2">{{$comment->comment}}</span>
                                                            </h6>
                                                            <p class="mb-0">{{$comment->time}}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="small mb-0" style="color: #aaa;">
                                                                <a href="#!" class="link-grey">Remove</a> •
                                                                <a href="#!" class="link-grey">Reply</a> •
                                                                <a href="#!" class="link-grey">Translate</a>
                                                            </p>
                                                            <div class="d-flex flex-row">
                                                                <i class="fas fa-star text-warning me-2"></i>
                                                                <i class="far fa-check-circle" style="color: #aaa;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                <!--end::Container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Post-->
    </div>
    </div>
@endsection
