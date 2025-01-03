<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Academy</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/output.css?v=') . time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- midtrans -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-g8nm10GiwT2y9Y20"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <nav id="navbar" class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600 font-poppins transition-all duration-300">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?php echo base_url("/") ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="<?php echo base_url('/assets/img/SA_Logo.png') ?>" class="h-9 md:hidden" alt="Flowbite Logo">
                <span class="hidden md:block self-center text-2xl font-semibold whitespace-nowrap dark:text-white font-roboto text-warna-300">
                    Syntax Academy
                </span>
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
                            <?php $userProfile = $user->foto_profile ?>
                            <?php if (!empty($userProfile)): ?>
                                <img class="w-8 h-8 rounded-full" src="<?php echo base_url('uploads/profile_pictures/' . $userProfile) ?>" alt="user photo">
                            <?php else: ?>
                                <img class="w-8 h-8 rounded-full" src="<?php echo base_url("/assets/img/default_userProfile.jpg?v=") ?>" alt="user photo">
                            <?php endif; ?>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <div class="flex justify-between items-center">
                                    <span class="block text-sm text-gray-900 dark:text-white"><?php echo $user->nama; ?></span>
                                    <p class="block w-max text-xs  px-3 py-1 <?php echo $user->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>"> <?php echo $user->status ?></p>
                                </div>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $user->email; ?></span>
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

    <div class="pt-20 font-poppins">
        <?php
        if (empty($konten)) {
            echo "";
        } else {
            echo $konten;
        };
        ?>

    </div>



    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            let id_user = $('#id_user').val();
            let nama = $('#nama').val();
            let email = $('#email').val();
            let status = $('#status').val();

            let id_langganan = $('#id_langganan').val();
            let namaPaket = $('#namaPaket').val();
            let durasi = $('#durasi').val();
            let harga = $('#harga').val();
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>/snap/token',
                data: {
                    id_user: id_user,
                    nama: nama,
                    email: email,
                    status: status,
                    id_langganan: id_langganan,
                    namaPaket: namaPaket,
                    durasi: durasi,
                    harga: harga
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>



    <script src="<?= base_url('node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>
</body>

</html>