<x-app-layout>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <!-- Header -->

            <div class="flex justify-between items-center mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">

                        Kelola User

                    </h1>

                    <p class="text-gray-500 mt-2">

                        Kelola akun Owner, Admin, dan Penjaga Kandang.

                    </p>

                </div>

                <a
                    href="{{ route('users.create') }}"
                    class="bg-[#0FA958] hover:bg-[#0d944f] text-white px-5 py-3 rounded-xl font-semibold transition">

                    + Tambah User

                </a>

            </div>

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

                    {{ session('success') }}

                </div>

            @endif

            @if(session('error'))

                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl">

                    {{ session('error') }}

                </div>

            @endif

            <!-- Table -->

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                <table class="w-full text-sm text-gray-700">

                    <thead class="bg-gray-100 uppercase text-xs text-gray-600">

                        <tr>

                            <th class="px-6 py-4 text-center">

                                No

                            </th>

                            <th class="px-6 py-4 text-left">

                                Nama Lengkap

                            </th>

                            <th class="px-6 py-4 text-left">

                                Username

                            </th>

                            <th class="px-6 py-4 text-left">

                                Email

                            </th>

                            <th class="px-6 py-4 text-center">

                                Role

                            </th>

                            <th class="px-6 py-4 text-center">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            @php
                                $role = $user->getRoleNames()->first();
                            @endphp

                            <tr class="border-b hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-center font-semibold">

                                    {{ $loop->iteration }}

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    {{ $user->full_name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $user->username }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $user->email }}

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @if($role == 'Owner')

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

                                            Owner

                                        </span>

                                    @elseif($role == 'Admin')

                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">

                                            Admin

                                        </span>

                                    @else

                                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">

                                            Penjaga Kandang

                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a
                                            href="{{ route('users.edit', $user->id) }}"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-xl text-sm transition">

                                            Edit

                                        </a>

                                        @if(auth()->id() != $user->id)

                                            <form
                                                action="{{ route('users.destroy', $user->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm transition">

                                                    Hapus

                                                </button>

                                            </form>

                                        @else

                                            <button
                                                disabled
                                                class="bg-gray-300 text-gray-500 px-4 py-2 rounded-xl text-sm cursor-not-allowed">

                                                Akun Saya

                                            </button>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="py-10 text-center text-gray-500">

                                    Belum ada data user.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>