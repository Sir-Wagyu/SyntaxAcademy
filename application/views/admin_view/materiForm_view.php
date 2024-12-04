<div class="px-4">
    <h1 class="text-xl md:text-2xl font-exo2 font-semibold mb-2">Tambah Materi</h1>
    <div class="mb-12 px-4 pb-10 shadow-lg">
        <form id="formTambahMateri" method="POST" action="<?php echo base_url("materi/simpanMateri") ?>" class="flex flex-col lg:flex-row justify-center gap-3">
            <div class="lg:w-1/2">
                <div class="flex flex-col gap-2">
                    <label for="kursus" class="font-medium">Kursus</label>
                    <select name="kursus" id="kursus" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                        <!-- Looping data kursus -->
                        <?php if (!empty($kursus)) : ?>
                            <?php foreach ($kursus as $k): ?>
                                <option value="<?php echo $k->id_kursus; ?>"><?php echo $k->judul; ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option disabled selected>Data kursus kosong. Mohon isi terlebih dahulu</option>
                        <?php endif; ?>
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
                <button type="submit" data-modal-target="notification-modal" data-modal-toggle="notification-modal" class="w-full mt-8 bg-warna-400 text-white font-roboto font-semibold rounded-md p-2 disabled:opacity-50">Tambah Materi</button>
            </div>
        </form>
    </div>
</div>