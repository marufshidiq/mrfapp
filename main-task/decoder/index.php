<!DOCTYPE html>
<html>
    <head>
        <title>
            Decoder
        </title>
    </head>
    <body>

        <h2>Decoder (Parity Odd, Parity Even, BCC, CRC)</h2>

        <form action="action.php" method="post">
        Bit yang diterima:&nbsp;
        <br>
        <textarea name="bit" id="bit-data" cols="30" rows="10"></textarea>        
        <br><br>
        Jenis:&nbsp;
        <select name="type_generator">
            <option value="parity-odd">Parity Odd</option>
            <option value="parity-even">Parity Even</option>
            <option value="bcc-odd">BCC Odd</option>
            <option value="bcc-even">BCC Even</option>
            <option value="crc">CRC</option>
        </select><br><br>        
        <input type="submit" value="Submit">
        </form> 

    </body>
</html>
