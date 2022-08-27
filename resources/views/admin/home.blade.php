@extends('layout.master')
@section('content')
                    <div class="home-content">
                        <div class="overview-boxes">
                            <div class="box">
                                <div class="right-side">
                                    <div class="number">{{$NumUser}}</div>
                                    <div class="box-topic">Total User</div>

                                </div>
                            </div>
                            <div class="box">
                                <div class="right-side">
                                    <div class="number">{{$NumProduct}}</div>
                                    <div class="box-topic">Total Product</div>

                                </div>
                            </div>
                            <div class="box">
                                <div class="right-side">
                                    <div class="number">{{$profit/1000000}}M VNĐ</div>
                                    <div class="box-topic">Total Profit</div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="right-side">
                                    <div class="number">{{$pending}}</div>
                                    <div class="box-topic">Pending Requests</div>

                                </div>
                            </div>
                        </div>

                        <div class="sales-boxes">
                            <div class="recent-sales box">
                                <div class="title">Recent Sales</div>
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-125px">Date</th>
                                                <th class="min-w-125px">Customer</th>
                                                <th class="min-w-125px">Status</th>
                                                <th class="min-w-125px">Total</th>
                                            </tr>
                                            @foreach($recentsales as $recentsale)
                                            <tr>

                                                    <td>{{$recentsale->order_date}}</td>
                                                    <td>{{$recentsale->full_name}}</td>
                                                    <td>{{ProductStatus($recentsale->status)}}</td>
                                                    <td>{{number_format($recentsale->total_money,0,',','.')}} VNĐ</td>

                                            </tr>
                                            @endforeach
                                        </table>
                                <div class="button">
                                    <a href="{{route('order')}}">See All</a>
                                </div>
                            </div>
                            <div class="top-sales box">
                                <div class="title">Top Seling Product</div>
                                <ul class="top-sales-details">
                                    @foreach($topsellings as $topselling)
                                        <li>

                                        </li>
                                    <li>
                                        <span class="product">{{$topselling->sold}}</span>
                                        <a href="{{route('product_detail',$topselling->id)}}">
                                            <!--<img src="images/sunglasses.jpg" alt="">-->
                                            <span class="product">{{$topselling->title}}</span>
                                        </a>
                                        <span class="price">{{number_format($topselling->price,0,',','.')}} VNĐ</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                <script>
                    let sidebar = document.querySelector(".sidebar");
                    let sidebarBtn = document.querySelector(".sidebarBtn");
                    sidebarBtn.onclick = function() {
                        sidebar.classList.toggle("active");
                        if(sidebar.classList.contains("active")){
                            sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
                        }else
                            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                    }
                </script>
@endsection
