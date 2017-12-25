<div style = "float:left; width:20%;">

    <div id='student'>
    <table>
        <tr>
            <th>Id</th>
            <th>Students</th>
        </tr>

        <?php 
        foreach ($rows as $row) { ?>

        <tr>
            <td>
                <?= $row->id ?>
            </td>
            <td>
                <button class='student' name='student' onclick='loadStudent(<?= $row->id ?>)'>
                    <?= $row->name ?>
                </button>
            </td>  
        </tr>

        <?php } ?>
    </table>
    </div>

</div>