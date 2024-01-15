<?php

/**
 * Plugin Name: Project Estimator
 * Description: Form to calculate Projects Estimation
 * Version: 1.0
 * Text Domain: mirrorful
 * Author: Mr. Basioni
 * Author URI: https://www.linkedin.com/in/basioni/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
// hiii

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Adding form scripts and styles
add_action('wp_enqueue_scripts', 'Mirrorful_widget_enqueue_script');
function Mirrorful_widget_enqueue_script()
{
    wp_enqueue_style('mirrorful_custom_style', plugin_dir_url(__FILE__) . '/assets/css/mirrorful-styles.css', false, '1.1', 'all');
    wp_enqueue_script('mirrorful_custom_script', plugin_dir_url(__FILE__) . '/assets/js/mirrorful-scripts.js');
}

// Display function that runs when shortcode is called
function formDisplay()
{

    // Things that you want to do.
    $estimation_panels = '
    <div id="step1" class="mirror-panel">
        <h2 class="mirror-title">What Is The Project Type?</h2>
        <button class="selection-button" onclick="setTypeRate(2900)">
            <img src="' . plugin_dir_url(__FILE__) . '/assets/images/apartment.svg">
            <br>
            Apartment
        </button>
        <button class="selection-button" onclick="setTypeRate(4125)">
            <img src="' . plugin_dir_url(__FILE__) . '/assets/images/house.svg">
            <br>
            House
        </button>
        <button class="selection-button" onclick="setTypeRate(7400)">
            <img src="' . plugin_dir_url(__FILE__) . '/assets/images/commercial.svg">
            <br>
            Commercial
        </button>
    </div>
    <div id="step2" class="mirror-panel" style="visibility: hidden;">
        <h2 class="mirror-title">What Is Your Surface Square Feet KM2?</h2>
        <div>
            <input type="number" id="rangevalue" value="50" oninput="sqaureFeet.value=value">
            <input id="sqaureFeet" class="sqaure-range" type="range" oninput="rangevalue.value=value">
            <button class="next-btn" onclick="setSqaureFeet()">
                Save & Next
            </button>
        </div>
    </div>
    <div id="step3" class="mirror-panel" style="visibility: hidden;">
        <h2 class="mirror-title">What Your Expected Time To Finalize The Project?</h2>
        <div>
            <button class="duration-button" onclick="setDurationRate(2)">
                <small>Less Than</small>
                <b>2</b>
                Months
            </button>
            <button class="duration-button" onclick="setDurationRate(1.6)">
                <small>From </small>
                <b>2 - 4</b>
                Months
            </button>
            <button class="duration-button" onclick="setDurationRate(1)">
                <small>More Than</small>
                <b>4 </b>
                Months
            </button>
        </div>
    </div>
    <div id="step4" class="mirror-panel" style="visibility: hidden;">
        <h2 class="result-title">Your Project Cost Estimation Is</h2>
        <p class="mirror-subtitle">
            This Estimation Is Based On Your Answers
        </p>
        <div class="cost-summary">
            <div>
                <p class="cost"> <span id="min-cost"></span> $</p>
                <p>Minimum Project Cost</p>
            </div>
            <div>
                <p class="best-cost"> <span id="avg-cost"></span> $</p>
                <p class="best-cost-description">Best Fit For You</p>
            </div>

            <div>
                <p class="cost"><span id="high-cost"></span> $</p>
                <p>High Project Cost</p>
            </div>
        </div>
    </div>
    ';

    // Estimation Panel Views
    return $estimation_panels;
}
// register form shortcode
add_shortcode('mirrorful-form', 'formDisplay');
