<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial Sederhana Parsing Harga Pengiriman JNE - Adiputra</title>
</head>
<body>
    <center>
        <h1>Cek Harga</h1>
        <form action='<?php echo site_url()?>cart/jne' method='post'>
            <table border='1'>
                <tr>
                    <th colspan='2'>Demo Parsing Harga Pengiriman JNE</th>
                <tr>
                    <td>Masukan Kota Asal Pengiriman</td>
                    <td><input type='text' name='kota_asal' size='20'></td>
                </tr>
                <tr>
                    <td>Masukan Kota Tujuan Pengiriman</td>
                    <td><input type='text' name='kota_tujuan' size='20'></td>
                </tr>
                <tr>
                    <td>Masukan berat barang [integer]</td>
                    <td><input type='text' name='berat' size='5'> per kilo</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='lihat' value='Cek Harga'></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>