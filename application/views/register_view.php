<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Academy</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/output.css?v=') . time(); ?>">

</head>

<body class="px-4 xs:px-6 w-screen h-screen flex flex-col items-center justify-center">
    <div class="md:w-1/2 lg:w-[38%] xl:w-[30%]">
        <div>
            <img src="" alt="">
            <h1 class="text-xl md:text-2xl lg:text-3xl text-center font-exo2 font-semibold mb-1">Pendaftaran Akun</h1>
            <p class="text-base lg:text-lg text-gray-600 text-center font-roboto">Yuk daftarin akunmu sekarang.</p>
        </div>
        <?php
        $pesanRegister = $this->session->flashdata('pesanRegister');
        if ($pesanRegister == "") {
            echo "";
        } else {
            echo "
				<div class='my-6 px-4 py-2 bg-red-100 border border-red-500 text-center rounded-md'>
					<p class='text-red-500'> $pesanRegister</p>
				</div>
				";
        }

        ?>
        <div class="w-full font-roboto  <?= $pesanRegister ? 'mt-0' : 'mt-12'; ?>">
            <form action="<?= site_url('Auth/prosesRegister') ?>" method="POST">
                <div class="flex flex-col gap-2">
                    <label for="nama" class="font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="nama" name="nama" id="nama" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                </div>

                <div class="flex flex-col gap-2 mt-4">
                    <label for="email" class="font-medium">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400 ">
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="password" class="font-medium">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:border-warna-400">
                </div>
                <button type="submit" class="w-full mt-8 bg-warna-400 text-white font-roboto font-semibold rounded-md p-2 disabled:opacity-50">Daftar</button>
            </form>
        </div>
        <p class="mt-4 text-center font-roboto">Sudah punya akun? <a href="<?= site_url('/'); ?>" class="text-warna-400 font-bold">Login</a></p>
    </div>
</body>

</html>