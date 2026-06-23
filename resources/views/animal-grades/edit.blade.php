<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Grade Hewan
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('animal-grades.update', $animal_grade->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="block mb-2 font-medium">
                        Nama Grade
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $animal_grade->name) }}"
                        class="w-full border rounded-lg p-2">

                    @error('name')
                        <p class="text-red-500 text-sm">
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
                        rows="4"
                        class="w-full border rounded-lg p-2">{{ old('description', $animal_grade->description) }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

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