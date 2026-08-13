<x-app-layout>

    <div class="py-6 px-6">

        <div class="flex justify-between items-center mb-6">

            <!-- Judul -->
            <h1 class="text-3xl font-bold">
                Data Hewan
            </h1>

            <!-- Filter + Tombol -->
            <div class="flex items-center gap-4">

                <form
                    action="{{ route('animals.index') }}"
                    method="GET">

                    <select
                        name="cage"
                        onchange="this.form.submit()"
                        class="w-56 border border-gray-300 rounded-xl px-4 pr-10 py-2
                            focus:ring-2 focus:ring-[#0FA958]
                            focus:border-[#0FA958]">

                        <option value="">
                            Semua Kandang
                        </option>

                        @foreach($cages as $cage)

                            <option
                                value="{{ $cage->id }}"
                                {{ request('cage') == $cage->id ? 'selected' : '' }}>

                                {{ $cage->name }}

                            </option>

                        @endforeach

                    </select>

                </form>

                <!-- Tombol Laporan -->
                <a
                    href="{{ route('animal-reports.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-xl transition">

                    📊 Laporan

                </a>

                <a
                    href="{{ route('animals.create') }}"
                    class="bg-[#0FA958] hover:bg-[#0d944f] text-white px-5 py-2 rounded-xl transition">

                    + Tambah Hewan

                </a>

            </div>

        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-x-auto">

            <table class="w-full text-sm text-gray-700">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">

                    <tr>

                        <th class="px-6 py-4 text-center">Kode</th>
                        <th class="px-6 py-4 text-center">Foto</th>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-center">Kategori</th>
                        <th class="px-6 py-4 text-center">Grade</th>
                        <th class="px-6 py-4 text-center">Kandang</th>
                        <th class="px-6 py-4 text-center">Gender</th>
                        <th class="px-6 py-4 text-center">Berat</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($animals as $animal)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="px-6 py-4 text-center font-semibold">

                            {{ $animal->animal_code }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center">

                                <img
                                    src="{{ asset('storage/'.$animal->image) }}"
                                    class="w-16 h-16 rounded-xl object-cover shadow">

                            </div>

                        </td>

                        <td class="px-6 py-4 font-medium">

                            {{ $animal->name }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ $animal->category->name }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ $animal->grade->name }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ $animal->cage->name }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ $animal->gender }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ $animal->weight }} Kg

                        </td>

                        <td class="px-6 py-4 text-center">

                            @if($animal->status == 'available')

                                <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">

                                    Available

                                </span>

                            @elseif($animal->status == 'reserved')

                                <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">

                                    Reserved

                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">

                                    Sold

                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('animals.detail', $animal->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg">

                                    Detail

                                </a>

                                <a
                                    href="{{ route('animals.edit',$animal->id) }}"
                                    class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg text-sm transition">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('animals.destroy',$animal->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm transition">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="10" class="text-center py-10 text-gray-500">

                            Belum ada data hewan.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>