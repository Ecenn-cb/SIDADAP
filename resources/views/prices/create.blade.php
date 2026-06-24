<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Harga Paket
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('packages.prices.store', $package->id) }}"
                method="POST">

                @csrf

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Paket
                    </label>

                    <div class="mb-4">

                        <input
                            type="text"
                            value="{{ $package->name }}"
                            class="w-full border rounded-lg p-2 bg-gray-100"
                            readonly>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Jumlah Box
                    </label>

                    <input
                        type="number"
                        name="box_count"
                        class="w-full border rounded-lg p-2">

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Harga Anak Perempuan (1 Ekor)
                    </label>

                    <input
                        type="number"
                        name="female_price"
                        class="w-full border rounded-lg p-2">

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Harga Anak Laki-Laki (2 Ekor)
                    </label>

                    <input
                        type="number"
                        name="male_price"
                        class="w-full border rounded-lg p-2">

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