<ul class="video-entries-wrapper">
    <?php forEach ($video_entries_group as $video_entry): ?>
        <li class="video-entry">
            <!-- <blockquote class="tiktok-embed"
                cite="https://www.tiktok.com/@green.rabbit/video/<?php //echo $video_entry['video']; ?>"
                data-video-id="<?php // echo $video_entry['video']; ?>"
                style="max-width: 605px;min-width: 325px;"
            >
                <section></section>
            </blockquote> -->
            <a href="#">
                <img src="<?php echo $video_entry['thumbnail_url']; ?>" />
                <p><?php echo $video_entry['title']; ?></p>
            </a>
        </li>
    <?php endforeach; ?>
</ul>


<!-- <script async src="https://www.tiktok.com/embed.js"></script> -->
<script async src="js/tiktok.js"></script>
<script>
    document.querySelectorAll("._embed_video_wrapper").foreach(function(el) {
        el.style.maxWidth = '100%';
    })
</script>