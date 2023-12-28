<template>
    <div class="bg-white rounded-lg shadow-lg">
        <div class="p-4">
            <div class="flex items-center justify-center" v-if="withImage">
                <SImage
                    :src="imageSrc"
                    :alt="imageAlt"
                    :class="imageClasses"
                    :style="imageStyles"
                    :width="imageWidth"
                    :height="imageHeight"
                />
            </div>
            <slot name="header"></slot>
        </div>
        <div class="p-4">
            <slot name="body"></slot>
        </div>
        <div class="p-4">
            <slot name="footer"></slot>
        </div>
    </div>
</template>

<script>
import SImage from "./SImage.vue";

export default {
    name: "SCard",
    components: {SImage},
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
