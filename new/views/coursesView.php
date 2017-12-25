<div style = "float:left; width:20%;">

    <div id='course'>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Courses</th>
                </tr>

                <?php foreach ($rows as $row) { ?>

                <tr>
                    <td>
                        <?= $row->id ?>
                    </td>
                    <td>
                        <button class='course' name='course' onclick='ajax(this)'>
                            <?= $row->name ?>
                        </button>
                    </td>  
                </tr>

                <?php } ?>
            </table>
    </div>
</div>