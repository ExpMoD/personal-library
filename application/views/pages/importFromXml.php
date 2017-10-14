<div class="content-block">
    <?= form_open_multipart('importFromXml'); ?>
        <table id="form-load-xml">
            <?php
                if (validation_errors()) {
                    echo "<tr class='errors'>";
                        echo "<td colspan='2' style='font-size: 14px;'>";
                            echo validation_errors();
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td>
                    <label for="xml-file">Xml файл</label>
                </td>
            </tr>
            <tr class="bottom-padding">
                <td>
                    <input id="xml-file" name="xml-file" type="file" class="input-file"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="middle">
                    <input type="submit" value="Импортировать" class="input-button"/>
                </td>
            </tr>
        </table>
    <?= form_close(); ?>
</div>