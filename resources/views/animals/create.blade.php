<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Hewan
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('animals.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label>Nama Hewan</label>
                        <input type="text" name="name"
                            class="w-full border rounded p-2">
                    </div>

                    <div>
                        <label>Kategori</label>
                        <select name="category_id"
                            class="w-full border rounded p-2">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label>Grade</label>
                        <select name="grade_id"
                            class="w-full border rounded p-2">

                            @foreach($grades as $grade)

                                <option value="{{ $grade->id }}">
                                    {{ $grade->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label>Kandang</label>
                        <select name="cage_id"
                            class="w-full border rounded p-2">

                            @foreach($cages as $cage)

                                <option value="{{ $cage->id }}">
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

                            <option value="Male">
                                Male
                            </option>

                            <option value="Female">
                                Female
                            </option>

                        </select>

                    </div>

                    <div>
                        <label>Berat (Kg)</label>

                        <input
                            type="number"
                            name="weight"
                            class="w-full border rounded p-2">
                    </div>

                    <div>
                        <label>Umur (Tahun)</label>

                        <input
                            type="number"
                            name="age"
                            class="w-full border rounded p-2">
                    </div>

                    <div>
                        <label>Tanggal Masuk</label>

                        <input
                            type="date"
                            name="entry_date"
                            class="w-full border rounded p-2">
                    </div>

                    <div>
                        <label>Status</label>

                        <select
                            name="status"
                            class="w-full border rounded p-2">

                            <option value="available">
                                Available
                            </option>

                            <option value="reserved">
                                Reserved
                            </option>

                            <option value="sold">
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
                    </div>

                </div>

                <div class="mt-4">

                    <label>Deskripsi</label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full border rounded p-2"></textarea>

                </div>

                <button
                    type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</x-app-layout>