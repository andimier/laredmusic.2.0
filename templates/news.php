<ul>
    <?php for ($i = 0; $i < count($noticias); $i++ ): ?>
        <li class="news-wrapper">
            <div class="news-main-image">
                <a href="noticia.php?noticia=<?php echo $noticias[$i]['id']; ?>">
                    <img src="cms/<?php echo $noticias[$i]['small_image']; ?>"  />
                </a>
            </div>

            <div class="news-text-wrapper">
                <a href="noticia.php?noticia=<?php echo $noticias[$i]['id']; ?>">
                    <p><?php echo $noticias[$i]['date']; ?></p>
                    <h2><?php echo $noticias[$i]['title']; ?></h2>
                    <?php echo $noticias[$i]['html_tags']; ?>
                </a>
            </div>
        </li>
    <?php endfor; ?>
</ul>