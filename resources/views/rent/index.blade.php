<x-app-layout>
<section id="order" class="h-screen p-10">
    <h1 class="text-2xl font-bold text-center text-[#e5e5e5]">RENT CAR</h1>
    <a href="{{ route('car.create') }}" class="btn bg-[#fca311] text-white mt-4">Add Car</a>
    <div class="grid grid-cols-4 gap-x-5 p-10">
        @for($i = 0; $i < 4; $i++) 
        <div class="card bg-base-100 shadow-xl">
            <figure><img src="{{ asset('car/yaris.png') }}" alt="Shoes" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">
                    Yaris RS
                    <div class="text-sm">Rp. 380.000 / 12 jam</div>
                </h2>
                <p>If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-end items-center">
                    <div class="">Rp. 380.000 / 12 jam</div>
                    <a href="#" class="btn bg-[#fca311] text-white">Rent!</a>
                </div>
            </div>
        </div>
    @endfor
    </div>
</section>
</x-app-layout>
