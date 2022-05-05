<?php $currentPageID = get_queried_object_id() ?>

<header class="header">
    <?php $logo = get_fields('option')['logo'] ?>
    <a href="/" class="header__logo">
        <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"/>
    </a>
    <nav class="navbar">
        <?php $navLinks = get_fields('option')['links'] ?>
        <ul class="navbar__menu">
        <?php foreach($navLinks as $navLink) : ?>
            <?php $childPages = new ChildPages($navLink->ID) ?>
            <?php $childs = $childPages->getChilds() ?>
            <?php if($childs) : ?>
                <?php $isActive = $currentPageID == $navLink->ID ? ' active' : '' ?>
                <?php foreach($childs as $child) : ?>
                    <?php if(!$isActive) : ?>
                        <?php $isActive = $currentPageID == $child->ID ? ' active' : '' ?>
                    <?php endif ?>
                <?php endforeach ?>
                <li class="navbar__link<?= $isActive ?>">
                    <a class="t-p2" href="<?= get_permalink($navLink->ID) ?>"><?= $navLink->post_title ?><img class="svg-replace" src="arrow_down.svg" /></a>
                    <ul class="submenu">
                    <?php foreach($childs as $child) : ?>
                        <li class="submenu__link"><a class="t-p2" href="<?= get_permalink($child->ID) ?>"><?= $child->post_title ?></a></li>
                    <?php endforeach ?>
                    </ul>
                </li>
            <?php else : ?>
                <li class="navbar__link<?= $currentPageID == $navLink->ID ? ' active' : '' ?>"><a class="t-p2" href="<?= get_permalink($navLink->ID) ?>"><?= $navLink->post_title ?></a></li>
            <?php endif ?>
        <?php endforeach ?>
        </ul>
    </nav>
</header>