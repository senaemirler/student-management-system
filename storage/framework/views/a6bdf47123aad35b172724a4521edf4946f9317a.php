<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Giriş</title>

    <style>
        #kayit-ol-div {

            text-align: center;
            background-color: brown;
        }

        a {
            text-decoration: none;
            color: burlywood;
        }

        table{
            border: 0;
        }

        form{
            margin-top: 150px;
            align-content: center;
        }
        h2{
            color: brown;
        }
    </style>

</head>

<body>

    <form method="POST" action="<?php echo e(route('login.post')); ?>">

        <!--token eşleşirse post işlemine izin veriyor.-->
        <?php echo csrf_field(); ?>

        <h2 align="center">ÖĞRENCİ GİRİŞİ</h2>

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
                <td> Email: </td>
                <td><input type="mail" name="email" value="<?php echo e(old('email')); ?>" /></td>
            </tr>

            <tr>
                <td> Şifre: </td>
                <td> <input type="password" name="password" /></td>
            </tr>

            <tr>
                <td> &nbsp; </td>
                <td>
                    <button type="submit" aign=center>Giriş Yap</button>
                </td>
            </tr>

            <tr>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="1">
                    <div id="kayit-ol-div">
                        <b><a href="<?php echo e(route('signUp')); ?>">KAYIT OL</p></b>
                    </div>
                </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="1">
                    <div id="kayit-ol-div">
                        <b><a href="<?php echo e(route('login.admin')); ?>">ADMİN GİRİŞ</p></b>
                    </div>
                </td>
            </tr>

        </table>
    </form>

</body>

</html><?php /**PATH C:\xampp\htdocs\student_system\resources\views/login_pages/student_login.blade.php ENDPATH**/ ?>