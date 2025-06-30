@extends('layouts.app')


@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Riwayat Pembayaran</h1>


        @if ($orders->isEmpty())
            <p class="text-gray-600">Belum ada riwayat pembayaran.</p>
        @else
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Order ID</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Metode</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="px-4 py-2 border">{{ $order->order_id }}</td>
                            <td class="px-4 py-2 border">{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td class="px-4 py-2 border">Rp {{ number_format($order->amount) }}</td>
                            <td class="px-4 py-2 border capitalize">{{ $order->status }}</td>
                            <td class="px-4 py-2 border">{{ $order->payment_type ?? '-' }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('payment.detail', $order->order_id) }}"
                                    class="text-blue-600 hover:underline">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection
