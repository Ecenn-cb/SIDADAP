<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-2xl font-bold mb-4">
            Edit Pengumuman
        </h1>

        <form
            action="{{ route('announcements.update',$announcement->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label>Judul</label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title',$announcement->title) }}"
                    class="w-full border rounded">

            </div>

            <div class="mb-4">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="w-full border rounded">{{ old('description',$announcement->description) }}</textarea>

            </div>

            <div class="mb-4">

                <img
                    src="{{ asset('storage/'.$announcement->image) }}"
                    class="w-32 mb-2">

                <input
                    type="file"
                    name="image">

            </div>

            <div class="mb-4">

                <label>Status</label>

                <select
                    name="status"
                    class="w-full border rounded">

                    <option
                        value="active"
                        {{ $announcement->status == 'active' ? 'selected' : '' }}>

                        Active

                    </option>

                    <option
                        value="inactive"
                        {{ $announcement->status == 'inactive' ? 'selected' : '' }}>

                        Inactive

                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded">

                Update

            </button>

        </form>

    </div>

</x-app-layout>