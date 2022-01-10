<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>

    <style>
        #category-div{
            text-align: center;
            margin-top: 50px;
        }

        #profile-div{
            width: 100px;
            text-align: center;
            background-color: brown;
        }

        a{
            text-decoration: none;
            color: burlywood;
        }

    
    </style>
</head>
<body>

    <br /><br />
    <div id="profile-div">
    <b><a href="<?php echo e(route('profile')); ?>">PROFİL</p></b>
    </div>

    <br /><br />
    <div id="profile-div">
    <b><a href="<?php echo e(route('basvurularim')); ?>">BAŞVURULARIM</p></b>
    </div>

    <br /><br />

    <div id="category-div">
    <p><a href="<?php echo e(route('yaz_okulu_gecis')); ?>"><button type="button">Yaz Okulu</button></a></p>
    <p><a href="<?php echo e(route('yatay_gecis_gecis')); ?>"><button type="button">Yatay Geçiş</button></a></p>
    <p><a href="<?php echo e(route('dgs_gecis')); ?>"><button type="button">DGS Başvurusu</button></a></p>
    <p><a href="<?php echo e(route('cap_gecis')); ?>"><button type="button">ÇAP Başvurusu</button></a></p>
    <p><a href="<?php echo e(route('ders_intibak_gecis')); ?>"><button type="button">Ders İntibakı Başvurusu</button></a></p>
    </div>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\student_system\resources\views/student_pages/main.blade.php ENDPATH**/ ?>