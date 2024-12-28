<h1 class="text-2xl font-medium">Ubah Password Akun</h1>
<form id="gantiPasswordForm" method="POST" action="<?= base_url('profile/gantiPassword') ?>">
    <div class="mt-5">
        <h2>Password Lama <span class="text-red-500">*</span></h2>
        <div class="relative mt-2 w-full rounded-md focus:outline-none focus:ring-2 focus:border-warna-400">
            <input name="password_lama" type="password" class="w-full relative rounded-md border border-gray-300">
            <i id="iconTogglePassword" class="fa-regular fa-eye-slash cursor-pointer font-bold absolute right-0 text-gray-400 text-lg bloc w-10 text-center py-3" onclick="togglePassword(this.previousElementSibling, this)"></i>
        </div>
    </div>
    <div class="mt-5">
        <h2>Password Baru <span class="text-red-500">*</span></h2>
        <div class="relative mt-2 w-full rounded-md focus:outline-none focus:ring-2 focus:border-warna-400">
            <input id="password_baru" name="password_baru" type="password" class="w-full relative rounded-md border border-gray-300">
            <i id="iconTogglePassword" class="fa-regular fa-eye-slash cursor-pointer font-bold absolute right-0 text-gray-400 text-lg bloc w-10 text-center py-3" onclick="togglePassword(this.previousElementSibling, this)"></i>
        </div>
    </div>
    <div class="mt-5">
        <h2>Konfirmasi Password Baru <span class="text-red-500">*</span></h2>
        <div class="relative mt-2 w-full rounded-md focus:outline-none focus:ring-2 focus:border-warna-400">
            <input id="konfirmasi_password" name="password_konfirmasi" type="password" class="w-full relative rounded-md border border-gray-300">
            <i id="iconTogglePassword" class="fa-regular fa-eye-slash cursor-pointer font-bold absolute right-0 text-gray-400 text-lg bloc w-10 text-center py-3" onclick="togglePassword(this.previousElementSibling, this)"></i>
        </div>

    </div>
    <p class="text-sm font-semibold p-2 w-max" id="alertPasswordConfirm"></p>
    </p>
    <div class="mt-9 flex md:justify-end">
        <button class="w-full md:w-[30%] bg-warna-300 hover:bg-warna-400 active:scale-95 transition-all text-white font-roboto font-semibold rounded-md p-2 md:p-3 disabled:opacity-50">Simpan Perubahan</button>
    </div>
</form>

<script>
    document.getElementById('gantiPasswordForm').addEventListener("submit", function(event) {
        event.preventDefault();
        let passwordBaru = document.getElementById('password_baru');
        let passwordKonfirmasi = document.getElementById('konfirmasi_password');
        const alertPasswordConfirm = document.getElementById('alertPasswordConfirm');

        alertPasswordConfirm.innerHTML = "";
        passwordKonfirmasi.classList.replace('border-red-500', 'border-gray-300');

        if (passwordBaru.value !== passwordKonfirmasi.value) {
            alertPasswordConfirm.innerHTML = "Password konfirmasi tidak sama dengan password baru";
            alertPasswordConfirm.classList.add('text-red-500');
            passwordKonfirmasi.classList.replace('border-gray-300', 'border-red-500');
            return false;
        } else {
            this.submit();
        }
    });


    function togglePassword(inputElement, iconElement) {
        const iconTogglePassword = document.querySelector('.iconTogglePassword');
        if (inputElement.type === 'password') {
            inputElement.type = 'text';
            iconElement.classList.replace('fa-eye-slash', 'fa-eye');

        } else {
            inputElement.type = 'password';
            iconElement.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
</script>