@extends('layouts.template')

@push('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">{{ $userCount }}</h5>
                        <p class="card-text">System Users</p>
                        <a href="#" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-users fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">{{ $categoryCount }}</h5>
                        <p class="card-text">Category</p>
                        <a href="#" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-tags fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">{{ $productCount }}</h5>
                        <p class="card-text">Product</p>
                        <a href="#" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-boxes fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-danger text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">{{ $customerCount }}</h5>
                        <p class="card-text">Customer</p>
                        <a href="#" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-user fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3 mb-4">
            <div class="card bg-secondary text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">{{ $supplierCount }}</h5>
                        <p class="card-text">Supplier</p>
                        <a href="{{ route('supplier.index') }}" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-truck fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">3</h5>
                        <p class="card-text">Total Purchase</p>
                        <a href="{{ route('totalpurchase.index') }}" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-shopping-cart fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h5 class="card-title">2</h5>
                        <p class="card-text">Total Outgoing</p>
                        <a href="#" class="text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <i class="fas fa-shipping-fast fa-4x" style="opacity: 0.35;"></i>
                </div>
            </div>
        </div>
    </div>              

    <div class="row mt-4">
        <div class="card">
            <div class="card-body">
                <canvas id="highestSellingProductsChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Low Quantity Products
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lowQuantityProducts as $product)
                                <tr>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>{{ $product->harga_produk }}</td>
                                    <td>{{ $product->jumlah_produk }}</td>
                                    <td>{{ $product->kategori_produk }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Latest Sales
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Date</th>
                                <th>Total Sale</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                                <tr>
                                    <td> product_name </td>
                                    <td> date </td>
                                    <td> total_sale </td>
                                </tr>
                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Recently Added Products
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentlyAddedProducts as $product)
                                <tr>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>{{ $product->harga_produk }}</td>
                                    <td>{{ $product->jumlah_produk }}</td>
                                    <td>{{ $product->kategori_produk }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const canvas = document.getElementById('highestSellingProductsChart');
    canvas.width = 400;
    canvas.height = 400; 

    const ctx = document.getElementById('highestSellingProductsChart').getContext('2d');
    const highestSellingProductsChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($productNames) !!},
            datasets: [{
                data: {!! json_encode($productSales) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Highest Selling Products'
                }
            }
        }
    });
</script>

@endsection