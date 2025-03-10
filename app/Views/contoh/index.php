<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="button1();">Button 1</button>
    <hr>
    <input type="text" id="input1" >
    <button onclick="button2();">Button 2</button>
    <hr>
    <button onclick="button3();">Button 3</button>
    <button onclick="gantiwarna();">Ganti warna</button>
    <p id="paragraf1">Ini paragraf</p>
    <hr>
    <h2>Penjumlahan Java Script</h2>
    <input type="number" id="bil1" placeholder="Bilangan 1">
    <input type="number" id="bil2" placeholder="Bilangan 2">
    <button onclick="jumlah();">Jumlah</button>
    <input type="text" id="hasil" readonly value="0">
    <hr>
    <h2>Penjumlahan PHP</h2>
    <form action="<?php echo base_url('contohajax/jumlah') ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="number" name="bil1_php" placeholder="Bilangan 1">
        <input type="number" name="bil2_php" placeholder="Bilangan 2">
        <button type="submit">Jumlah</button>
        <input type="text" readonly value="<?php echo $hasil; ?>">
    </form>

    <hr>
    <h2>Contoh Ajax GET</h2>
    <input type="number" id="bil11" placeholder="Bilangan 1">
    <input type="number" id="bil22" placeholder="Bilangan 2">
    <button onclick="contoh_ajax_get();">Jumlah</button>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script>

        function contoh_ajax_get() {
            var bil1 = document.getElementById('bil11').value;
            var bil2 = document.getElementById('bil22').value;
            console.log(bil1);
            console.log(bil2);
            $.ajax({
                url: '<?php echo base_url('contohajax/ajax_get') ?>',
                type: 'get',
                data: { bil1: bil1, bil2: bil2 },
                dataType: "text",
                success: function(response) {
                    alert('Hasil: ' + response);
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan: " + error);
                }
            });
        }

        function gantiwarna() {
            document.getElementById('paragraf1').style.color = 'red';
        }
        
        function jumlah() {
            var bil1 = document.getElementById('bil1').value;
            var bil2 = document.getElementById('bil2').value;
            var hasil = parseInt(bil1) + parseInt(bil2);
            document.getElementById('hasil').value = hasil;
        }

        function button1() {
            alert('Button 1');
        }

        function button2() {
            var input1 = document.getElementById('input1').value;
            alert(input1);
        }

        function button3() {
            document.getElementById('paragraf1').innerHTML = 'Ini paragraf yang baru';
        }

        

    </script>
</body>
</html>