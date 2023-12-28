<template>
    <div
        :class="classes"
        :style="styles"
    >
        <div class="relative">
            <slot name="image"></slot>
            <slot name="content"></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "SHero",
    props: {
        classes: {
            type: String,
            required: false
        },
        styles: {
            type: String,
            required: false
        },
        withImage: {
            type: Boolean,
            required: false,
            default: false
        },
        imageSrc: {
            type: String,
            required: false
        },
        imageAlt: {
            type: String,
            required: false
        },
        imageClasses: {
            type: String,
            required: false
        },
        imageStyles: {
            type: String,
            required: false
        },
        imageWidth: {
            type: String,
            required: false
        },
        imageHeight: {
            type: String,
            required: false
        },
        imagePosition: {
            type: String,
            required: false,
            default: 'top'
        },
    },
}
</script>
