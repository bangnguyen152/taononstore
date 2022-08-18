@extends('layout.master')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class=" container-xxl ">
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

                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="1"><b>Tổng tiền</b></td>
                                        </tr>
                                            <?php
                                                $sum=0
                                            ?>
                                            @foreach($bill_details as $key => $bill)
                                                <?php $sum += $bill->price; ?>
                                            @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="1"><b class="text-red">{{ number_format($sum) }} VNĐ</b></td>
                                        </tr>


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
            </div>
        </div>
    </div>
@endsection

