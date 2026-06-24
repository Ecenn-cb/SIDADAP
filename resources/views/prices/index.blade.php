<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between items-center mb-6">

            <div>
                <h1 class="text-3xl font-bold">
                    Harga {{ $package->name }}
                </h1>

                <p class="text-gray-500">
                    {{ $package->description }}
                </p>
            </div>

            <a
                href="{{ route('packages.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">

                Kembali

            </a>

            <a
                href="{{ route('packages.prices.create', $package->id) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                + Tambah Harga

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
                        <th class="p-3 text-left">Jumlah Box</th>
                        <th class="p-3 text-left">Anak Perempuan (1 Ekor)</th>
                        <th class="p-3 text-left">Anak Laki-Laki (2 Ekor)</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($prices as $price)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-3">
                                {{ $price->box_count }}
                            </td>

                            <td class="p-3">
                                Rp {{ number_format($price->female_price,0,',','.') }}
                            </td>

                            <td class="p-3">
                                Rp {{ number_format($price->male_price,0,',','.') }}
                            </td>

                            <td class="p-3">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('prices.edit', $price->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('prices.destroy', $price->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus harga ini?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center p-6 text-gray-500">

                                Belum ada data harga.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>