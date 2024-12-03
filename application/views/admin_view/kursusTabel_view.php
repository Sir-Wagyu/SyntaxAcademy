<div class="px-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kursus)): ?>
                    <?php foreach ($kursus as $k): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $k->id_kursus; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $k->judul; ?>
                            </td>
                            <td class="px-6 py-4">
                                <img src="<?php echo $k->image_url; ?>" alt="" class="w-14 aspect-square">
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $k->description; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $k->level; ?>
                            </td>
                            <td class="flex items-center px-6 py-4 gap-3">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="<?php echo base_url('kursus/hapusKursus/' . $k->id_kursus); ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline ml-3">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>