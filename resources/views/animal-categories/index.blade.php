<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold">
                Data Kategori Hewan
            </h1>

            <a
                href="{{ route('animal-categories.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                + Tambah Kategori

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
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Nama Kategori</th>
                        <th class="p-3 text-left">Deskripsi</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-3">
                                {{ $category->name }}
                            </td>

                            <td class="p-3">
                                {{ $category->description }}
                            </td>

                            <td class="p-3">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('animal-categories.edit', $category->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('animal-categories.destroy', $category->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center p-6 text-gray-500">

                                Belum ada data kategori.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>