<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YAZ OKULU</title>

    <style>
        a {
            text-decoration: none;
            color: burlywood;
        }

        table{
            border: 0;
        }

        form{
            margin-top: 50px;
            align-content: center;
        }
        h2{
            color: brown;
        }
    </style>


</head>

<body>
    <form method="POST" action="<?php echo e(route('yaz_okulu.post')); ?>">

        <!--token eşleşirse post işlemine izin veriyor.-->
        <?php echo csrf_field(); ?>

        <h2 align="center">YAZ OKULU BAŞVURU</h2>

        <table align="center">

            <tr>
                <td colspan="2">
                    <div style="background-color: red">

                        <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </td>
            </tr>

            <tr>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> Ad: </td>
                <td> <input type="text" name="name" value="<?php echo e(old('name')); ?>" /></td>
            </tr>

            <tr>
                <td> Soyad: </td>
                <td> <input type="text" name="surname" value="<?php echo e(old('surname')); ?>" /></td>
            </tr>

            <tr>
                <td> Email: </td>
                <td><input type="mail" name="email" value="<?php echo e(old('email')); ?>" /></td>
            </tr>

            <tr>
                <td> Öğrenci No: </td>
                <td><input type="number" name="ogrenciNo" value="<?php echo e(old('ogrenciNo')); ?>" /></td>
            </tr>

            <tr>
                <td> Telefon: </td>
                <td><input type="tel" name="telefon" value="<?php echo e(old('telefon')); ?>" /></td>
            </tr>

            <tr>
                <td> TC Kimlik No: </td>
                <td><input type="number" name="tc" value="<?php echo e(old('tc')); ?>" /></td>
            </tr>

            <tr>
                <td> Doğum Tarihi: </td>
                <td> <input type="date" name="dogumTarihi" value="<?php echo e(old('dogumTarihi')); ?>"></input></td>
            </tr>

            <tr>
                <td> Üniversite: </td>
                <td><select name="universite" id="universiteler">
                        <option id="option" value="1" selected="selected">Kocaeli Üniversitesi</option>
                    </select></td>
            </tr>

            <tr>
                <td> Sınıf seçiniz: </td>
                <td><select name="sinif" id="siniflar">
                <option id="option" value="1" selected="selected">1. sınıf</option>
                <option id="option" value="2" selected="selected">2. sınıf</option>
                <option id="option" value="3" selected="selected">3. sınıf</option>
                <option id="option" value="4" selected="selected">4. sınıf</option>
            </select></td>
            </tr>

            <tr>
                <td> Adres: </td>
                <td> <textarea type="text" name="adres" value="<?php echo e(old('adres')); ?>"></textarea></td>
            </tr>

            <tr>
                <td> &nbsp; </td>
                <td>
                    <button type="submit" align="center">GÖNDER</button>
                </td>
            </tr>

        </table>
    </form>

</body>

</html><?php /**PATH C:\xampp\htdocs\student_system\resources\views/student_pages/yaz_okulu.blade.php ENDPATH**/ ?>