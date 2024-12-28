<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Academy</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/output.css?v=') . time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body class="font-poppins">
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600 font-poppins">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?php base_url("/") ?>" class="flex items-center rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 md:hidden" alt="Flowbite Logo">
                <span class="hidden md:block self-center text-2xl font-semibold whitespace-nowrap dark:text-white font-roboto ">Syntax Academy</span>
            </a>
            <?php $role = $this->session->userdata('role') ?>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <?php if (!$this->session->userdata('role')): ?>
                    <div class="hidden gap-3 md:block">
                        <a href="<?php echo base_url("auth/login") ?>" type="button" class="px-4 py-2 text-warna-300 border border-warna-300 rounded-md font-medium hover:bg-warna-300 hover:text-white active:scale-95 transition-all">Masuk</a>
                        <a href="<?php echo base_url("auth/register") ?>" class="px-4 py-2 text-white bg-warna-300 rounded-md font-medium hover:bg-warna-400 active:scale-95 transition-all">Daftar</a>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->userdata('role')): ?>
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white"><?php echo $this->session->userdata('nama'); ?></span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $this->session->userdata('email'); ?></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="<?php echo base_url('profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("auth/logout") ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                <?php endif; ?>

                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="<?php echo base_url('home') ?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-warna-300 md:p-0 md:dark:hover:text-warna-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('elearning') ?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-warna-300 md:p-0 md:dark:hover:text-warna-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">E-Learning</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('pricing') ?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-warna-300 md:p-0 md:dark:hover:text-warna-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('contact') ?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-warna-300 md:p-0 md:dark:hover:text-warna-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                    <li class="md:hidden flex flex-col gap-2 mt-4 mx-2">
                        <a href="<?php echo base_url("auth/login"); ?>" type="button" class="px-4 py-2 text-center text-warna-300 border border-warna-300 rounded-md font-medium hover:bg-warna-300 hover:text-white active:scale-95 transition-all">Masuk</a>
                        <a href="<?php echo base_url("auth/register") ?>" class="px-4 py-2 text-center text-white bg-warna-300 rounded-md font-medium hover:bg-warna-400 active:scale-95 transition-all">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="max-w-screen-xl mx-auto pt-20 px-4 pb-10">
        <div class="p-5 border border-gray-200 rounded-lg w-full lg:w-[70%] mx-auto">
            <h1 class="text-2xl lg:text-3xl font-semibold">Invoice</h1>
            <p>ID - <?php echo $transaksi->order_id ?></p>
            <div class="mt-5">
                <p class="text-sm lg:text-base text-gray-500 font-semibold">Waktu Transaksi</p>
                <p class="text-sm lg:text-base mt-2 lg:mt-1"><?php echo $transaksi->transaction_time ?></p>
            </div>
            <div class="mt-5">
                <p class="text-sm lg:text-base text-gray-500 font-semibold">Nama Produk</p>
                <p class="text-sm lg:text-base mt-2 lg:mt-1">Paket Langganan <?php echo $transaksi->namaPaket ?></p>
            </div>
            <div class="mt-5">
                <p class="text-sm lg:text-base text-gray-500 font-semibold">Metode Pembayaran</p>
                <p class="text-sm lg:text-base mt-2 lg:mt-1"><?php echo $transaksi->payment_type ?></p>
            </div>
            <div class="mt-5">
                <p class="text-sm lg:text-base text-gray-500 font-semibold">Nomor Virtual Account</p>
                <p class="text-sm lg:text-base mt-2 lg:mt-1"><?php echo $transaksi->va_number ?></p>
            </div>
            <div class="mt-5">
                <p class="text-sm lg:text-base text-gray-500 font-semibold">Total Pembelian</p>
                <p class="text-sm lg:text-base mt-2 lg:mt-1">Rp. <?php echo number_format($transaksi->gross_amount, 0, ',', '.') ?></p>
            </div>
            <div class="mt-5">
                <p class="text-sm lg:text-base text-gray-500 font-semibold">Total Pembayaran</p>
                <p class="text-sm lg:text-base mt-2 lg:mt-1">Rp. <?php echo number_format($transaksi->gross_amount, 0, ',', '.') ?></p>
            </div>
            <div class="mt-8 flex flex-col lg:flex-row justify-center items-center gap-3">
                <a href="<?php echo base_url('profile/downloadInvoice/' . $transaksi->order_id) ?>" class="w-full text-center bg-warna-300 hover:bg-warna-400 active:scale-95 transition-all text-white font-semibold py-2 px-4 md:px-6 rounded-md ">Download Invoice</a>
                <a href="<?php echo base_url('profile/riwayat_transaksi') ?>" class="w-full text-center border border-warna-300 hover:bg-warna-300 active:scale-95 transition-all text-warna-300 hover:text-white font-semibold py-2 px-4 md:px-6 rounded-md">Kembali</a>

            </div>
        </div>

    </div>
    <script src="<?= base_url('node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>
</body>


</html>