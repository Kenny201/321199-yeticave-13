<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и
        горнолыжное снаряжение.
    </p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach ($categories as $category): ?>
            <li class="promo__item promo__item--<?=$category['code']?>">
                <a class="promo__link" href="pages/all-lots.html"><?=xssAdg($category['title'])?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach ($lots as $lot): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$lot['img']?>"
                         width="350" height="260" alt="Картинка лота">
                </div>
                <div class="lot__info">
                    <span class="lot__category">
                            <?=xssAdg($lot['category_title'])?>
                    </span>
                    <h3 class="lot__title">
                        <a class="text-link" href="<?='lot.php?id=' . $lot['id']?>">
                            <?=xssAdg($lot['title'])?>
                        </a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">
                                Стартовая цена
                            </span>
                            <span class="lot__cost">
                                <?=formatSumm($lot['start_price'])?>
                            </span>
                        </div>
                        <?php
                        $range = formatTime($lot['completed_at']);
                        if ($range['hours'] == 0 && $range['minutes'] <= 60): ?>
                        <div class="lot__timer timer timer--finishing">
                            <?php else: ?>
                            <div class="lot__timer timer">
                                <?php endif ?>
                                <?=$range['hours'] . ':' . $range['minutes']?>
                            </div>
                        </div>
                    </div>
            </li>
        <?php endforeach ?>
    </ul>
</section>
