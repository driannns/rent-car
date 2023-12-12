
<x-app-layout>
    @include('alert')
<section id="order" class=" p-10">
    <h1 class="text-2xl font-bold text-center text-[#e5e5e5]">RENT CAR</h1>
    <div class="grid grid-cols-8 gap-x-5 p-10">
        <a href="{{ route('car.create') }}" class="btn bg-[#fca311] text-white mt-4">Add Car</a>
        <a href="{{ route('car.create_category') }}" class="btn bg-[#fca311] text-white mt-4">Add Category</a>
    </div>
    
    <div class="grid grid-cols-4 gap-x-5 gap-y-5 p-10">
        @if (is_countable($data) && count($data) > 0)
        @foreach ($data as $data)
        <div class="card bg-base-100 shadow-xl">
            <figure style="width: 290px; height: 170px; overflow: hidden; ">
                <img  style=" object-fit: cover;" src="{{ asset('storage/'.$data->picture) }}" alt="Gambar Mobil" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">
                    {{$data->name}}
                    <div class="text-sm">Rp. {{ number_format($data->harga, 0, ',', '.') }} / 12 jam</div>
                </h2>
                <p>{{substr($data->deskripsi, 0, 70) . '   ...'}}</p>
                <div class="card-actions justify-end items-center">
                    <div class="">Rp. {{ number_format($data->harga, 0, ',', '.') }} / 12 jam</div>
                    <a href="#" class="btn bg-[#fca311] text-white">Rent!</a>
                </div>
            </div>
        </div>
    @endforeach
    @endif
    </div>
</section>
</x-app-layout>
