<div class="px-4">
    <h1 class="text-xl md:text-2xl font-exo2 font-semibold mb-2">Kursus</h1>
    <div class="mb-12 px-4 pb-10 shadow-lg">
        <h2 class="text-lg md:text-lg font-exo2 font-semibold mb-4">Tambah Kursus</h2>
        <form id="formTambahKursus" method="POST" action="<?php echo base_url("kursus/simpanKursus") ?>" class="flex flex-col lg:flex-row justify-center gap-3">
            <div class="lg:w-1/2">
                <div class="flex flex-col gap-2">
                    <label for="judul" class="font-medium">Judul</label>
                    <input type="text" name="judul" id="judul" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400" required>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="image_url" class="font-medium">Image_URL</label>
                    <input type="url" name="image_url" id="image_url" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 " required>
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="level" class="font-medium">Level</label>
                    <select name="level" id="level" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                        <option value="mudah">Mudah</option>
                        <option value="menengah">Menengah</option>
                        <option value="sulit">Sulit</option>
                    </select>
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="flex flex-col gap-2">
                    <label for="deskripsi" class="font-medium">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 " required>
                </div>
                <button type="submit" data-modal-target='notification-modal' data-modal-toggle="notification-modal" class="text-center cursor-pointer w-full mt-8 bg-warna-300 hover:bg-warna-400 active:scale-95 transition-all text-white font-roboto font-semibold rounded-md p-2 disabled:opacity-50">Tambah Kursus</button>
            </div>
        </form>
    </div>
</div>

<?php
$notification = $this->session->flashdata('notification');

if (!empty($notification)) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan modal setelah halaman dimuat
            const modal = document.getElementById('notification-modal');
            const overlay = document.getElementById('modal-overlay');
            modal.classList.remove('hidden');
            modal.classList.add('flex'); // Pastikan modal menggunakan flexbox untuk center
            overlay.classList.remove('hidden');
        });
    </script>";
?>
    <div id="modal-overlay" class="w-screen h-screen fixed inset-0 bg-black/50 z-40 transition-all"></div>

    <div id="notification-modal" tabindex="-1" class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="notification-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><?php echo $notification ?></h3>
                    <button data-modal-hide="notification-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tutup</button>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const closeModalButtons = document.querySelectorAll('[data-modal-hide]');
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.getElementById('notification-modal');
                const overlay = document.getElementById('modal-overlay');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                overlay.classList.add('hidden');
            });
        });
    });
</script>