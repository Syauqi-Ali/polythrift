<x-layouts::auth :title="__('Log in')">
    <div class="flex min-h-screen items-center justify-center bg-[#D2E7F5] px-4">
    <!-- Card Container (Lebar max-md, sudut rounded-2xl, background abu-abu terang mirip gambar) -->
    <div class="w-full max-w-md rounded-2xl bg-[#F4F4F5] p-8 shadow-md space-y-6">
        
        <!-- Logo / Brand Title (POLYTHRIFT) -->
        <div class="text-center">
            <h1 class="text-3xl font-black tracking-wider text-[#1E3A8A]">
                POLY<span class="inline-block relative">Y</span>THRIFT
            </h1>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-sm" :status="session('status')" />

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf

            <!-- Email / User ID -->
            <div>
                <flux:input
                    name="email"
                    :label="__('Email / User ID')"
                    :value="old('email')"
                    type="text"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="nama@email.com atau username"
                />
            </div>

            <!-- Password & Forgot Password Link -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <!-- Remember Me -->
                <flux:checkbox name="remember" :label="__('Ingat saya')" :checked="old('remember')" />

                @if (Route::has('password.request'))
                    <flux:link class="text-[#1145A6] hover:underline text-xs" :href="route('password.request')" wire:navigate>
                        {{ __('Lupa Kata Sandi') }}
                    </flux:link>
                @endif
            </div>

            <!-- Tombol Masuk (Warna Biru Tua Custom ala Poly Thrift) -->
            <div class="pt-2">
                <button type="submit" 
                    class="w-full rounded-md bg-[#1145A6] py-2.5 text-center text-sm font-semibold text-white shadow hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all"
                    data-test="login-button">
                    {{ __('Masuk') }}
                </button>
            </div>
        </form>

        <!-- Buat Akun Baru Link -->
        <div class="text-center text-xs pt-2">
            <span class="text-gray-600">{{ __('Buat akun baru?') }}</span>
            <flux:link class="text-[#1145A6] font-semibold hover:underline ms-1" :href="route('register')" wire:navigate>{{ __('Buat Akun Baru') }}</flux:link>
        </div>
    </div>
</div>
