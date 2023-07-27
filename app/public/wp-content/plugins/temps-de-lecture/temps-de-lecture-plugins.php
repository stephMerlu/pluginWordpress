<?php
/*
Plugin Name: Temps de Lecture
Plugin URI: Votre URL du plugin (facultatif)
Description: Plugin pour calculer et afficher le temps de lecture des articles.
Version: 1.0
Author: Merluzzo Stéphanie
Author URI: Votre site web (facultatif)
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Fonction pour calculer le temps de lecture d'un contenu
function capitaine_calculer_temps_lecture($post_content, $words_per_minute = 250) {
    $word_count = str_word_count(strip_tags($post_content));
    $temps_de_lecture = ceil($word_count / $words_per_minute);
    return $temps_de_lecture;
}

// Fonction pour afficher le temps de lecture à côté du titre de l'article
function capitaine_afficher_temps_lecture($title, $id = null) {
    // Vérifier si l'article est en cours d'affichage, qu'un ID d'article est fourni et qu'il s'agit d'un article de type "post" appartenant à la catégorie "blog"
    if (is_single() && $id && get_post_type($id) === 'post' && has_category('blog', $id)) {
        // Récupérer la vitesse de lecture personnalisée depuis les options du plugin (250 mots par minute par défaut)
        $custom_words_per_minute = get_option('temps_lecture_words_per_minute', 250);

        $temps_de_lecture = capitaine_calculer_temps_lecture(get_post_field('post_content', $id), $custom_words_per_minute);
        $title = 'Le temps de lecture : ' . $temps_de_lecture . ' minute(s) - ' . $title;
    }
    return $title;
}


add_filter('the_title', 'capitaine_afficher_temps_lecture', 10, 2);

// Fonction pour mettre à jour le temps de lecture pour tous les articles existants
function capitaine_mettre_a_jour_temps_lecture() {
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    $articles = get_posts($args);

    foreach ($articles as $article) {
        // Utiliser la vitesse de lecture par défaut (250 mots par minute) pour la mise à jour
        $temps_de_lecture = capitaine_calculer_temps_lecture($article->post_content);
        update_post_meta($article->ID, 'reading_time', $temps_de_lecture);
    }
}

// Fonction pour ajouter une section de réglages pour la vitesse de lecture
function capitaine_temps_lecture_settings() {
    add_settings_section(
        'capitaine_temps_lecture_settings_section',
        'Réglages du Temps de Lecture',
        'capitaine_temps_lecture_settings_callback',
        'reading'
    );

    add_settings_field(
        'capitaine_words_per_minute',
        'Vitesse de lecture (mots par minute)',
        'capitaine_words_per_minute_callback',
        'reading',
        'capitaine_temps_lecture_settings_section'
    );

    register_setting('reading', 'temps_lecture_words_per_minute');
}

// Fonction de rappel pour la section de réglages
function capitaine_temps_lecture_settings_callback() {
    echo '<p>Personnalisez la vitesse de lecture en mots par minute pour le calcul du temps de lecture des articles de la catégorie "blog".</p>';
}

// Fonction de rappel pour le champ de saisie de la vitesse de lecture
function capitaine_words_per_minute_callback() {
    $custom_words_per_minute = get_option('temps_lecture_words_per_minute', 250);
    echo '<input type="number" name="temps_lecture_words_per_minute" value="' . esc_attr($custom_words_per_minute) . '" />';
}

add_action('admin_init', 'capitaine_temps_lecture_settings');

capitaine_mettre_a_jour_temps_lecture();
