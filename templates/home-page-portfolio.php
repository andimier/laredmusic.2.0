<a href="portafolio.php">
    <h2 class="section-title sub-title">PORTAFOLIO<h2>
</a>

<div class="cnt_logos">
    <ul id="list-portafolio">
        <?php for ($pf = 0; $pf < count($portfolio_data); $pf++): ?>
            <li class="artist-album-image" data-artist="<?php echo $portfolio_data[$pf]['cliente']; ?>">
                <a href="portafolio.php">
                    <img
                        src="<?php echo $portfolio_data[$pf]['src']; ?>"
                        alt="<?php echo $portfolio_data[$pf]['alt']; ?>"
                    />
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<div class="vacio"></div>