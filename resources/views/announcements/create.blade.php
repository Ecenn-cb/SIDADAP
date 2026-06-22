<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-2xl font-bold mb-4">
            Tambah Pengumuman
        </h1>

        <form
            action="{{ route('announcements.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label>Judul</label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border rounded">

                @error('title')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="mb-4">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="w-full border rounded">{{ old('description') }}</textarea>

            </div>

            <div class="mb-4">

                <label>Gambar</label>

                <input
                    type="file"
                    name="image">

            </div>

            <div class="mb-4">

                <label>Status</label>

                <select
                    name="status"
                    class="w-full border rounded">

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded">

                Simpan

            </button>

        </form>

    </div>

</x-app-layout>