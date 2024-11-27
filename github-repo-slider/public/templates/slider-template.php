<div class="github-repo-slider">
    <?php
    $repos = get_option('github_repo_slider_repos', '[]');
    $repos = json_decode($repos, true);

    if (!empty($repos)) {
        foreach ($repos as $repo) {
            echo '<div class="slider-tile">';
            echo '<h3>' . esc_html($repo['title']) . '</h3>';
            echo '<p>' . esc_html($repo['description']) . '</p>';
            echo '<a href="' . esc_url($repo['url']) . '" target="_blank">View on GitHub</a>';
            echo '</div>';
        }
    } else {
        echo '<p style="color: #FFF3B0;">No repositories found. Add some in the admin panel.</p>';
    }
    ?>
</div>
