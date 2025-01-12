<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Academy</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/output.css?v=') . time(); ?>">
</head>

<body>
    <div class="w-full h-full flex flex-col justify-center items-center font-roboto">
        <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-center font-exo2 font-semibold mb-1">Dashboard</h1>
        <p class="lg:text-lg">Selamat datang <?php echo $this->session->userdata('nama'); ?></p>
        <div class="mt-8 w-full flex flex-col md:flex-row justify-center items-center gap-3">
            <a href="<?php echo base_url("users"); ?>" class="h-44 aspect-[6/4] rounded-lg shadow-sm border-2 border-gray-300 flex flex-col items-center justify-center hover:ring hover:ring-warna-300 active:scale-95 transition-all">
                <i class="fa-solid fa-users text-4xl md:text-5xl"></i>
                <p class="mt-2 font-medium text-lg xl:text-xl">Total User</p>
                <p class="mt-3 font-bold text-lg xl:text-xl"><?php echo $users->total_users; ?></p>
            </a>
            <a href="<?php echo base_url("users"); ?>" class="h-44 aspect-[6/4] rounded-lg shadow-sm border-2 border-gray-300 flex flex-col items-center justify-center hover:ring hover:ring-warna-300 active:scale-95 transition-all">
                <i class="fa-solid fa-money-bill-trend-up text-4xl md:text-5xl"></i>
                <p class="mt-2 font-medium text-lg xl:text-xl">Total Transaksi</p>
                <p class="mt-3 font-bold text-lg xl:text-xl"><?php echo "Rp. " . number_format($users->total_gross_amount, 0, ',', '.'); ?></p>
            </a>
            <a href="<?php echo base_url("kursus"); ?>" class="h-44 aspect-[6/4] rounded-lg shadow-sm border-2 border-gray-300 flex flex-col items-center justify-center hover:ring hover:ring-warna-300 active:scale-95 transition-all">
                <i class="fa-solid fa-book text-4xl md:text-5xl"></i>
                <p class="mt-2 font-medium text-lg xl:text-xl">Total Kursus</p>
                <p class="mt-3 font-bold text-lg xl:text-xl"><?php echo $kelas->total_kursus; ?></p>
            </a>
            <a href="<?php echo base_url("materi"); ?>" class="h-44 aspect-[6/4] rounded-lg shadow-sm border-2 border-gray-300 flex flex-col items-center justify-center hover:ring hover:ring-warna-300 active:scale-95 transition-all">
                <i class="fa-solid fa-file-lines text-4xl md:text-5xl"></i>
                <p class="mt-2 font-medium text-lg xl:text-xl">Total Materi</p>
                <p class="mt-3 font-bold text-lg xl:text-xl"><?php echo $kelas->total_materi; ?></p>
            </a>
        </div>

    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>