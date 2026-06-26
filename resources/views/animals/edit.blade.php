<x-app-layout>

<div class="py-6 px-6">

    <h1 class="text-3xl font-bold mb-6">
        Edit Hewan
    </h1>

    <div class="bg-white shadow rounded-lg p-6">

        <form
            action="{{ route('animals.update', $animal->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label>Nama Hewan</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $animal->name) }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Kategori</label>

                    <select
                        name="category_id"
                        class="w-full border rounded p-2">

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ $animal->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>
                    <label>Grade</label>

                    <select
                        name="grade_id"
                        class="w-full border rounded p-2">

                        @foreach($grades as $grade)

                            <option
                                value="{{ $grade->id }}"
                                {{ $animal->grade_id == $grade->id ? 'selected' : '' }}>

                                {{ $grade->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>
                    <label>Kandang</label>

                    <select
                        name="cage_id"
                        class="w-full border rounded p-2">

                        @foreach($cages as $cage)

                            <option
                                value="{{ $cage->id }}"
                                {{ $animal->cage_id == $cage->id ? 'selected' : '' }}>

                                {{ $cage->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>
                    <label>Gender</label>

                    <select
                        name="gender"
                        class="w-full border rounded p-2">

                        <option
                            value="Male"
                            {{ $animal->gender == 'Male' ? 'selected' : '' }}>

                            Male

                        </option>

                        <option
                            value="Female"
                            {{ $animal->gender == 'Female' ? 'selected' : '' }}>

                            Female

                        </option>

                    </select>

                </div>

                <div>
                    <label>Berat (Kg)</label>

                    <input
                        type="number"
                        name="weight"
                        value="{{ old('weight', $animal->weight) }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Umur (Tahun)</label>

                    <input
                        type="number"
                        name="age"
                        value="{{ old('age', $animal->age) }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Tanggal Masuk</label>

                    <input
                        type="date"
                        name="entry_date"
                        value="{{ old('entry_date', $animal->entry_date) }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Status</label>

                    <select
                        name="status"
                        class="w-full border rounded p-2">

                        <option
                            value="available"
                            {{ $animal->status == 'available' ? 'selected' : '' }}>

                            Available

                        </option>

                        <option
                            value="reserved"
                            {{ $animal->status == 'reserved' ? 'selected' : '' }}>

                            Reserved

                        </option>

                        <option
                            value="sold"
                            {{ $animal->status == 'sold' ? 'selected' : '' }}>

                            Sold

                        </option>

                    </select>

                </div>

                <div>
                    <label>Foto Hewan</label>

                    <input
                        type="file"
                        name="image"
                        class="w-full border rounded p-2">

                    @if($animal->image)

                        <img
                            src="{{ asset('storage/'.$animal->image) }}"
                            class="mt-2 w-32 h-32 object-cover rounded">

                    @endif

                </div>

            </div>

            <div class="mt-4">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full border rounded p-2">{{ old('description', $animal->description) }}</textarea>

            </div>

            <div class="mt-4 flex gap-2">

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded">

                    Update

                </button>

                <a
                    href="{{ route('animals.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>
