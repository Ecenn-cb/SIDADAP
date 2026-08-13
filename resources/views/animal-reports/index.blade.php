<x-app-layout>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Laporan Data Hewan
            </h2>

            {{-- Filter Periode --}}
            <div class="bg-white rounded-2xl shadow p-6 mb-8">

                <form
                    action="{{ route('animal-reports.index') }}"
                    method="GET"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end"
                >

                    <div>
                        <label
                            for="start_date"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            value="{{ $startDate }}"
                            class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                        >
                    </div>

                    <div>
                        <label
                            for="end_date"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Tanggal Akhir
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            value="{{ $endDate }}"
                            class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                        >
                    </div>

                    <div class="flex gap-2">

                        <button
                            type="submit"
                            class="px-6 py-3 bg-[#0FA958] text-white rounded-xl font-semibold hover:bg-green-700 transition"
                        >
                            Tampilkan
                        </button>

                        <a
                            href="{{ route('animal-reports.index') }}"
                            class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition"
                        >
                            Reset
                        </a>

                        <a
                            href="{{ route('animals.report.pdf', request()->query()) }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition"
                        >
                            🖨️ Cetak Laporan
                        </a>

                    </div>

                </form>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500">
                        Hewan Masuk
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalIn }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500">
                        Hewan Keluar
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalOut }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500">
                        Hewan Tersedia
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalAvailable }}
                    </h3>
                </div>

            </div>

            {{-- Data Hewan Masuk --}}
            <div class="bg-white rounded-2xl shadow overflow-hidden mb-8">

                <div class="p-6 border-b">
                    <h3 class="font-bold text-lg">
                        Data Hewan Masuk
                    </h3>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-50">

                            <tr>
                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Kode</th>
                                <th class="px-6 py-4 text-left">Nama</th>
                                <th class="px-6 py-4 text-left">Kategori</th>
                                <th class="px-6 py-4 text-left">
                                    Tanggal Masuk
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($animalsIn as $animal)

                                <tr class="border-t">

                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->animal_code }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->category->name ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->entry_date?->format('d-m-Y') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td
                                        colspan="5"
                                        class="px-6 py-8 text-center text-gray-500"
                                    >
                                        Belum ada data hewan masuk.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Data Hewan Keluar --}}
            <div class="bg-white rounded-2xl shadow overflow-hidden">

                <div class="p-6 border-b">

                    <h3 class="font-bold text-lg">
                        Data Hewan Keluar
                    </h3>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Kode
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Nama
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Tanggal Masuk
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Tanggal Keluar
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Alasan
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($animalsOut as $animal)

                                <tr class="border-t">

                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->animal_code }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->name ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->entry_date?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->exit_date?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animal->reason }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="px-6 py-8 text-center text-gray-500"
                                    >
                                        Belum ada data hewan keluar.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>