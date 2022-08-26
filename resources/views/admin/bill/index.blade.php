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
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                          height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                          fill="currentColor"/>
													<path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="currentColor"/>
												</svg>
											</span>
                                    <!--end::Svg Icon-->
                                    <form method="get" action="{{ route('order')}}" class="form-inline mr-auto">
                                        <input type="search" data-kt-user-table-filter="search"
                                               class="form-control form-control-solid w-250px ps-14"
                                               name="search" value="{{$search}}"
                                               placeholder="Search">
                                    </form>
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                                    <!--begin::Add user-->
{{--                                    <button type="button" onclick="location.href='{{route('product.create')}}'"--}}
{{--                                            class="btn btn-primary" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#kt_modal_add_user">--}}
{{--                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->--}}
{{--                                        <span class="svg-icon svg-icon-2">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                         viewBox="0 0 24 24" fill="none">--}}
{{--                                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"--}}
{{--                                                              rx="1" transform="rotate(-90 11.364 20.364)"--}}
{{--                                                              fill="currentColor"/>--}}
{{--                                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1"--}}
{{--                                                              fill="currentColor"/>--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}
{{--                                        <!--end::Svg Icon-->Add Product--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                            <!--end::Add user-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <!--end::Group actions-->
                        <!--begin::Modal - Adjust Balance-->
                        <!--end::Modal - New Card-->
                        <!--begin::Modal - Add task-->
                        <!--end::Modal - Add task-->
                        <!--end::Card toolbar-->

                        <!--begin::Card toolbar-->
                        <!--end::Card toolbar-->
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th class="min-w-125px">Tên Người Đặt</th>
                                    <th class="min-w-125px">Địa Chỉ</th>
                                    <th class="min-w-125px">Ngày Đặt</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">Trạng Thái</th>
                                    <th class="min-w-125px">Chi Tiết</th>
                                    <th class="text-end min-w-100px">Thao Tác</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-bold">
                                <!--begin::Table row-->
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                @foreach($bills as $bill)
                                    <tr>
                                        <!--end::Checkbox-->
                                        <!--begin::User=-->
                                        <td>{{ $bill->id }}</td>
                                        <td>
                                        <div class="ms-5">
                                            <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bolder">
                                                {{ $bill->full_name }}
                                            </a>
                                        </div>
                                        </td>
                                        <!--end::User=-->
                                        <!--begin::Role=-->
                                        <!--end::Role=-->
                                        <!--begin::Last login=-->
                                        <td>
                                                    {{ $bill->address }}
                                        </td>
                                        <td>
                                            {{ $bill->order_date }}
                                        </td>
                                        <td>
                                            {{ $bill->email }}
                                        </td>
                                        <td>
                                            @if($bill->status===0)
                                                <div class="badge badge-light-warning fw-bolder">Chưa xử lí
                                                </div>
                                            @elseif($bill->status===1)
                                                <div class="badge badge-light-success fw-bolder">Đã duyệt
                                                </div>
                                            @elseif($bill->status===2)
                                                <div class="badge badge-light-info fw-bolder">Đang giao
                                                </div>
                                            @elseif($bill->status===3)
                                                <div class="badge badge-light-primary fw-bolder">Đã giao
                                                </div>
                                            @elseif($bill->status===4)
                                                <div class="badge badge-light-danger fw-bolder">Thất bại
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="ms-5">
                                                <form action="{{route('bill.detail',$bill->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button  type='submit' class="btn btn-light">
                                                    Chi tiết
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            @if(checkSuperAdmin())
                                                <form action="{{route('bill.destroy',$bill)}}" method="post">
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
                                            @endif
                                            <!--end::Action=-->
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex flex-wrap py-2 mr-3">
                                    {{$bills->links()}}
                                </div>
                            </div>
                            <!--end::Table-->
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
