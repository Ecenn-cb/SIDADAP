<x-app-layout>

<div class="py-6 px-6">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Kelola User
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola akun Owner, Admin, dan Penjaga Kandang.
            </p>

        </div>

        <a
            href="{{ route('users.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow">

            + Tambah User

        </a>

    </div>

    @if(session('success'))

        <div class="mb-5 rounded-xl bg-green-100 border border-green-300 text-green-700 px-4 py-3">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="mb-5 rounded-xl bg-red-100 border border-red-300 text-red-700 px-4 py-3">

            {{ session('error') }}

        </div>

    @endif

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">No</th>

                    <th class="p-4 text-left">Nama</th>

                    <th class="p-4 text-left">Username</th>

                    <th class="p-4 text-left">Email</th>

                    <th class="p-4 text-center">Role</th>

                    <th class="p-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4">

                            {{ $loop->iteration }}

                        </td>

                        <td class="p-4 font-medium">

                            {{ $user->full_name }}

                        </td>

                        <td class="p-4">

                            {{ $user->username }}

                        </td>

                        <td class="p-4">

                            {{ $user->email }}

                        </td>

                        <td class="p-4 text-center">

                            @php
                                $role = $user->getRoleNames()->first();
                            @endphp

                            @if($role == 'Owner')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                    Owner

                                </span>

                            @elseif($role == 'Admin')

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                    Admin

                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                    Penjaga Kandang

                                </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <div class="flex justify-center gap-2">

                                <a
                                    href="{{ route('users.edit',$user->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('users.destroy',$user->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center py-8 text-gray-500">

                            Belum ada data user.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>
