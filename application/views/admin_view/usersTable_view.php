<div class="px-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                <th scope="col" class="px-6 py-3">
                    NO.
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Mulai
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Selesai
                </th>

                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $n = 1; ?>
                    <?php foreach ($users as $u): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $n ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $u->nama ?>
                            </td>
                            <td class="px-6 py-4">
                                <p class="line-clamp-2">
                                    <?php echo $u->email ?>
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="line-clamp-2 
                                <?php if ($u->status == "aktif") {
                                    echo "text-green-600";
                                } elseif ($u->status == "expired") {
                                    echo "text-red-600";
                                } elseif ($u->status == "free") {
                                    echo "text-yellow-600";
                                } ?>
                                ">
                                    <?php echo $u->status ?>
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="line-clamp-2">
                                    <?php if (empty($u->tanggal_mulai)) {
                                        echo "Belum berlangganan";
                                    } else {
                                        echo $u->tanggal_mulai;
                                    }
                                    ?>
                                </p>
                            </td>
                            </td>
                            <td class="px-6 py-4">
                                <p class="line-clamp-2">
                                    <?php if (empty($u->tanggal_selesai)) {
                                        echo "Belum berlangganan";
                                    } else {
                                        echo $u->tanggal_selesai;
                                    }
                                    ?>
                                </p>
                            </td>
                        </tr>
                        <?php $n++; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-10 font-medium">Data materi tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>


<!-- modal form update -->
<?php if (isset($_GET['edit'])): ?>

    <!-- manggil data materi sesuai idnya (id dari $_GET['edit']) -->
    <?php
    $this->load->model('materi_model');
    $m = $this->materi_model->getMateriByID($_GET['edit']);
    ?>

    <!-- buat munculin modalnya -->
    <?php
    echo
    "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('update-modal');
            const overlay = document.getElementById('modal-overlay');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            overlay.classList.remove('hidden');
        });
        </script>
        "
    ?>
    <div id="modal-overlay" class="hidden w-screen h-screen fixed inset-0 bg-black/50 z-40 transition-all"></div>
    <div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Update Materi <?php echo $m->judul ?>
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form class="p-4 md:p-5" method="post" id="formEditMateri" action="<?php echo base_url('materi/updateMateri/' . $m->id_materi) ?>">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="judul_materi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Materi</label>
                            <input type="text" name="judul_materi" id="judul_materi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo $m->judul ?>">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="video_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video URL</label>
                            <input type="url" name="video_url" id="video_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value='<?php echo $m->video_url ?>'>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="kursus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kursus</label>
                            <select id="kursus" name="id_kursus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php foreach ($kursus as $k): ?>
                                    <option value="<?php echo $k->id_kursus; ?>" <?php echo ($k->id_kursus == $m->kursus_id_kursus) ? 'selected' : ''; ?>>
                                        <?php echo $k->judul; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="konten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten</label>
                            <textarea id="konten" name="konten" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $m->konten ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Data Materi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- buat close modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeModalButtons = document.querySelectorAll('[data-modal-hide]');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.getElementById('update-modal');
                    const overlay = document.getElementById('modal-overlay');
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    overlay.classList.add('hidden');
                    window.location.href = "<?php echo base_url('materi'); ?>";
                });
            });
        });
    </script>

<?php endif; ?>