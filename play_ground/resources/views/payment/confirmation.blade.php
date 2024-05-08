<x-layout>
    <x-slot:heading>
    </x-slot:heading>

    <div class="h-screen">
        <div class="max-w-2xl mx-auto p-6 dark:bg-gray-800 shadow-md rounded-lg">
            <h2 class="dark:text-custom-dark-text text-lg font-semibold mb-4">Payment Information</h2>
            <form action="{{ route('payment.process') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="card-name" class="block text-sm font-medium dark:text-custom-dark-text">Name on Card</label>
                    <input type="text" id="card-name" name="card_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="card-number" class="block text-sm font-medium dark:text-custom-dark-text">Card Number</label>
                    <input type="text" id="card-number" name="card_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="XXXX XXXX XXXX XXXX" required>
                </div>

                <div class="mb-4 grid grid-cols-3 gap-3">
                    <div>
                        <label for="card-expiration" class="block text-sm font-medium dark:text-custom-dark-text">Expiration</label>
                        <input type="text" id="card-expiration" name="card_expiration" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="MM/YY" required>
                    </div>
                    <div>
                        <label for="card-cvc" class="block text-sm font-medium dark:text-custom-dark-text">CVC</label>
                        <input type="text" id="card-cvc" name="card_cvc" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="CVC" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Pay Now</button>
            </form>
        </div>
    </div>

{{--    @if(session('success'))--}}
{{--        <script>--}}
{{--            document.addEventListener('DOMContentLoaded', function () {--}}
{{--                Swal.fire({--}}
{{--                    title: 'Payment Successful!',--}}
{{--                    text: '{{ session('success') }}',--}}
{{--                    icon: 'success',--}}
{{--                    confirmButtonText: 'Cool'--}}
{{--                });--}}
{{--            });--}}
{{--            Swal.fire({--}}
{{--                title: 'Payment Successful!',--}}
{{--                text: '{{ session('success') }}',--}}
{{--                icon: 'success',--}}
{{--                confirmButtonColor: '#3085d6',--}}
{{--                cancelButtonColor: '#d33',--}}
{{--                confirmButtonText: 'Great!'--}}
{{--            }).then((result) => {--}}
{{--                if (result.isConfirmed) {--}}
{{--                    window.location = '/dashboard'; // redirect if needed--}}
{{--                }--}}
{{--            });--}}

{{--        </script>--}}
{{--    @endif--}}

</x-layout>



