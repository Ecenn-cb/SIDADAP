<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Kandang
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('cages.store') }}"
                method="POST">

                @csrf

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Nama Kandang
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border rounded-lg p-2">

                    @error('name')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Jumlah Hewan
                    </label>

                    <input
                        type="number"
                        name="total_animals"
                        value="{{ old('total_animals') }}"
                        class="w-full border rounded-lg p-2">

                    @error('total_animals')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</x-app-layout>