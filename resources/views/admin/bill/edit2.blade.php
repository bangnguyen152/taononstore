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
                        <section class="content">
                            <!-- Default box -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container123  col-md-6"   style="">
                                                <h4></h4>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th class="col-md-4">Thông tin khách hàng</th>
                                                        <th class="col-md-6"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Thông tin người đặt hàng</td>
                                                        <td>{{ $bills->full_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ngày đặt hàng</td>
                                                        <td>{{ $bills->order_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại</td>
                                                        <td>{{ $bills->phone_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Địa chỉ</td>
                                                        <td>{{ $bills->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $bills->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ghi chú</td>
                                                        <td>{{ $bills->bill_note }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting col-md-1" >STT</th>
                                                    <th class="sorting col-md-2">Tên sản phẩm</th>
                                                    <th class="sorting col-md-2">Số lượng</th>
                                                    <th class="sorting col-md-2">Mã giảm giá</th>
                                                    <th class="sorting col-md-2">Giá tiền</th>
                                                </thead>
                                                <tbody>
                                                @foreach($bill_details as $key => $bill)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $bill->product_name }}</td>
                                                        <td>{{ $bill->number }}</td>
                                                        <td></td>
                                                        <td>{{ number_format($bill->price) }} VNĐ</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1"><b>Tổng tiền</b></td>
                                                        <td colspan="1"><b class="text-red">{{ number_format($bill->price) }} VNĐ</b></td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form action="{{route('bill.update',$bills->bill_id)}}" method="POST">
                                            @csrf
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <div class="form-inline">
                                                    <label>Trạng thái giao hàng: </label>
                                                    <label>
                                                        <select name="status" class="form-control input-inline" style="width: 200px" >
                                                            <option value=""></option>
                                                            <option value="0">Chưa xử lí</option>
                                                            <option value="1">Đã duyệt</option>
                                                            <option value="2">Đang giao</option>
                                                            <option value="3">Đã giao</option>
                                                            <option value="4">Thất bại</option>
                                                        </select>
                                                    </label>
                                                    <input type="submit" value="Xử lý" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form"  method="post" enctype="multipart/form-data"
                                  action="{{route('product.store')}}">
                                @csrf
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Title</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <label>
                                                        <input type="text" name="title"
                                                               class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                               placeholder="Title"/>
                                                    </label>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->

                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Category</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
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
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Price</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <label>
                                                <input type="text" name="price"
                                                       class="form-control form-control-lg form-control-solid"
                                                       placeholder="Price"/>
                                            </label>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Description</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <div class="form-outline">
                                                <textarea class="form-control" id="textAreaExample2" rows="8" name="description"></textarea>
                                                <label class="form-label" for="textAreaExample2"></label>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
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
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-0">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch fv-row">
                                                <label>
                                                    <input class="form-check-input w-45px h-30px" type="checkbox"
                                                           name="status" value="active"/>
                                                </label>
                                            </div>
                                        </div>
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
                                            id="kt_account_profile_details_submit">ADD
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
