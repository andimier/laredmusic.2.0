<ul class="video-entries-wrapper f-box-gallery">
    <?php forEach ($video_entries_group as $video_entry): ?>
        <li class="video-entry">
            <a class="f-box"
                fbox-element-id="<?php echo $video_entry['video_element_id']; ?>"
                video-src="<?php echo $video_entry['video_id']; ?>"
                type="video"
                href="<?php echo $video_entry['thumbnail_url']; ?>"
            >
                <img src="<?php echo $video_entry['thumbnail_url']; ?>" />
                <p class="tik-tok-title"><?php echo $video_entry['title']; ?></p>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
