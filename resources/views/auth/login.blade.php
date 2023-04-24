@extends('layouts.app')

@section('content')
	<div class="flex justify-center">
		<div class="w-8/12 md:w-4/12 bg-white p-6 mb-3 rounded-md">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl -translate-y-3">
                Login
            </h1>

            @if (session()->has('status'))
                <p class="text-red-500">{{ session('status') }}</p>
            @endif

			<form action="{{ route('login') }}" method="post" class="space-y-3 md:space-y-4">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 @error('email') border-red-500 @enderror" placeholder="name@email.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 @error('password') border-red-500 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex space-x-2">
                    <label for="remember">Remember me</label>
                    <input type="checkbox" name="remember" id="remember" class="translate-y-0.5"/>
                </div>

                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
                <p class="text-sm font-light text-gray-500">
                    Don't have an account? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Create one here</a>
                </p>
            </form>
		</div>
	</div>
@endsection