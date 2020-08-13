<?php

add_action('rest_api_init', 'universityLikeRoutes');

function universityLikeRoutes()
{
    register_rest_route('university/v1', 'like', array(
        'methods' => 'POST',
        'callback' => 'createLike'
    ));

    register_rest_route('university/v1', 'like', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike($data)
{
    if (is_user_logged_in()) {
        $professor = sanitize_text_field($data['professorId']);

        $check_likeCount = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => 'like',
            'meta_query' => array(array(
                'key' => 'liked_professor_id',
                'compare' => '=',
                'value' => $professor
            ))
        ));

        if ($check_likeCount->found_posts == 0 and get_post_type($professor) == 'professor') {
            return wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => 'Our PHP Create Post Test',
                'meta_input' => array(
                    'liked_professor_id' => $professor
                )
            ));
        } else {
            die("invalid Professor Id");
        }
    } else {
        die("Only logged in user can hit a like.");
    }
}

function deleteLike($data)
{
    $likedId = sanitize_text_field($data['like']);
    if (get_current_user_id() == get_post_field('post_author', $likedId) and get_post_type($likedId) == 'like') {
        wp_delete_post($likedId, true);
        return 'Congrats, like deleted.';
    } else {
        die("You do not have permission to delete that like.");
    }
}
