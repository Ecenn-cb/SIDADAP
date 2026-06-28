<x-app-layout>

    <div class="py-8">

        <div class="max-w-7xl mx-auto">

            <!-- Header -->

            <div class="flex justify-between items-center mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">

                        Data Grade Hewan

                    </h1>

                    <p class="text-gray-500 mt-2">

                        Kelola seluruh grade hewan Teman Aqiqah.

                    </p>

                </div>

                <a
                    href="{{ route('animal-grades.create') }}"
                    class="bg-[#0FA958] hover:bg-[#0d944f] text-white px-5 py-3 rounded-xl font-semibold transition">

                    + Tambah Grade

                </a>

            </div>

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

                    {{ session('success') }}

                </div>

            @endif

            <!-- Table -->

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                <table class="w-full text-sm text-gray-700">

                    <thead class="bg-gray-100 uppercase text-xs text-gray-600">

                        <tr>

                            <th class="px-6 py-4 text-center">

                                No

                            </th>

                            <th class="px-6 py-4 text-left">

                                Nama Grade

                            </th>

                            <th class="px-6 py-4 text-left">

                                Deskripsi

                            </th>

                            <th class="px-6 py-4 text-center">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($grades as $grade)

                            <tr class="border-b hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-center font-semibold">

                                    {{ $loop->iteration }}

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    {{ $grade->name }}

                                </td>

                                <td class="px-6 py-4 text-gray-500">

                                    {{ $grade->description ?: '-' }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a
                                            href="{{ route('animal-grades.edit', $grade->id) }}"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-xl text-sm transition">

                                            Edit

                                        </a>

                                        <form
                                            action="{{ route('animal-grades.destroy', $grade->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                onclick="return confirm('Yakin ingin menghapus grade ini?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm transition">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="py-10 text-center text-gray-500">

                                    Belum ada data grade hewan.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>