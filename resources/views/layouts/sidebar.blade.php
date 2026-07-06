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

        <!-- Welcome -->
        <x-sidebar-link
            :href="route('website.home')"
            :active="request()->routeIs('website.home')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 12 11.204 3.046a1.125 1.125 0 0 1 1.592 0L21.75 12M4.5 9.75V19.5A1.5 1.5 0 0 0 6 21h12a1.5 1.5 0 0 0 1.5-1.5V9.75"/>

            </svg>

            <span>Welcome</span>

        </x-sidebar-link>

        <!-- Dashboard -->

        <x-sidebar-link
            :href="route('dashboard')"
            :active="request()->routeIs('dashboard')">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 12l9-9 9 9v8a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1z"/>

            </svg>

            <span>Dashboard</span>

        </x-sidebar-link>

        {{-- ================= OWNER ================= --}}

        @role('Owner')

        {{-- Announcement --}}
        <x-sidebar-link
            :href="route('announcements.index')"
            :active="request()->routeIs('announcements.*')">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10.34 6.948 15.75 4.5A1.5 1.5 0 0 1 18 5.866v12.268a1.5 1.5 0 0 1-2.25 1.366l-5.41-2.448H6.75A2.25 2.25 0 0 1 4.5 14.8V9.2A2.25 2.25 0 0 1 6.75 6.95h3.59Z"/>

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 17.25v2.25"/>

            </svg>

            <span>Announcement</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('animals.index')"
            :active="request()->routeIs('animals.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M20.25 7.5 12 3 3.75 7.5v9L12 21l8.25-4.5v-9Z"/>

            </svg>

            <span>Data Hewan</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('animal-categories.index')"
            :active="request()->routeIs('animal-categories.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 7.5h.008v.008H7.5V7.5Zm-3 0A2.25 2.25 0 0 1 6.75 5.25h4.379a2.25 2.25 0 0 1 1.591.659l5.871 5.871a2.25 2.25 0 0 1 0 3.182l-3.629 3.629a2.25 2.25 0 0 1-3.182 0L5.909 12.72A2.25 2.25 0 0 1 5.25 11.129V6.75A2.25 2.25 0 0 1 7.5 4.5"/>

            </svg>

            <span>Kategori Hewan</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('animal-grades.index')"
            :active="request()->routeIs('animal-grades.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m11.48 3.499 2.122 4.3 4.744.689-3.433 3.346.81 4.726L12 14.328l-4.243 2.232.81-4.726-3.433-3.346 4.744-.689L11.48 3.5Z"/>

            </svg>

            <span>Grade Hewan</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('cages.index')"
            :active="request()->routeIs('cages.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 10.5 12 3l9 7.5V21H3V10.5Z"/>

            </svg>

            <span>Kandang</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('packages.index')"
            :active="request()->routeIs('packages.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m20.25 7.5-8.25-4.5-8.25 4.5m16.5 0V16.5L12 21m8.25-13.5L12 12m0 9V12m0 0L3.75 7.5"/>

            </svg>

            <span>Paket</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('users.index')"
            :active="request()->routeIs('users.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M18 18.72a8.97 8.97 0 0 0-6-2.22 8.97 8.97 0 0 0-6 2.22m12 0A9 9 0 1 0 3 18.72m15 0v.03M15.75 9.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/>

            </svg>

            <span>Kelola User</span>

        </x-sidebar-link>

        @endrole

        {{-- ================= ADMIN ================= --}}

        @role('Admin')

        <x-sidebar-link
            :href="route('announcements.index')"
            :active="request()->routeIs('announcements.*')">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10.34 6.948 15.75 4.5A1.5 1.5 0 0 1 18 5.866v12.268a1.5 1.5 0 0 1-2.25 1.366l-5.41-2.448H6.75A2.25 2.25 0 0 1 4.5 14.8V9.2A2.25 2.25 0 0 1 6.75 6.95h3.59Z"/>

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 17.25v2.25"/>

            </svg>

            <span>Announcement</span>

        </x-sidebar-link>

        <x-sidebar-link
            :href="route('animals.index')"
            :active="request()->routeIs('animals.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M20.25 7.5 12 3 3.75 7.5v9L12 21l8.25-4.5v-9Z"/>

            </svg>

            <span>Data Hewan</span>

        </x-sidebar-link>

        @endrole

        {{-- ================= PENJAGA ================= --}}

        @role('Penjaga Kandang')

        <x-sidebar-link
            :href="route('animals.index')"
            :active="request()->routeIs('animals.*')">

            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-6 h-6">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M20.25 7.5 12 3 3.75 7.5v9L12 21l8.25-4.5v-9Z"/>

            </svg>

            <span>Data Hewan</span>

        </x-sidebar-link>

        @endrole

    </nav>

    <!-- User -->

    <div class="border-t border-green-400 p-5">

        <a
            href="{{ route('profile.edit') }}"
            class="flex items-center gap-3 rounded-2xl p-3 hover:bg-green-600 transition">

            <div
                class="w-12 h-12 rounded-full bg-white text-[#0FA958] flex items-center justify-center text-xl font-bold">

                {{ strtoupper(substr(auth()->user()->full_name, 0, 1)) }}

            </div>

            <div class="flex-1">

                <h3 class="font-semibold">

                    {{ auth()->user()->full_name }}

                </h3>

                <p class="text-sm text-green-100">

                    {{ auth()->user()->getRoleNames()->first() }}

                </p>

                <p class="text-xs text-green-200 mt-1">

                    Lihat Profil →

                </p>

            </div>

        </a>

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