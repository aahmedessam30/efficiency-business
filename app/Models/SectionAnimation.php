<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionAnimation extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'name',
        'delay',
        'duration',
        'easing',
        'offset',
        'anchor_placement',
        'throttle',
        'start_event',
        'stop_event',
        'initial_class_name',
        'animated_class_name',
        'debounce_delay',
        'throttle_delay',
        'once',
        'mirror',
        'disable',
        'use_class_names',
        'disable_mutation_observer'
    ];

    // Default values
    public static function defaultAnimations()
    {
        return [
            'fade'            => __('attributes.fade'),
            'fade-up'         => __('attributes.'),
            'fade-down'       => __('attributes.'),
            'fade-left'       => __('attributes.'),
            'fade-right'      => __('attributes.'),
            'fade-up-right'   => __('attributes.'),
            'fade-up-left'    => __('attributes.'),
            'fade-down-right' => __('attributes.'),
            'fade-down-left'  => __('attributes.'),
            'flip-up'         => __('attributes.'),
            'flip-down'       => __('attributes.'),
            'flip-left'       => __('attributes.'),
            'flip-right'      => __('attributes.'),
            'slide-up'        => __('attributes.'),
            'slide-down'      => __('attributes.'),
            'slide-left'      => __('attributes.'),
            'slide-right'     => __('attributes.'),
            'zoom-in'         => __('attributes.'),
            'zoom-in-up'      => __('attributes.'),
            'zoom-in-down'    => __('attributes.'),
            'zoom-in-left'    => __('attributes.'),
            'zoom-in-right'   => __('attributes.'),
            'zoom-out'        => __('attributes.'),
            'zoom-out-up'     => __('attributes.'),
            'zoom-out-down'   => __('attributes.'),
            'zoom-out-left'   => __('attributes.'),
            'zoom-out-right'  => __('attributes.'),
        ];
    }

    public static function defaultAnchorPlacements()
    {
        return [
            'top-bottom'    => __('attributes.'),
            'top-center'    => __('attributes.'),
            'top-top'       => __('attributes.'),
            'center-bottom' => __('attributes.'),
            'center-center' => __('attributes.'),
            'center-top'    => __('attributes.'),
            'bottom-bottom' => __('attributes.'),
            'bottom-center' => __('attributes.'),
            'bottom-top'    => __('attributes.'),
        ];
    }

    public static function defaultEaseings()
    {
        return [
            'linear'            => __('attributes.'),
            'ease'              => __('attributes.'),
            'ease-in'           => __('attributes.'),
            'ease-out'          => __('attributes.'),
            'ease-in-out'       => __('attributes.'),
            'ease-in-back'      => __('attributes.'),
            'ease-out-back'     => __('attributes.'),
            'ease-in-out-back'  => __('attributes.'),
            'ease-in-sine'      => __('attributes.'),
            'ease-out-sine'     => __('attributes.'),
            'ease-in-out-sine'  => __('attributes.'),
            'ease-in-quad'      => __('attributes.'),
            'ease-out-quad'     => __('attributes.'),
            'ease-in-out-quad'  => __('attributes.'),
            'ease-in-cubic'     => __('attributes.'),
            'ease-out-cubic'    => __('attributes.'),
            'ease-in-out-cubic' => __('attributes.'),
            'ease-in-quart'     => __('attributes.'),
            'ease-out-quart'    => __('attributes.'),
            'ease-in-out-quart' => __('attributes.'),
        ];
    }

    // Relationships
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
