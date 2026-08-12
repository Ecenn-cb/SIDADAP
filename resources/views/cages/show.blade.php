<x-app-layout>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <!-- Header -->

            <div class="flex justify-between items-center mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Detail Kandang
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Informasi lengkap mengenai kandang beserta seluruh hewan yang berada di dalamnya.
                    </p>

                </div>

                <a
                    href="{{ route('cages.index') }}"
                    class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 transition">

                    ← Kembali

                </a>

            </div>

            <!-- Informasi Kandang -->

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8">

                    <!-- QR CODE -->

                    <div>

                        <div class="border rounded-2xl p-6 flex flex-col items-center">

                            {!! QrCode::size(220)
                                ->margin(2)
                                ->generate(
                                    route(
                                        'website.cage.detail',
                                        $cage->cage_code
                                    )
                                ) !!}

                            <p class="mt-5 text-lg font-bold">
                                {{ $cage->cage_code }}
                            </p>

                            <a
                                href="{{ route('cages.download.qr',$cage->id) }}"
                                class="mt-5 w-full text-center bg-[#0FA958] hover:bg-[#0d944f] text-white py-3 rounded-xl transition">

                                Download QR

                            </a>

                        </div>

                    </div>

                    <!-- Informasi -->

                    <div class="lg:col-span-2">

                        <div class="grid grid-cols-2 gap-6">

                            <div>

                                <label class="text-gray-500 text-sm">
                                    Kode Kandang
                                </label>

                                <p class="font-semibold text-lg">
                                    {{ $cage->cage_code }}
                                </p>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">
                                    Nama Kandang
                                </label>

                                <p class="font-semibold text-lg">
                                    {{ $cage->name }}
                                </p>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">
                                    Jumlah Hewan
                                </label>

                                <p class="font-semibold">
                                    {{ $cage->animals->count() }} Ekor
                                </p>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">
                                    Dibuat Oleh
                                </label>

                                <p class="font-semibold">
                                    {{ $cage->user->full_name }}
                                </p>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">
                                    Dibuat Pada
                                </label>

                                <p class="font-semibold">
                                    {{ $cage->created_at->format('d M Y H:i') }}
                                </p>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">
                                    Terakhir Diubah
                                </label>

                                <p class="font-semibold">
                                    {{ $cage->updated_at->format('d M Y H:i') }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Daftar Hewan -->

            <div class="mt-10 bg-white rounded-3xl shadow-lg overflow-hidden">

                <div class="px-8 py-6 border-b">

                    <h2 class="text-2xl font-bold">

                        Daftar Hewan

                    </h2>

                    <p class="text-gray-500 mt-2">

                        Seluruh hewan yang berada di dalam kandang ini.

                    </p>

                </div>

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="px-6 py-4 text-center">
                                No
                            </th>

                            <th class="px-6 py-4 text-center">
                                Foto
                            </th>

                            <th class="px-6 py-4">
                                Kode
                            </th>

                            <th class="px-6 py-4">
                                Nama
                            </th>

                            <th class="px-6 py-4">
                                Kategori
                            </th>

                            <th class="px-6 py-4">
                                Grade
                            </th>

                            <th class="px-6 py-4 text-center">
                                Berat
                            </th>

                            <th class="px-6 py-4 text-center">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($cage->animals as $animal)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4 text-center">

                                    {{ $loop->iteration }}

                                </td>

                                <td class="px-6 py-4">

                                    <img
                                        src="{{ asset('storage/'.$animal->image) }}"
                                        class="w-20 h-20 rounded-xl object-cover">

                                </td>

                                <td class="px-6 py-4 font-semibold">

                                    {{ $animal->animal_code }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $animal->name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $animal->category->name }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $animal->grade->name }}

                                </td>

                                <td class="px-6 py-4 text-center">

                                    {{ $animal->weight }} Kg

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @if($animal->status == 'available')

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

                                            Tersedia

                                        </span>

                                    @elseif($animal->status == 'reserved')

                                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">

                                            Dipesan

                                        </span>

                                    @else

                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">

                                            Terjual

                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4 text-center">

                                    <a
                                        href="{{ route('animals.detail',$animal->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl transition">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="text-center py-10 text-gray-500">

                                    Belum ada hewan pada kandang ini.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>