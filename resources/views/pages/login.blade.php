@extends('templates.template', ['withSidebar' => false])

@section('style')
    {{-- style --}}
@endsection

@section('container')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row p-0 w-full max-w-3xl overflow-hidden">
            <!-- Gambar di kiri -->
            <div class="hidden md:flex md:w-1/2 bg-background items-center justify-center">
                <img src="{{ asset('assets/images/login-illustration.png') }}" alt="Login Illustration"
                    class="object-cover w-fit">
            </div>
            <!-- Form di kanan -->
            <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Login</h2>
                @if ($errors->any())
                    <div class="mb-4 text-red-600 text-center">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input id="email" name="email" type="email" required autofocus
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="you@example.com" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="********">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-600">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ url('/register') }}" class="text-sm text-blue-600 hover:underline">
                            Register RFID Card
                        </a>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- script --}}
@endsection
