<?php

/**
 * Template Name: Logout
 *
 * @package WordPress
 * @subpackage NextBigIdeaClub
 * @since Next Big Idea Club 1.0
 */
wp_destroy_current_session();

header("Location: " . home_url() . "/login/");