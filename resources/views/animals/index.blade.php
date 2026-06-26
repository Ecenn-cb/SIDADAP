<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold">
                Data Hewan
            </h1>

            <a
                href="{{ route('animals.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                + Tambah Hewan

            </a>

        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="p-3">Kode</th>
                        <th class="p-3">Foto</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Kategori</th>
                        <th class="p-3">Grade</th>
                        <th class="p-3">Kandang</th>
                        <th class="p-3">Gender</th>
                        <th class="p-3">Berat</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($animals as $animal)

                        <tr class="border-b">

                            <td class="p-3">
                                {{ $animal->animal_code }}
                            </td>

                            <td class="p-3">
                                <img
                                    src="{{ asset('storage/'.$animal->image) }}"
                                    class="w-20 h-20 object-cover rounded">
                            </td>

                            <td class="p-3">
                                {{ $animal->name }}
                            </td>

                            <td class="p-3">
                                {{ $animal->category->name }}
                            </td>

                            <td class="p-3">
                                {{ $animal->grade->name }}
                            </td>

                            <td class="p-3">
                                {{ $animal->cage->name }}
                            </td>

                            <td class="p-3">
                                {{ $animal->gender }}
                            </td>

                            <td class="p-3">
                                {{ $animal->weight }} Kg
                            </td>

                            <td class="p-3">
                                {{ ucfirst($animal->status) }}
                            </td>

                            <td class="p-3">

                                <div class="flex gap-2">

                                    <a
                                        href="{{ route('animals.edit',$animal->id) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('animals.destroy',$animal->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin hapus data?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="10" class="text-center p-4">
                                Belum ada data hewan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>