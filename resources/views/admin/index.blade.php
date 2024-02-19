@extends('layoutsAdmin.app')

@section('title', 'page')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Online Store Visitors</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">

                            <?php $productOrder = $detailorders->sum('price'); ?>

                            <p class="d-flex flex-column">
                                <span>ยอดขายรวม</span>
                                <span class="text-bold text-lg">{{ $productOrder }} บาท</span>

                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class=""></i>
                                </span>
                                <span class="text-muted"></span>
                            </p>

                        </div>

                        <div class="position-relative mb-4">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="totalsales" height="220" width="444"
                                style="display: block; height: 200px; width: 404px;"></canvas>
                            {{-- <canvas id="totalsales" height="220" width="444"
                                style="display: block; height: 200px; width: 404px;"></canvas> --}}
                        </div>
                        {{-- <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                            </span>
                        </div> --}}
                    </div>
                </div>

                {{-- ยอดขายแต่ละ product --}}
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Products</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Sales</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    {{-- ดึงข้อมูลตำแหน่งพนักงาน --}}
                                    {{-- @php
                                        $detailorder = DB::table('detail_orders')
                                            ->where('id', $product->order_id)
                                            ->get();
                                    @endphp --}}

                                    <tr>
                                        <td>{{ $product->product_name }}</td>
                                        <td>
                                            <?php $productOrder = $detailorders->where('product_id', $product->id)->sum('quantity'); ?>
                                            {{ $productOrder * $product->product_price }} baht</td>
                                        <td>
                                            <!-- ตัวอย่างการคำนวณยอดขาย -->
                                            <!-- จำนวน order ที่มี product นี้อยู่ -->
                                            {{ $productOrder }} Sold
                                        </td>
                                        <td>
                                            <a href="#" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                {{-- <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Products</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Sales</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="dist/img/default-150x150.png" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        Some Product
                                    </td>
                                    <td>$13 USD</td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            12%
                                        </small>
                                        12,000 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/default-150x150.png" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        Another Product
                                    </td>
                                    <td>$29 USD</td>
                                    <td>
                                        <small class="text-warning mr-1">
                                            <i class="fas fa-arrow-down"></i>
                                            0.5%
                                        </small>
                                        123,234 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/default-150x150.png" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        Amazing Product
                                    </td>
                                    <td>$1,230 USD</td>
                                    <td>
                                        <small class="text-danger mr-1">
                                            <i class="fas fa-arrow-down"></i>
                                            3%
                                        </small>
                                        198 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/default-150x150.png" alt="Product 1"
                                            class="img-circle img-size-32 mr-2">
                                        Perfect Item
                                        <span class="badge bg-danger">NEW</span>
                                    </td>
                                    <td>$199 USD</td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            63%
                                        </small>
                                        87 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}

            </div>
            {{--  ปิดฝั่งซ้าย --}}

            {{-- เปิดฝั่งขวา --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Sales</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">

                            <p class="d-flex flex-column">
                                <span>จำนวนคำสั่งซื้อ</span>
                                <span class="text-bold text-lg">{{$totalorders}} รายการ</span>

                            </p>

                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class=""></i>
                                </span>
                                <span class="text-muted">Since last week</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="totalorders" height="220" width="444"
                                style="display: block; height: 200px; width: 404px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This year
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> Last year
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Online Store Overview</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-success text-xl">
                                <i class="ion ion-ios-refresh-empty"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-up text-success"></i> 12%
                                </span>
                                <span class="text-muted">CONVERSION RATE</span>
                            </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-warning text-xl">
                                <i class="ion ion-ios-cart-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                                </span>
                                <span class="text-muted">SALES RATE</span>
                            </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-0">
                            <p class="text-danger text-xl">
                                <i class="ion ion-ios-people-outline"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="ion ion-android-arrow-down text-danger"></i> 1%
                                </span>
                                <span class="text-muted">REGISTRATION RATE</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('totalsales');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($productLabels) !!},
                datasets: [{
                    label: 'Total Sales',
                    data: {!! json_encode($detailordersQuantity) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // สีพื้นหลังกราฟ
                    borderColor: 'rgba(255, 99, 132, 1)', // สีเส้นกราฟ
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        // กราฟยอดปิดการขาย
        // const ctx = document.getElementById('totalorders');
        // const labels = Utils.months({
        //     count: 3,
        //     reverse: true
        // });
        const data = {
            labels: {!! $orders->pluck('created_at')->toJson() !!},
            datasets: [{
                label: 'Total Orders',
                data: {!! json_encode($totalorders) !!},
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };
        var myChart = new Chart(
            document.getElementById('totalorders'),
            config
        );
        // const ctx = document.getElementById('totalorders');
        // const labels = Utils.months({
        //     count: 7
        // });
        // const data = {
        //     labels: {!! json_encode($productLabels) !!},
        //     datasets: [{
        //         label: 'Total Orders',
        //         data: {!! json_encode($totalorders) !!},
        //         fill: false,
        //         borderColor: 'rgb(75, 192, 192)',
        //         tension: 0.1
        //     }]
        // };
    </script>
@endsection
