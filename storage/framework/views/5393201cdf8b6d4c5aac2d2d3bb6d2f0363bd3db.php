<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çap Başvuruları</title>

    <style>
        #profile-div {
            width: 100px;
            text-align: center;
            background-color: brown;
        }
        td{
            padding: 5px;
        }
        #baslikTd{
            text-align: center;
        }
    </style>

</head>

<body>

    <table border="1">

        <tr>
            <td id="baslikTd"><b>AD</b></td>
            <td id="baslikTd"><b>SOYAD</b></td>
            <td id="baslikTd"><b>TC</b></td>
            <td id="baslikTd"><b>ÖĞRENCİ NO</b></td>
            <td id="baslikTd"><b>KATEGORİ</b></td>
        </tr>

        <?php $__currentLoopData = $basvurular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basvuru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($basvuru['name']); ?></td>
            <td><?php echo e($basvuru['surname']); ?></td>
            <td><?php echo e($basvuru['tc']); ?></td>
            <td><?php echo e($basvuru['ogrenciNo']); ?></td>
            <td><?php if($basvuru['durum'] == 0): ?> Beklemede
            <?php elseif($basvuru['durum'] == 1): ?> Kabul
            <?php elseif($basvuru['durum'] == 2): ?> Red
            <?php endif; ?></td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</body>

</html><?php /**PATH C:\xampp\htdocs\student_system\resources\views/admin_pages/cap.blade.php ENDPATH**/ ?>