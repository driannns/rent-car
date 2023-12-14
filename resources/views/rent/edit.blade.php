<x-app-layout>
    @include ('alert')
    <section id="order" class="p-10 text-black">
        <form action="{{ route('car.update', $car->id) }}" method="post" class="card bg-white border-2 shadow-xl p-5" enctype="multipart/form-data">
            @csrf    
            @method('put')
            <h1 class="font-bold text-xl text-center">Edit {{ $car->name }}</h1>
            <div class="flex gap-x-2">
                <div class="w-1/3 bg-cover bg-center bg-no-repeat h-full"
                    style="background-image: url('{{ asset('storage/'.$car->picture) }}')">
                    <img class="invisible overflow-hidden" style="object-fit: cover;" src="{{ asset('car/yaris.png') }}"
                        alt="Gambar Mobil" />
                </div>
                <div class="w-2/3 flex flex-col gap-y-2">
                    <input type="text" name="name" placeholder="Type here" value="{{ $car->name }}"
                        class="input input-bordered w-full bg-white border-gray-500" />
                    <textarea name="deskripsi" class="textarea textarea-bordered w-full bg-white border-gray-500"
                        placeholder="Bio">{{ $car->deskripsi }}</textarea>
                    <select class="select select-bordered w-full bg-white" name="id_category" required>
                        <option value="" selected>Category</option>
                        @foreach($category as $data)
                        <option class="text-black" value="{{ $data->id }}" {{ $car->id_category == $data->id ? 'selected' : " " }}> {{ $data->category   }}</option>
                        @endforeach
                    </select>
                    <select class="select select-bordered w-full bg-white"  name="bbm" required>
                        <option value="" selected>BBM</option>
                        <option class="text-black" value="Bensin" {{ $car->bbm == "Bensin" ? 'selected' : " " }}>Bensin</option>
                        <option class="text-black" value="Solar" {{ $car->bbm == "Solar" ? 'selected' : " " }}>Solar</option>
                    </select>
                    <input type="number" placeholder="Type here" value="{{ $car->harga }}" name="harga"
                        class="input input-bordered w-full bg-white border-gray-500" />
                    <input type="file" class="file-input file-input-bordered w-full bg-white" name="picture"/>    
                    <button type="submit" class="btn">Edit</button>
                </div>

            </div>
        </form>
    </section>
</x-app-layout>
