<x-app-layout>

<div class="space-y-8">

    <!-- Header -->

    <div class="flex flex-col lg:flex-row justify-between lg:items-center gap-5">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">

                Harga {{ $package->name }}

            </h1>

            <p class="text-gray-500 mt-2">

                {{ $package->description }}

            </p>

        </div>

        <div class="flex gap-3">

            <a
                href="{{ route('packages.index') }}"
                class="px-5 py-3 rounded-2xl border border-gray-300 hover:bg-gray-100 transition">

                ← Kembali

            </a>

            <a
                href="{{ route('packages.prices.create',$package->id) }}"
                class="bg-[#0FA958] hover:bg-[#0c944e] text-white px-6 py-3 rounded-2xl shadow transition">

                + Tambah Harga

            </a>

        </div>

    </div>

    @if(session('success'))

        <div
            class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

            {{ session('success') }}

        </div>

    @endif

    <!-- Table -->

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <div class="px-8 py-6 border-b">

            <h2 class="text-xl font-bold text-gray-800">

                Daftar Harga

            </h2>

            <p class="text-gray-500">

                Seluruh daftar harga pada paket
                {{ $package->name }}

            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-5 text-center">

                            No

                        </th>

                        <th class="px-6 py-5 text-center">

                            Jumlah Box

                        </th>

                        <th class="px-6 py-5 text-center">

                            Anak Perempuan

                        </th>

                        <th class="px-6 py-5 text-center">

                            Anak Laki-laki

                        </th>

                        <th class="px-6 py-5 text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($prices as $price)

                    <tr class="hover:bg-green-50 transition">

                        <td class="text-center py-5">

                            {{ $loop->iteration }}

                        </td>

                        <td class="text-center">

                            <span
                                class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                                {{ $price->box_count }} Box

                            </span>

                        </td>

                        <td class="text-center">

                            <div
                                class="inline-block bg-pink-50 rounded-xl px-5 py-3">

                                <span class="font-bold text-pink-600">

                                    Rp {{ number_format($price->female_price,0,',','.') }}

                                </span>

                            </div>

                        </td>

                        <td class="text-center">

                            <div
                                class="inline-block bg-blue-50 rounded-xl px-5 py-3">

                                <span class="font-bold text-blue-600">

                                    Rp {{ number_format($price->male_price,0,',','.') }}

                                </span>

                            </div>

                        </td>

                        <td>

                            <div
                                class="flex justify-center gap-2">

                                <a
                                    href="{{ route('prices.edit',$price->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl px-4 py-2">

                                    ✏️ Edit

                                </a>

                                <form
                                    action="{{ route('prices.destroy',$price->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus harga ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white rounded-xl px-4 py-2">

                                        🗑 Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="5"
                            class="py-16 text-center">

                            <div
                                class="flex flex-col items-center">

                                <div class="text-6xl">

                                    📦

                                </div>

                                <h3
                                    class="text-xl font-bold mt-4">

                                    Belum Ada Harga

                                </h3>

                                <p
                                    class="text-gray-500 mt-2">

                                    Silakan tambahkan harga terlebih dahulu.

                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>