<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receiver - Komunikasi Data</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <form action="action.php" method="post">
        <h1 style="margin-top:20px;">Receiver</h1>
        <fieldset>
            <legend><span class="number">1</span> Masukkan data yang diterima</legend>
            <label for="bit">Bit:</label>
            <textarea id="bit" name="bit" oninput="removeTextAreaWhiteSpace();"></textarea>
        </fieldset>

        <fieldset>
            <legend><span class="number">2</span> Pilih jenis generator yang digunakan</legend>
            <label for="type_generator">Generator</label>
            <select id="type_generator" name="type_generator">
                <optgroup label="Parity">
                    <option value="parity-odd">Odd</option>
                    <option value="parity-even">Even</option>
                </optgroup>
                <optgroup label="BCC">
                    <option value="bcc-odd">Odd</option>
                    <option value="bcc-even">Even</option>
                </optgroup>
                <optgroup label="CRC">
                    <option value="crc">CRC - 110101</option>
                </optgroup>
            </select>
        </fieldset>

        <button type="submit">Encode</button>
    </form>
    <script>
        function removeTextAreaWhiteSpace() {
            console.log("Halo");
            var bitTextArea = document.getElementById('bit');
            bitTextArea.value = bitTextArea.value.replace(/\t/g, '');
        }
    </script>
</body>

</html>