<!-- Diane -->

<i><b>Messages</b></i>

<!-- En cliquant sur un contact, on ouvre la conversation avec ce contact -->

<table border=1px height=500px>
    <tr>
        <td width="300";>
            <?php include "msg_partieG.php" ?>
            <?php
                echo "<form method='GET' name='form1'>";
                    echo "<input type='text' name='contact' value=''>";
                    echo "<input type='submit' name='submitcontact' value='Rechercher'>";
                echo "</form>";
            ?>
        </td>
        <td width="600";>
            <?php include "page.php" ?>
        </td>
    </tr>
</table>