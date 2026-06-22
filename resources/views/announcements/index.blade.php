<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">
                Data Pengumuman
            </h1>

            <a
                href="{{ route('announcements.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                + Tambah Pengumuman

            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-3 text-left">
                            No
                        </th>

                        <th class="p-3 text-left">
                            Gambar
                        </th>

                        <th class="p-3 text-left">
                            Judul
                        </th>

                        <th class="p-3 text-left">
                            Deskripsi
                        </th>

                        <th class="p-3 text-left">
                            Status
                        </th>

                        <th class="p-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($announcements as $announcement)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-3">

                                @if($announcement->image)

                                    <img
                                        src="{{ asset('storage/' . $announcement->image) }}"
                                        alt="{{ $announcement->title }}"
                                        class="w-24 h-24 object-cover rounded">

                                @else

                                    <span class="text-gray-500">
                                        Tidak ada gambar
                                    </span>

                                @endif

                            </td>

                            <td class="p-3 font-medium">
                                {{ $announcement->title }}
                            </td>

                            <td class="p-3">
                                {{ $announcement->description }}
                            </td>

                            <td class="p-3">

                                @if($announcement->status == 'active')

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                        Active
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="p-3">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('announcements.edit', $announcement->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('announcements.destroy', $announcement->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center p-6 text-gray-500">

                                Belum ada data pengumuman.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>