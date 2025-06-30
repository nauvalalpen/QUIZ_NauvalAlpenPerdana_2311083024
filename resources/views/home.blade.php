@extends('layouts.app')


@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold mb-6">Selamat Datang di Laravel Midtrans Payment</h1>
        <p class="text-lg mb-8">Silakan pilih salah satu aksi di bawah:</p>


        <div class="flex space-x-4">
            <a href="{{ route('payment.form') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded shadow">
                Buat Pembayaran
            </a>


            <a href="{{ route('payment.history') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded shadow">
                Riwayat Pembayaran
            </a>
        </div>
    </div>
@endsection
