<button id="open-repo-modal" class="open-modal">View GitHub Repositories</button>

<div id="github-repo-modal" class="github-repo-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <?php echo do_shortcode('[github_repo_slider]'); ?>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {
        $("#open-repo-modal").on("click", function () {
            $("#github-repo-modal").fadeIn();
        });

        $(".close-modal").on("click", function () {
            $("#github-repo-modal").fadeOut();
        });
    });
</script>
