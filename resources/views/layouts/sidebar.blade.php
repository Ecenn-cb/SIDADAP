<aside class="w-72 bg-[#0FA958] text-white flex flex-col shadow-2xl">

    <!-- Logo -->

    <div class="px-8 py-8 border-b border-green-400">

        <div class="flex items-center gap-4">

            <img
                src="{{ asset('assets/images/TemanAqiqah.png') }}"
                class="w-14 h-14 object-contain">

            <div>

                <h1 class="text-2xl font-bold">

                    SIDADAP

                </h1>

                <p class="text-sm text-green-100">

                    Teman Aqiqah

                </p>

            </div>

        </div>

    </div>

    <!-- Menu -->

    <nav class="flex-1 mt-6 px-4 space-y-2">

        <!-- Dashboard -->

        <a
            href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard')
                    ? 'bg-white text-[#0FA958]'
                    : 'text-white hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 12l9-9 9 9v8a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1z"/>

            </svg>

            Dashboard

        </a>

        {{-- ================= OWNER ================= --}}

        @role('Owner')

        <a
            href="{{ route('announcements.index') }}"
            class="{{ request()->routeIs('announcements.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            📢

            Announcement

        </a>

        <a
            href="{{ route('animals.index') }}"
            class="{{ request()->routeIs('animals.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            🐐

            Data Hewan

        </a>

        <a
            href="{{ route('animal-categories.index') }}"
            class="{{ request()->routeIs('animal-categories.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            🏷

            Kategori Hewan

        </a>

        <a
            href="{{ route('animal-grades.index') }}"
            class="{{ request()->routeIs('animal-grades.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            ⭐

            Grade Hewan

        </a>

        <a
            href="{{ route('cages.index') }}"
            class="{{ request()->routeIs('cages.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            🏠

            Kandang

        </a>

        <a
            href="{{ route('packages.index') }}"
            class="{{ request()->routeIs('packages.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            📦

            Paket

        </a>

        <a
            href="{{ route('users.index') }}"
            class="{{ request()->routeIs('users.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            👥

            Kelola User

        </a>

        @endrole

        {{-- ================= ADMIN ================= --}}

        @role('Admin')

        <a
            href="{{ route('announcements.index') }}"
            class="{{ request()->routeIs('announcements.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            📢

            Announcement

        </a>

        <a
            href="{{ route('animals.index') }}"
            class="{{ request()->routeIs('animals.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            🐐

            Data Hewan

        </a>

        @endrole

        {{-- ================= PENJAGA ================= --}}

        @role('Penjaga Kandang')

        <a
            href="{{ route('animals.index') }}"
            class="{{ request()->routeIs('animals.*')
                    ? 'bg-white text-[#0FA958]'
                    : 'hover:bg-green-600' }}
                    flex items-center gap-3 px-5 py-3 rounded-2xl transition">

            🐐

            Data Hewan

        </a>

        @endrole

    </nav>

    <!-- User -->

    <div class="border-t border-green-400 p-5">

        <div class="flex items-center gap-3">

            <div
                class="w-12 h-12 rounded-full bg-white text-[#0FA958] flex items-center justify-center text-xl font-bold">

                {{ strtoupper(substr(auth()->user()->full_name,0,1)) }}

            </div>

            <div>

                <h3 class="font-semibold">

                    {{ auth()->user()->full_name }}

                </h3>

                <p class="text-sm text-green-100">

                    {{ auth()->user()->getRoleNames()->first() }}

                </p>

            </div>

        </div>

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="mt-5">

            @csrf

            <button
                class="w-full bg-white text-[#0FA958] py-3 rounded-xl font-semibold hover:bg-green-50 transition">

                Logout

            </button>

        </form>

    </div>

</aside>