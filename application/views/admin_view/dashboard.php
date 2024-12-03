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
        <h1 class="text-xl md:text-2xl lg:text-3xl text-center font-exo2 font-semibold mb-1">Dashboard</h1>
        <p>Selamat datang <?php echo $this->session->userdata('nama'); ?></p>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>