<?php
// Add menu item in the WordPress dashboard
function github_repo_slider_menu() {
    add_menu_page(
        'GitHub Repo Slider',
        'GitHub Repo Slider',
        'manage_options',
        'github-repo-slider',
        'github_repo_slider_admin_page',
        'dashicons-slides',
        20
    );
}
add_action('admin_menu', 'github_repo_slider_menu');

// Admin page HTML
function github_repo_slider_admin_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Handle form submission
    if (isset($_POST['github_repo_slider_submit'])) {
        $repos = get_option('github_repo_slider_repos', []);
        $new_repo = [
            'title'       => sanitize_text_field($_POST['repo_title']),
            'description' => sanitize_textarea_field($_POST['repo_description']),
            'url'         => esc_url($_POST['repo_url']),
        ];
        $repos[] = $new_repo;
        update_option('github_repo_slider_repos', $repos);
    }

    // Get saved repositories
    $repos = get_option('github_repo_slider_repos', []);
    ?>
    <div class="github-repo-slider-admin">
        <h1>GitHub Repo Slider</h1>
        <form method="post" action="">
            <label for="repo_title">Repository Title</label>
            <input type="text" id="repo_title" name="repo_title" required />

            <label for="repo_description">Description</label>
            <textarea id="repo_description" name="repo_description" rows="3" required></textarea>

            <label for="repo_url">GitHub URL</label>
            <input type="url" id="repo_url" name="repo_url" required />

            <button type="submit" name="github_repo_slider_submit" class="button-primary">Add Repository</button>
        </form>

        <h2>Existing Repositories</h2>
        <ul>
            <?php foreach ($repos as $repo): ?>
                <li>
                    <strong><?php echo esc_html($repo['title']); ?></strong>: <?php echo esc_html($repo['description']); ?>
                    (<a href="<?php echo esc_url($repo['url']); ?>" target="_blank">View</a>)
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}
