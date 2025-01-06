<div class="w-full bg-warna-300 py-24 lg:h-96 flex flex-col justify-center items-center text-white pt-20">
    <p class="font-medium text-2xl">Katalog Kelas</p>
    <h1 class="text-center font-roboto text-3xl lg:text-4xl font-semibold mt-3 mb-5">Mulai Belajar Di Syntax Academy</h1>
    <p class=" text-center px-4 md:w-[70%] lg:w-[40%] lg:text-lg">Syntax Academy menyediakan berbagai kelas bahasa pemrograman untuk meningkatkan kemampuan ngodingmu.</p>
</div>

<div class="px-4 md:w-[70%] lg:w-[55%] xl:w-[40%] mx-auto flex flex-col justify-center items-center mt-10">
    <div class="relative mt-2 w-full h-max rounded-md focus:outline-none focus:ring-2 focus:border-warna-400">
        <input id="searchInput" name="keyword" type="text" class="w-full relative rounded-md border border-gray-400 text-lg" placeholder="Cari Nama Kelas">
        <button><i class="fa-solid fa-magnifying-glass absolute right-0 top-0 text-gray-400 text-lg block text-center py-3 px-4 hover:text-warna-400 active:scale-95 transition-all"></i></button>
    </div>
</div>

<div class="max-w-screen-xl mx-auto px-4 flex gap-5 mt-3 lg:mt-5">
    <div class="hidden lg:block lg:w-[30%] h-max p-4">
        <h2 class="font-medium text-2xl">Filter</h2>
        <button id="dropdownButton" class="p-2 flex w-full items-center justify-between text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <div>
                <span class="flex-1 whitespace-nowrap font-medium">Level</span>
            </div>
            <i class="fa-solid fa-angle-down"></i>
        </button>

        <div id="dropdownContent" class="hidden w-full flex-row">
            <div class="flex items-center gap-2 p-2">
                <input type="checkbox" name="level" id="mudah" value="mudah" class="rounded-sm text-warna-300 focus:ring-warna-300">
                <label for="mudah">Mudah</label>
            </div>
            <div class="flex items-center gap-2 p-2">
                <input type="checkbox" name="level" id="menengah" value="menengah" class="rounded-sm text-warna-300 focus:ring-warna-300">
                <label for="menengah">Menengah</label>
            </div>
            <div class="flex items-center gap-2 p-2">
                <input type="checkbox" name="level" id="sulit" class="rounded-sm text-warna-300 focus:ring-warna-300">
                <label for="sulit">Sulit</label>
            </div>
        </div>

    </div>
    <div class="w-full lg:w-[70%] lg:p-4">
        <div class="flex flex-col">
            <h2 class="font-medium text-2xl">Semua Kelas</h2>
            <div id="resultsContainer" class="grid xs:grid-cols-2 md:grid-cols-3 max-w-screen-xl mx-auto mt-4 gap-3 lg:gap-4">
                <?php foreach ($kursus as $k): ?>
                    <a href="<?php echo base_url('elearning/detail/' . $k->id_kursus) ?>" class="w-full max-w-72 aspect-[5/4] xs:aspect-[5/6] border shadow-md rounded-lg active:scale-95 transition-all overflow-hidden hover:ring hover:ring-warna-300">
                        <img src="<?php echo $k->image_url ?>" alt="kursus_image" class="h-[55%] md:h-[45%] w-full object-cover bg-gray-300">
                        <div class="h-[45%] md:h-[55%] p-3 md:p-4 flex flex-col justify-between">
                            <h2 class="font-roboto font-medium"><?php echo $k->judul ?></h2>
                            <div class="">
                                <div class="flex justify-between text-sm">
                                    <p><?php echo $k->level ?></p>
                                    <p><?php echo $k->jumlah_materi ?> Materi</p>
                                </div>
                                <button class="hidden md:block mt-4 text-center w-full bg-warna-300 text-white py-2 rounded-md active:scale-95 transition-all">
                                    Mulai Belajar
                                </button>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="mt-10 lg:mt-16 px-4 md:px-6 lg:px-32 xl:px-36 py-14 border-t-2 border-gray-200 flex flex-col md:flex-row justify-center md:justify-between lg:justify-start items-center md:items-start">
    <a href="<?php echo base_url("/"); ?>" class="h-max md:w-[40%] mb-8">
        <img src="<?php echo base_url('assets/img/SA_Logo3.png'); ?>" alt="logo" class="w-38">
    </a>
    <div class="flex flex-col items-center md:items-start md:w-44 lg:w-52">
        <h2 class="text-xl font-semibold tracking-wide">Layanan</h2>
        <div class="mt-3 flex flex-col items-center md:items-start gap-2 lg:text-lg">
            <a href="<?php echo base_url("elearning"); ?>" class="hover:text-warna-400">E-Learning</a>
            <a href="<?php echo base_url("pricing"); ?>" class="hover:text-warna-400">Paket</a>
            <a href="<?php echo base_url("contact"); ?>" class="hover:text-warna-400">FAQs</a>
        </div>
    </div>
    <div class="mt-7 md:mt-0 flex flex-col items-center md:items-start md:w-44 lg:w-52">
        <h2 class="text-xl font-semibold tracking-wide">Dukungan</h2>
        <a href="<?php echo base_url("contact"); ?>" class="mt-3 hover:text-warna-400">Tentang Syntax Academy</a>
    </div>
</div>
<p class="text-center text-xs lg:text-sm py-2 lg:py-4">&copy; 2025 Syntax Academy</p>


<script>
    document.getElementById('dropdownButton').addEventListener('click', function() {
        var dropdownContent = document.getElementById('dropdownContent');
        dropdownContent.classList.toggle('hidden');
    });
</script>

<script>
    const checkboxes = document.querySelectorAll('input[name="level"]');
    const courseContainer = document.querySelector('.grid'); // Container kursus

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', async () => {
            // Ambil level yang dipilih
            const selectedLevels = Array.from(checkboxes)
                .filter((checkbox) => checkbox.checked)
                .map((checkbox) => checkbox.id);

            // Kirim request ke server
            const response = await fetch(`<?php echo base_url('elearning/filter') ?>?level=${selectedLevels.join(',')}`);
            const courses = await response.json();
            console.log(courses);
            // Update tampilan kursus
            courseContainer.innerHTML = ''; // Hapus konten sebelumnya
            courses.forEach((course) => {
                const courseHTML = `
                    <a href="<?php echo base_url('elearning/detail/') ?>${course.id_kursus}" class="w-full max-w-72 aspect-[5/4] xs:aspect-[5/6] border shadow-md rounded-lg active:scale-95 transition-all overflow-hidden hover:ring hover:ring-warna-300">
                        <img src="${course.image_url}" alt="kursus_image" class="h-[55%] md:h-[45%] w-full object-cover bg-gray-300">
                        <div class="h-[45%] md:h-[55%] p-3 md:p-4 flex flex-col justify-between">
                            <h2 class="font-roboto font-medium">${course.judul}</h2>
                            <div class="">
                                <div class="flex justify-between text-sm">
                                    <p>${course.level}</p>
                                    <p>${course.jumlah_materi} Materi</p>
                                </div>
                                <button class="hidden md:block mt-4 text-center w-full bg-warna-300 text-white py-2 rounded-md active:scale-95 transition-all">
                                    Mulai Belajar
                                </button>
                            </div>
                        </div>
                    </a>`;
                courseContainer.innerHTML += courseHTML;
            });
        });
    });

    document.getElementById('searchInput').addEventListener('input', function() {
        var keyword = this.value; // Ambil nilai input pencarian

        // Lakukan request ke server untuk mendapatkan hasil pencarian
        fetch(`<?php echo base_url("/elearning/search"); ?>?keyword=${keyword}`)
            .then(response => response.json())
            .then(data => {
                // Tampilkan hasil pencarian di halaman
                const resultsContainer = document.getElementById('resultsContainer');
                resultsContainer.innerHTML = ''; // Clear previous results

                if (data.length > 0) {
                    data.forEach(kursus => {
                        const kursusCard = `
                        <a href="<?php echo base_url('elearning/detail/') ?>${kursus.id_kursus}" class="w-full max-w-72 aspect-[5/4] xs:aspect-[5/6] border shadow-md rounded-lg active:scale-95 transition-all overflow-hidden hover:ring hover:ring-warna-300">
                            <img src="${kursus.image_url}" alt="kursus_image" class="h-[55%] md:h-[45%] w-full object-cover bg-gray-300">
                            <div class="h-[45%] md:h-[55%] p-3 md:p-4 flex flex-col justify-between">
                                <h2 class="font-roboto font-medium">${kursus.judul}</h2>
                                <div class="">
                                    <div class="flex justify-between text-sm">
                                        <p>${kursus.level}</p>
                                        <p>${kursus.jumlah_materi} Materi</p>
                                    </div>
                                    <button class="hidden md:block mt-4 text-center w-full bg-warna-300 text-white py-2 rounded-md active:scale-95 transition-all">
                                        Mulai Belajar
                                    </button>
                                </div>
                            </div>
                        </a>`;
                        resultsContainer.innerHTML += kursusCard;
                    });
                } else {
                    resultsContainer.innerHTML = '<p>Nama kelas yang anda cari tidak ada</p>';
                }
            });
    });
</script>