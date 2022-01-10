<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Kayıt</title>

    <style>
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

    <form method="POST" action="<?php echo e(route('signUp.post')); ?>">

        <!--token eşleşirse post işlemine izin veriyor.-->
        <?php echo csrf_field(); ?>

        <h2 align="center">ÖĞRENCİ KAYIT</h2>

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
                <td> Şifre: </td>
                <td> <input type="password" name="password" /></td>
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
                <td> Fakülte seçiniz: </td>
                <td><select name="fakulte" id="fakulteler">
                <?php $__currentLoopData = $fakulteler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fakulte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option id="option" value="<?php echo e($fakulte['id']); ?>" selected="selected"><?php echo e($fakulte['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select></td>
            </tr>

            <tr>
                <td> Bölüm seçiniz: </td>
                <td><select name="bolum" id="bolumler">
                <?php $__currentLoopData = $bolumler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bolum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($bolum['fak_id']); ?><?php echo e($bolum['id']); ?>"><?php echo e($bolum['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select></td>
            </tr>

            <tr>
                <td> Adres: </td>
                <td> <textarea type="text" name="adres" value="<?php echo e(old('adres')); ?>"></textarea></td>
            </tr>

            <tr>
                <td> &nbsp; </td>
                <td>
                    <button type="submit" align="center">Kayıt Ol</button>
                </td>
            </tr>

        </table>
    </form>

    <!--<option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>-->

</body>

</html><?php /**PATH C:\xampp\htdocs\student_system\resources\views/login_pages/student_signUp.blade.php ENDPATH**/ ?>