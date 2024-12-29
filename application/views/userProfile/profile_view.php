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
                            <?php if (!empty($user->foto_profile)): ?>
                                <img class="w-8 h-8 rounded-full" src="<?php echo base_url('uploads/profile_pictures/' . $user->foto_profile) ?>" alt="user photo">
                            <?php else: ?>
                                <img class="w-8 h-8 rounded-full" src="<?php echo base_url("/assets/img/default_userProfile.jpg?v=") ?>" alt="user photo">
                            <?php endif; ?>
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
        <h1 class="text-2xl font-semibold my-3">Dashboard Profil</h1>
        <div class="lg:hidden">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="w-full justify-between text-warna-300 border border-warna-300 focus:ring-2 focus:outline-none focus:ring-warna-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Navigasi Profile <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="w-[90%] z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="<?php echo base_url('profile') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile Saya</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('profile/ganti_password') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ganti Password</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('profile/riwayat_transaksi') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Riwayat Transaksi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('auth/logout') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full inline-flex gap-4">
            <div class="mt-6 hidden lg:block border border-gray-200 rounded-lg p-4 lg:w-[35%] h-max">
                <h2 class="font-semibold pb-2 border-b border-gray-200">Navigasi Profile</h2>
                <div>
                    <a href="<?php echo base_url('profile') ?>" class="block mt-4 hover:text-warna-300">Profile Saya</a>
                    <a href="<?php echo base_url('profile/ganti_password') ?>" class="block mt-4 hover:text-warna-300">Ganti Password</a>
                    <a href="<?php echo base_url('profile/riwayat_transaksi') ?>" class="block mt-4 hover:text-warna-300">Riwayat Transaksi</a>
                    <a href="<?php echo base_url('auth/logout') ?>" class="block mt-4 hover:text-red-500">Log out</a>
                </div>
            </div>
            <div class="mt-6 border border-gray-200 rounded-lg p-4 w-full lg:w-[65%]">
                <?php if (empty($konten)) {
                    echo "";
                } else {
                    echo $konten;
                } ?>
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
        <script src="<?= base_url('node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>
</body>


</html>