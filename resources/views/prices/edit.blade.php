<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Harga Paket
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('prices.update', $price->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Paket
                    </label>

                    <select
                        name="package_id"
                        class="w-full border rounded-lg p-2">

                        @foreach($packages as $package)

                            <option
                                value="{{ $package->id }}"
                                {{ $price->package_id == $package->id ? 'selected' : '' }}>

                                {{ $package->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Jumlah Box
                    </label>

                    <input
                        type="number"
                        name="box_count"
                        value="{{ $price->box_count }}"
                        class="w-full border rounded-lg p-2">

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Harga Betina
                    </label>

                    <input
                        type="number"
                        name="female_price"
                        value="{{ $price->female_price }}"
                        class="w-full border rounded-lg p-2">

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Harga Jantan
                    </label>

                    <input
                        type="number"
                        name="male_price"
                        value="{{ $price->male_price }}"
                        class="w-full border rounded-lg p-2">

                </div>

                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                    Update

                </button>

            </form>

        </div>

    </div>

</x-app-layout>