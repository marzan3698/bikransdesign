<!-- ── Pagination Controls ─────────────────────────────────────── -->
<?php if ($totalPages > 1): ?>
    <div style="display:flex; justify-content:center; align-items:center; gap:6px; padding:16px 0; flex-wrap:wrap;">

        <!-- Previous button -->
        <?php if ($currentPage > 1): ?>
            <a href="<?= $baseUrl ?>page=<?= $currentPage - 1 ?>"
                style="padding:6px 14px; background:#00CC99; color:#fff; border-radius:4px; text-decoration:none; font-size:14px;">
                &laquo; আগে
            </a>
        <?php else: ?>
            <span style="padding:6px 14px; background:#ccc; color:#fff; border-radius:4px; font-size:14px; cursor:not-allowed;">
                &laquo; আগে
            </span>
        <?php endif; ?>

        <!-- Page number buttons -->
        <?php
        $startPage = max(1, $currentPage - 2);
        $endPage   = min($totalPages, $currentPage + 2);

        if ($startPage > 1): ?>
            <a href="<?= $baseUrl ?>page=1"
                style="padding:6px 12px; background:#f0f0f0; color:#333; border-radius:4px; text-decoration:none; font-size:14px;">1</a>
            <?php if ($startPage > 2): ?>
                <span style="padding:6px 4px; font-size:14px;color:#fff !important">…</span>
            <?php endif;
        endif;

        for ($i = $startPage; $i <= $endPage; $i++):
            $isActive = ($i === $currentPage);
            ?>
            <a href="<?= $baseUrl ?>page=<?= $i ?>"
                style="padding:6px 12px;
                                    background:<?= $isActive ? '#00CC99' : '#f0f0f0' ?>;
                                    color:<?= $isActive ? '#fff' : '#333' ?>;
                                    border-radius:4px;
                                    text-decoration:none;
                                    font-size:14px;
                                    font-weight:<?= $isActive ? 'bold' : 'normal' ?>;">
                <?= $i ?>
            </a>
            <?php endfor;

        if ($endPage < $totalPages):
            if ($endPage < $totalPages - 1): ?>
                <span style="padding:6px 4px; font-size:14px;color:#fff !important">…</span>
            <?php endif; ?>
            <a href="<?= $baseUrl ?>page=<?= $totalPages ?>"
                style="padding:6px 12px; background:#f0f0f0; color:#333; border-radius:4px; text-decoration:none; font-size:14px;">
                <?= $totalPages ?>
            </a>
        <?php endif; ?>

        <!-- Next button -->
        <?php if ($currentPage < $totalPages): ?>
            <a href="<?= $baseUrl ?>page=<?= $currentPage + 1 ?>"
                style="padding:6px 14px; background:#00CC99; color:#fff; border-radius:4px; text-decoration:none; font-size:14px;">
                পরে &raquo;
            </a>
        <?php else: ?>
            <span style="padding:6px 14px; background:#ccc; color:#fff; border-radius:4px; font-size:14px; cursor:not-allowed;">
                পরে &raquo;
            </span>
        <?php endif; ?>

    </div>
<?php endif; ?>