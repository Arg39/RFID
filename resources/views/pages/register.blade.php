@extends('templates.template', ['withSidebar' => false])

@section('style')
    {{-- style --}}
@endsection

@section('container')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row p-0 w-full max-w-3xl overflow-hidden">
            <!-- Gambar di kiri -->
            <div class="hidden md:flex md:w-1/2 bg-background items-center justify-center">
                <img src="{{ asset('assets/images/login-illustration.png') }}" alt="Register Illustration"
                    class="object-cover w-fit">
            </div>
            <!-- Form di kanan -->
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <div class="p-8 flex flex-col justify-center">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Register</h2>
                    <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
                        @csrf
                        <div class="w-fit px-1 h-[340px] overflow-y-auto mb-6">
                            <div>
                                <label for="rfidcode" class="block text-gray-700 font-semibold mb-2">RFID Code</label>
                                <input id="rfidcode" name="rfidcode" type="text" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="RFID Code">
                            </div>
                            <div>
                                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                                <input id="name" name="name" type="text" required autofocus
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="Your Name">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                                <input id="email" name="email" type="email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="you@example.com">
                            </div>
                            <div>
                                <label for="nisn" class="block text-gray-700 font-semibold mb-2">NISN</label>
                                <input id="nisn" name="nisn" type="text" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="NISN">
                            </div>
                            <div>
                                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                                <input id="password" name="password" type="password" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="********">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm
                                    Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    placeholder="********">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                            Register
                        </button>
                        <div class="text-center mt-4">
                            <span class="text-gray-600 text-sm">Already have an account?</span>
                            <a href="{{ route('login') }}" class="text-blue-600 hover:underline text-sm">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- script --}}
@endsection
