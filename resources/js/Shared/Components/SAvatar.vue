<template>
    <SImage
        :id="id"
        :src="src"
        :alt="alt"
        :class="imageClasses"
        :style="imageStyles"
        :width="width"
        :height="height"
    />
</template>

<script>
import SImage from "./SImage.vue";

export default {
    name: "SAvatar",
    components: {SImage},
    props: {
        id: {
            type: String,
            required: false
        },
        src: {
            type: String,
            required: true
        },
        alt: {
            type: String,
            required: false
        },
        classes: {
            type: String,
            required: false
        },
        styles: {
            type: String,
            required: false
        },
        width: {
            type: String,
            required: false
        },
        height: {
            type: String,
            required: false
        },
    },
    computed: {
        imageClasses() {
            let classes = [
                'rounded-full',
                'border-2',
                'border-white',
                'shadow-sm',
                'hover:shadow-md',
                'focus:shadow-md',
                'focus:outline-none',
                'focus:border-blue-300',
                'focus:border-opacity-50',
                'focus:ring-1',
                'focus:ring-blue-300',
                'focus:ring-opacity-50',
                this.classes
            ];

            return classes.join(' ');
        },
        imageStyles() {
            let styles = [
                this.styles
            ];

            return styles.join(' ');
        },
    },
}
</script>
