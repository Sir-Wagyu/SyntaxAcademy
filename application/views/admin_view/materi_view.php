<div class="px-4">

    <h1 class="text-xl md:text-2xl font-exo2 font-semibold mb-2">Materi</h1>
    <div class="mb-12 px-4 pb-10 shadow-lg">
        <h2 class="text-lg md:text-lg font-exo2 font-semibold mb-4">Tambah Materi</h2>
        <form method="POST" action="<?php echo base_url("kursus/simpanKursus") ?>" class="flex flex-col lg:flex-row justify-center gap-3">
            <div class="lg:w-1/2">
                <div class="flex flex-col gap-2">
                    <label for="kursus" class="font-medium">Kursus</label>
                    <select name="kursus" id="kursus" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                        <!-- nanti pake foreach dari database -->
                        <option value="mudah">HTML</option>
                        <option value="menengah">CSS</option>
                        <option value="sulit">Javascript</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="judul_materi" class="font-medium">Judul Materi</label>
                    <input type="text" name="judul_materi" id="judul_materi" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="video_url" class="font-medium">Video URL</label>
                    <input type="url" name="video_url" id="video_url" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="flex flex-col gap-2">
                    <label for="konten" class="font-medium">Konten</label>
                    <input type="text" name="konten" id="konten" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                </div>
                <button type="submit" data-modal-target="notification-modal" data-modal-toggle="notification-modal" data-modal-target="notification-modal" class="w-full mt-8 bg-warna-400 text-white font-roboto font-semibold rounded-md p-2 disabled:opacity-50">Tambah Materi</button>
            </div>
        </form>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kursus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Video
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Materi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Konten
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        Yes
                    </td>
                    <td class="px-6 py-4">
                        Yes
                    </td>

                    <td class="flex items-center px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>