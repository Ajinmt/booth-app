@extends('layout.layout')

@section('content')
    <div class="container mx-auto mt-20">
        <h1 class="text-3xl font-semibold mb-6">Admin Dashboard</h1>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Total Orders</h2>
                <p class="text-3xl font-bold">256</p>
            </div>
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Revenue</h2>
                <p class="text-3xl font-bold">$12,345</p>
            </div>
        </div>
        <div class="bg-white p-4 shadow-md rounded-lg mt-6">
            <h2 class="text-xl font-semibold mb-4">Order Trend</h2>
            <canvas id="orderChart" width="400" height="200"></canvas>
        </div>
        
        @push('scripts')
        <script>
            var ctx = document.getElementById('orderChart').getContext('2d');
            var orderChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Orders',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
    @endpush
    
        <div class="bg-white p-4 shadow-md rounded-lg mt-6">
            <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Doe</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$120</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Pending</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jane Smith</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$80</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Completed</td>
                    </tr>
                    <!-- Tambahkan baris sesuai dengan data yang Anda miliki -->
                </tbody>
            </table>
        </div>
                        
    </div>
@endsection