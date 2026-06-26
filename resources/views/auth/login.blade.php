<x-guest-layout>

<x-auth-session-status
 class="mb-5"
 :status="session('status')" />

@if ($errors->any())

<div
    class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">

<ul class="text-sm text-red-600 space-y-1">

    @foreach ($errors->all() as $error)

    <li>• {{ $error }}</li>

    @endforeach

</ul>

</div>

@endif

<div class="mb-10">

<h1
    class="text-4xl font-bold text-gray-900">

    Welcome Back 👋

</h1>

<p
    class="text-gray-500 mt-3 leading-7">

    Login untuk mengakses Dashboard
    <span class="font-semibold text-[#0FA958]">
        SIDADAP
    </span>

</p>

</div>

<form
    method="POST"
    action="{{ route('login') }}"
    class="space-y-6">

@csrf

<!-- Username -->

<div>

    <label
        class="block mb-2 text-sm font-semibold text-gray-700">

        Username

    </label>

    <div class="relative">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="absolute left-4 top-4 h-5 w-5 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5.121 17.804A9.003 9.003 0 0112 15a9.003 9.003 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

        </svg>

        <input
            id="username"
            type="text"
            name="username"
            value="{{ old('username') }}"
            required
            autofocus

            placeholder="Masukkan username"

            class="w-full rounded-2xl border-gray-300 pl-12 pr-4 py-3 shadow-sm focus:border-[#0FA958] focus:ring-[#0FA958]">

    </div>

</div>

<!-- Password -->

<div>

    <label
        class="block mb-2 text-sm font-semibold text-gray-700">

        Password

    </label>

    <div class="relative">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="absolute left-4 top-4 h-5 w-5 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 11c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1zm5-2V7a5 5 0 10-10 0v2H5v11h14V9h-2z"/>

        </svg>

        <input
            id="password"
            type="password"
            name="password"
            required

            placeholder="Masukkan password"

            class="w-full rounded-2xl border-gray-300 pl-12 pr-12 py-3 shadow-sm focus:border-[#0FA958] focus:ring-[#0FA958]">

        <button
            type="button"
            onclick="togglePassword()"
            class="absolute right-4 top-3 text-gray-400 hover:text-[#0FA958]">

            👁

        </button>

    </div>

</div>

<!-- Remember -->

<div
    class="flex justify-between items-center">

    <label
        class="flex items-center gap-2 text-sm text-gray-600">

        <input
            type="checkbox"
            name="remember"
            class="rounded border-gray-300 text-[#0FA958] focus:ring-[#0FA958]">

        Remember Me

    </label>

    @if(Route::has('password.request'))

    <a
        href="{{ route('password.request') }}"
        class="text-sm text-[#0FA958] hover:underline">

        Forgot Password?

    </a>

    @endif

</div>

<button

    type="submit"

    class="w-full rounded-2xl bg-[#0FA958] py-3 font-semibold text-white shadow-lg transition duration-300 hover:scale-[1.02] hover:bg-[#0D924D]">

    Login

</button>

</form>

<script>

function togglePassword(){

    const input = document.getElementById('password');

    input.type =
        input.type === 'password'
        ? 'text'
        : 'password';

}

</script>

</x-guest-layout>
