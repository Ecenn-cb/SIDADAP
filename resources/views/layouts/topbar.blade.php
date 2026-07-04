<header class="bg-white border-b border-gray-200 px-8 py-5">

    <div class="flex items-center justify-between">

        <!-- Left -->

        <div>

            <h1 class="text-2xl font-bold text-gray-800">

                @if(View::hasSection('title'))

                    @yield('title')

                @else

                    Dashboard

                @endif

            </h1>

            <p class="text-gray-500 text-sm mt-1">

                Selamat datang kembali,
                {{ auth()->user()->full_name }}

            </p>

        </div>

        <!-- Right -->

        <div class="flex items-center gap-5">

            <!-- Search -->

            <div class="relative hidden lg:block">

                <input
                    type="text"
                    placeholder="Cari menu..."
                    class="w-80 bg-gray-100 rounded-xl border-0 pl-11 pr-4 py-3 focus:ring-2 focus:ring-green-500">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-gray-400 absolute left-4 top-3.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.35-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>

                </svg>

            </div>

            <!-- Notification -->

            <div class="relative">

            <button
                id="notificationButton"
                class="relative bg-gray-100 hover:bg-gray-200 rounded-xl p-3 transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-gray-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032
                        2.032 0 0118
                        14.158V11a6.002
                        6.002 0
                        00-4-5.659V5a2
                        2 0
                        10-4
                        0v.341C7.67
                        6.165 6
                        8.388 6
                        11v3.159c0
                        .538-.214
                        1.055-.595
                        1.436L4
                        17h5m6
                        0v1a3
                        3 0
                        11-6
                        0v-1m6
                        0H9"/>

                </svg>

                @if($unreadNotifications > 0)
                    <span
                        id="notificationBadge"
                        class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-red-500 text-white text-xs flex items-center justify-center">

                        {{ $unreadNotifications }}

                    </span>
                @endif

            </button>

            <!-- Dropdown -->
            <div
                id="notificationDropdown"
                class="hidden absolute right-0 mt-3 w-96 bg-white rounded-2xl shadow-2xl border border-gray-100 z-50">

                <!-- Header -->
                <div class="px-5 py-4 border-b bg-gray-50 sticky top-0">

                    <h3 class="font-bold text-gray-800">
                        Riwayat Aktivitas
                    </h3>

                </div>

                <!-- Isi Notifikasi -->
                <div class="max-h-[420px] overflow-y-auto">

                    @forelse($notifications as $log)

                        <div class="px-5 py-4 border-b hover:bg-gray-50 transition">

                            <div class="flex items-start gap-3">

                                @if($log->action == 'Create')
                                    <span class="text-green-600 text-lg">🟢</span>
                                @elseif($log->action == 'Update')
                                    <span class="text-yellow-500 text-lg">🟡</span>
                                @else
                                    <span class="text-red-500 text-lg">🔴</span>
                                @endif

                                <div class="flex-1">

                                    <p class="font-semibold text-gray-800">
                                        {{ $log->user->full_name }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        {{ $log->description }}
                                    </p>

                                    <small class="text-gray-400">
                                        {{ $log->created_at->diffForHumans() }}
                                    </small>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="py-8 text-center text-gray-500">

                            Belum ada aktivitas.

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

            <!-- Profile -->

            <a
                href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 rounded-2xl px-3 py-2 hover:bg-gray-100 transition">

                <div
                    class="w-12 h-12 rounded-full bg-[#0FA958] text-white flex items-center justify-center text-lg font-bold shadow">

                    {{ strtoupper(substr(auth()->user()->full_name, 0, 1)) }}

                </div>

                <div class="hidden md:block">

                    <h4 class="font-semibold text-gray-800">

                        {{ auth()->user()->full_name }}

                    </h4>

                    <p class="text-sm text-gray-500">

                        {{ auth()->user()->getRoleNames()->first() }}

                    </p>

                </div>

            </a>

        </div>

    </div>

</header>