@extends('layouts.app')


@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Detail Pembayaran</h1>


        <div class="bg-white shadow rounded p-6 space-y-3">
            <p><strong>Order ID:</strong> {{ $order->order_id }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
            <p><strong>Email:</strong> {{ $order->customer_email }}</p>
            <p><strong>Telepon:</strong> {{ $order->customer_phone }}</p>
            <p><strong>Jumlah:</strong> Rp {{ number_format($order->amount) }}</p>
            <p><strong>Status:</strong> <span class="capitalize">{{ $order->status }}</span></p>
            <p><strong>Metode:</strong> {{ $order->payment_type ?? '-' }}</p>
            <p><strong>Transaction ID:</strong> {{ $order->transaction_id ?? '-' }}</p>


            <div>
                <a href="{{ route('payment.history') }}" class="text-blue-600 hover:underline">
                    &larr; Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>
@endsection
