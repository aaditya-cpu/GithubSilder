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
        $repos = sanitize_text_field($_POST['github_repo_slider_repos']);
        update_option('github_repo_slider_repos', $repos);
    }

    // Get saved repositories
    $repos = get_option('github_repo_slider_repos', '');
    ?>
    <div class="github-repo-slider-admin">
        <h1>GitHub Repo Slider</h1>
        <form method="post" action="">
            <label for="github_repo_slider_repos">Enter GitHub Repositories (JSON Format)</label>
            <textarea id="github_repo_slider_repos" name="github_repo_slider_repos" rows="10"><?php echo esc_textarea($repos); ?></textarea>
            <p>Example: [{"title": "Repo 1", "description": "Description 1", "url": "https://github.com/repo1"}, {"title": "Repo 2", "description": "Description 2", "url": "https://github.com/repo2"}]</p>
            <button type="submit" name="github_repo_slider_submit" class="button-primary">Save Repositories</button>
        </form>
    </div>
    <?php
}
