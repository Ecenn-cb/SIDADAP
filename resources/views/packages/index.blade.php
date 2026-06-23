<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between mb-6">

            <h1 class="text-3xl font-bold">
                Data Paket
            </h1>

            <a
                href="{{ route('packages.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">

                + Tambah Paket

            </a>

        </div>

        <table class="w-full bg-white shadow rounded">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">Nama Paket</th>
                    <th class="p-3">Deskripsi</th>
                    <th class="p-3">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($packages as $package)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-3">
                        {{ $package->name }}
                    </td>

                    <td class="p-3">
                        {{ $package->description }}
                    </td>

                    <td class="p-3">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('packages.edit', $package->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                Edit

                            </a>

                            <form
                                action="{{ route('packages.destroy', $package->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus paket ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</x-app-layout>