<x-app-layout>
    <div class="flex flex-col p-10 font-sans-serif items-center justify-center">
        <div class="relative h-auto bg-white rounded-lg shadow-lg w-2/5">
          <div class="relative border-b-2">
            <h1 class="text-3xl m-4 text-gray-600">Ubah Kategori Mobil</h1>
          </div>
          <div class="relative p-4" >
            <form class="relative" action="{{ route('edit_category', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-4 pt-0 flex flex-col">
              <label class="mb-2 text-gray-800 text-lg font-light" for="category">Nama Kategori Baru</label>
              <input type="text" id="category" name="category" class="border-2 rounded h-10 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300" autocomplete="off" placeholder="{{$data->category}}" />
            </div>
            <div class="rel pt-0 flex flex-col p-4 w-full">
                <input type="submit" value="Ubah" class="bg-blue-500 text-white h-16 rounded-lg font-bold">
              </div>
          </form>
          </div>
          
        </div>
      </div>
</x-app-layout>