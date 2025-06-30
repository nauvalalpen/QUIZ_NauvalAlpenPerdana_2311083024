@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8">
            <div class="text-center mb-6">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Proses Pembayaran</h2>
                <p class="mt-1 text-sm text-gray-600">Total yang harus dibayar:</p>
                <p class="mt-1 text-2xl font-semibold text-green-600">Rp {{ number_format($order->amount, 0, ',', '.') }}</p>
            </div>

            <button id="pay-button"
                class="w-full flex items-center justify-center bg-gradient-to-r from-green-400 to-green-600 hover:from-green-500 hover:to-green-700 text-white font-semibold py-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v6m0 0H9m3 0h3" />
                </svg>
                Bayar Sekarang
            </button>

            <div class="mt-4 text-center">
                <a href="{{ route('payment.history') }}" class="text-sm text-blue-600 hover:underline">Lihat Riwayat
                    Pembayaran</a>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            this.disabled = true;
            this.classList.add('opacity-50', 'cursor-not-allowed');

            snap.pay('{{ $snapToken }}', {
                onPending: function(result) {
                    alert('Transaksi pending: ' + result.status_message);
                    location.reload();
                },
                onSuccess: function(result) {
                    fetch("{{ route('payment.callback') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(result)
                        })
                        .then(res => res.json())
                        .then(() => {
                            // Build the URL using JavaScript instead of Blade
                            window.location.href = "/payment/success/" + result.order_id;
                        })
                        .catch(() => {
                            alert('Gagal menyimpan data pembayaran.');
                            location.reload();
                        });
                },
                onError: function(error) {
                    alert('Terjadi kesalahan: ' + error.status_message);
                    document.getElementById('pay-button').disabled = false;
                    document.getElementById('pay-button').classList.remove('opacity-50',
                        'cursor-not-allowed');
                },
                onClose: function() {
                    document.getElementById('pay-button').disabled = false;
                    document.getElementById('pay-button').classList.remove('opacity-50',
                        'cursor-not-allowed');
                }
            });
        });
    </script>
@endsection
