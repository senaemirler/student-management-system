<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>

</head>
<body>

    <div id="category-div">
    <p><a href="<?php echo e(route('yaz_okulu_admin')); ?>"><button type="button">Yaz Okulu</button></a></p>
    <p><a href="<?php echo e(route('yatay_gecis_admin')); ?>"><button type="button">Yatay Geçiş</button></a></p>
    <p><a href="<?php echo e(route('dgs_admin')); ?>"><button type="button">DGS Başvurusu</button></a></p>
    <p><a href="<?php echo e(route('cap_admin')); ?>"><button type="button">ÇAP Başvurusu</button></a></p>
    <p><a href="<?php echo e(route('ders_intibak_admin')); ?>"><button type="button">Ders İntibakı Başvurusu</button></a></p>
    </div>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\student_system\resources\views/admin_pages/main.blade.php ENDPATH**/ ?>