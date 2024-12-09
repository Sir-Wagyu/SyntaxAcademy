<div class="max-w-screen-xl mx-auto p-4 font-poppins">
    <div>
        <h1><?php echo $materi->judul; ?></h1>
        <p><?php echo $materi->konten; ?></p>
    </div>
    <div class="mt-4">
        <?php
        $nextMateri = null;
        foreach ($listMateri as $index => $m) {
            if ($m->id_materi == $materi->id_materi && isset($listMateri[$index + 1])) {
                $nextMateri = $listMateri[$index + 1];
                break;
            }
        }
        ?>
        <?php if ($nextMateri): ?>
            <a href="<?php echo base_url('elearning/detail_materi/' . $kursus->id_kursus . '/' . $nextMateri->id_materi); ?>" class="px-6 py-3 rounded-md bg-warna-300 text-white font-semibold active:scale-95 transition-all select-none">Materi Selanjutnya</a>
        <?php endif; ?>
    </div>
</div>