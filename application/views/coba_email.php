<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo base_url('coba_email/send_email'); ?>">
        <table>
            <!-- <tr>
                <td>Email</td>
                <td></td>
                <td><input type="text" name="email" placeholder="Email Anda"></td>
            </tr>
            <tr>
                <td>Subject</td>
                <td></td>
                <td><input type="text" name="subject" placeholder="Subject Email"></td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td></td>
                <td><input type="text" name="pesan" placeholder="Pesan"></td>
            </tr> -->
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit_email" placeholder="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>