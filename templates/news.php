<ul>
    <?php for ($i = 0; $i < count($noticias); $i++ ): ?>
        <li class="cnt_noticias">
            <a href="noticia.php?noticia=<?php echo $noticias[$i]['id']; ?>">
                <div class="cnt_imgnoticia">
                    <img src="cms/<?php echo $noticias[$i]['small_image']; ?>"  />
                </div>

                <div class="cnt_noticia">
                    <p><?php echo $noticias[$i]['date']; ?></p>
                    <h2><?php echo $noticias[$i]['title']; ?></h2>
                    <?php echo $noticias[$i]['html_tags']; ?>
                </div>
            </a>
        </li>
    <?php endfor; ?>
</ul>