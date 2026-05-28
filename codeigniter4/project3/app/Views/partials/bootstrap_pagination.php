<?php

use CodeIgniter\Pager\PagerRenderer;

$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination pagination-lg justify-content-center mb-0">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link rounded-start-pill" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link rounded-end-pill" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true">&raquo;&raquo;</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>

<style>
    .page-item.active .page-link {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        border-color: transparent;
    }
    .page-link {
        color: #6366f1;
        border: none;
        padding: 0.75rem 1rem;
        margin: 0 0.15rem;
        border-radius: 0.5rem !important;
        transition: all 0.2s;
        font-weight: 600;
    }
    .page-link:hover {
        background: rgba(99, 102, 241, 0.1);
        color: #4f46e5;
        transform: translateY(-2px);
    }
    .page-item.active .page-link:hover {
        transform: translateY(-2px);
    }
</style>
