<div class="content-block">
    <?= form_open_multipart('addBook');?>
        <table id="form-add-book">
            <?php
                if (validation_errors()) {
                    echo "<tr class='errors'>";
                        echo "<td colspan='2'>";
                            echo validation_errors();
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td>
                    <label for="book-name">Название книги</label>
                </td>
                <td>
                    <label for="book-author">Автор</label>
                </td>
            </tr>
            <tr class="bottom-padding">
                <td>
                    <input id="book-name"
                           name="name"
                           type="text"
                           value="<?= set_value('name') ?>"
                           onFocus="this.classList.remove('error-field')"
                           class="input-text <?= (form_error('name') == TRUE)?"error-field":"" ?>"/>
                </td>
                <td>
                    <input id="book-author"
                           name="author"
                           type="text"
                           value="<?= set_value('author') ?>"
                           onFocus="this.classList.remove('error-field')"
                           class="input-text <?= (form_error('author') == TRUE)?"error-field":"" ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="book-date-read">Дата прочтения</label>
                </td>
                <td>
                    <label for="book-cover">Обложка</label>
                </td>
            </tr>
            <tr class="bottom-padding">
                <td>
                    <input id="book-date-read"
                           name="date-read"
                           type="text"
                           value="<?= set_value('date-read') ?>"
                           onFocus="this.classList.remove('error-field')"
                           class="input-text <?= (form_error('date-read') == TRUE)?"error-field":"" ?>"/>
                </td>
                <td>
                    <input id="book-cover"
                           name="cover"
                           type="file"
                           onFocus="this.classList.remove('error-field')"
                           class="input-file <?= (form_error('cover') == TRUE)?"error-field":"" ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="middle">
                    <input type="submit" value="Добавить" class="input-button"/>
                </td>
            </tr>
        </table>
    <?= form_close(); ?>
</div>