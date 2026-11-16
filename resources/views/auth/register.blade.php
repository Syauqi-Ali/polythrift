<x-layout>
    <div class="bg-[#EBF3FC] min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
            <h1 class="text-center text-[#1D50A2] font-bold text-3xl mb-6">POLYTHRIFT</h1>
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="text-gray-900">Name</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-3" required>
                </div>
                <div>
                    <label for="email" class="text-gray-900">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-3" required>
                </div>
                <div>
                    <label for="password" class="text-gray-900">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-3" required>
                </div>
                <div>
                    <label for="password_confirmation" class="text-gray-900">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-lg p-3" required>
                </div>
                <button type="submit" class="bg-[#1D50A2] hover:bg-blue-800 text-white font-semibold py-3 rounded-full w-full shadow-md">Register</button>
            </form>
        </div>
    </div>
</x-layout>