<h1>Demo Custom PHP Framework</h1>
<div>Outputting a list of data</div>
<ul>
    <?php
    foreach ($rows as $row): ?>
        <li><?= $row ?></li>
    <?php
    endforeach ?>
</ul>