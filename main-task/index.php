<!DOCTYPE html>
<html>
    <head>
        <title>
            Generator
        </title>
    </head>
    <body>

        <h2>Generator (Parity Odd, Parity Even, BCC, CRC)</h2>

        <form action="action.php" method="post">
        Data yang akan dikirim:&nbsp;
        <input type="text" name="data" >
        <br><br>
        Jenis:&nbsp;
        <select name="type_generator">
            <option value="odd">Parity Odd</option>
            <option value="even">Parity Even</option>
            <option value="bcc">BCC</option>
            <option value="crc">CRC</option>
        </select><br><br>        
        <input type="submit" value="Submit">
        </form> 

    </body>
</html>
