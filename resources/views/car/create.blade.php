<x-app-layout>
    <div class="flex flex-col p-10 font-sans-serif items-center justify-center">
        <div class="relative h-auto bg-white rounded-lg shadow-lg w-4/5">
          <div class="relative border-b-2">
            <h1 class="text-3xl m-4 text-gray-600">Tambahkan Mobil</h1>
          </div>
          <div class="relative p-4" >
            <form class="relative" action="" enctype="multipart/form-data">
            <div class="mb-4 pt-0 flex flex-col">
              <label class="mb-2 text-gray-800 text-lg font-light" for="car_name">Nama Mobil</label>
              <input type="text" id="car_name" class="border-2 rounded h-10 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300" autocomplete="off" />
            </div>
              <div class="mb-4 pt-0 flex flex-col">
              <label class="mb-2 text-gray-800 text-lg font-light" for="car_category">Kategori</label>
              <select type="text" id="car_category" class="border-2 rounded h-10 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300" autocomplete="off" >
                <option value="Sedan">Sedan</option>
                <option value="MPV">MPV</option>
                <option value="SUV">SUV</option>
                <option value="Mini SUV">Mini SUV</option>
              </select>
            </div>
            
                <div class="mb-4 pt-0 flex flex-col">
                <label class="mb-2 text-gray-800 text-lg font-light" for="car_price">Harga</label>
                <input type="text" id="car_price" class="border-2 rounded h-10 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300" autocomplete="off" />
            </div>
            <div class="pt-0 flex flex-col">
              <label class="mb-4 text-gray-600 text-lg font-light" for="car_image">Gambar Mobil</label>
             <label for="car_image" class="flex flex-col items-center justify-center border-4 border-gray-300 border-dashed rounded h-36 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300 cursor-pointer"" autocomplete="off">
                  <svg class="w-8 h-8 text-gray-600
                  " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                  <span class="mt-2 text-base leading-normal text-blue-500 font-bold">Masukkan Gambar</span>
                  <input type="file" id="car_image" class="hidden"/>
             </label>
              <p class="py-2 text-gray-400">Masukkan tipe file gambar: JPG, JPEG, PNG </p>
            </div>
            <div class="rel pt-0 flex flex-col p-4 w-full">
                <input type="submit" value="Submit" class="bg-blue-500 text-white h-16 rounded-lg font-bold">
              </div>
          </form>
          </div>
          
        </div>
      </div>
</x-app-layout>