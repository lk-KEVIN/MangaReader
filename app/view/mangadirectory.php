<?php if (page()->input->hasGet('search')): ?>
<div class="panel single">
    <div class="warp">
        <h2>Search Result for "<?php echo page()->input->get('search'); ?>"</h2>
    </div>
</div>
<?php endif; ?>

<div class="clearfix">
    <?php while ($row = $mangalist->row()): ?>
    <?php $histCount = page()->manga->getHistoryCount(page()->auth->getUserId(),
        $row->id); ?>
    <div class="panel card <?php echo ($row->cnt == $histCount) ? 'faded' : ''; ?>">
        <a href="<?php echo baseUrl(); ?>manga/<?php echo $row->friendly_name; ?>">
            <div>
                <?php $res = page()->manga->getImage($row->id); ?>
                <img src="<?php echo page()->image->getContentCrop($mangapath . '/' .
                    $res->first()->manga_name . '/' .
                    $res->first()->chapter_name . '/' .
                    $res->first()->name, 208,208); ?>" />
            </div>
            <div class="warp">
                <b><?php echo $row->name; ?></b>
            </div>
            <div class="warp">
                <?php $this->view('MangaTag', ['manga'=>$row]); ?>
            </div>
            <div class="warp">
                <div>
                    Chapters: <?php echo $row->cnt; ?>
                </div>
                <div>
                    Views: <?php echo $row->views; ?>
                </div>
                <div class="desc">
                    <?php echo page()->date->relative($row->update_at); ?>
                </div>
            </div>
        </a>
    </div>
    <?php endwhile; ?>
</div>

<?php if (page()->input->hasGet('search') && $mangaCount === 0): ?>
    <div class="panel single">
        <div class="warp">
            No manga called "<?php echo page()->input->get('search'); ?>" is found
        </div>
    </div>
<?php endif; ?>

<div class="warp clearfix">
    <?php foreach ($page as $p): ?>
        <div class="panel page">
            <?php if ($p[0]==$curpage): ?>
                <b class="empty">
            <?php elseif ($p[0] != '...'): ?>
                <a href="<?php echo baseUrl(). page()->router->class . '/' .
                    page()->router->method . "/page/$p[1]".
                    (page()->input->hasGet('search')?'?search='.page()->input->get('search'):''); ?>">
            <?php else: ?>
                <span class="empty">
            <?php endif; ?>

            <?php echo $p[0]; ?>

            <?php if ($p[0]==$curpage): ?>
                </b>
            <?php elseif ($p[0] != '...'): ?>
                </a>
            <?php else: ?>
                </span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>