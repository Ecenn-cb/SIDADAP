<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Paket
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('packages.update', $package->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Nama Paket
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $package->name) }}"
                        class="w-full border rounded-lg p-2">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border rounded-lg p-2">{{ old('description', $package->description) }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                        Update

                    </button>

                    <a
                        href="{{ route('packages.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>