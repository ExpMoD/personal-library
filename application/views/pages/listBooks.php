<div class="content-block">
    <?php if (! empty($listBooks)): ?>
        <div id="list-books">

            <?php foreach ($listBooks as $book): ?>
                <?php
                    $book['date-read'] = date("d.m.Y", strtotime($book['date-read']));
                ?>
                <div class="block-book">
                    <div class="block-book-img" title="Была прочитана: <?= $book['date-read'] ?>">
                        <img src="<?= (file_exists($book['cover-path']))?base_url($book['cover-path']):base_url('assets/img/no-image.jpg')?>"/>
                    </div>
                    <div class="block-book-author" title="<?= $book['author'] ?>"><?= $book['author'] ?></div>
                    <div class="block-book-name" title="<?= $book['name'] ?>"><?= $book['name'] ?></div>
                </div>
            <?php endforeach; ?>

        </div>
    <?php else: ?>
        <div style="text-align: center; font-size: 18px;">
            В библиотеке нет ни одной книги!
        </div>
    <?php endif; ?>
</div>