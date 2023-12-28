<template>
    <img
        :id="id"
        :src="src"
        :srcset="srcset"
        :alt="alt"
        :width="width"
        :height="height"
        :sizes="sizes"
        :usemap="usemap"
        :loading="loading"
        :crossorigin="crossorigin"
        :decoding="decoding"
        :referrerpolicy="referrerpolicy"
        :ismap="ismap"
        :class="imageClasses"
        :style="imageStyles"
        :title="title"
    />
</template>

<script>
export default {
    name: "SImage",
    props: {
        id: {
            type: String,
            required: false
        },
        src: {
            type: String,
            required: true
        },
        srcset: {
            type: String,
            required: false
        },
        alt: {
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
        elementtiming: {
            type: String,
            required: false
        },
        sizes: {
            type: String,
            required: false
        },
        usemap: {
            type: String,
            required: false
        },
        loading: {
            type: String,
            required: false,
            validator: (value) => ['lazy', 'eager', 'auto'].includes(value)
        },
        crossorigin: {
            type: String,
            required: false,
            validator: (value) => ['anonymous', 'use-credentials'].includes(value)
        },
        decoding: {
            type: String,
            required: false,
            validator: (value) => ['async', 'auto', 'sync'].includes(value)
        },
        fetchpriority: {
            type: String,
            required: false,
            validator: (value) => ['auto', 'high', 'low', 'normal'].includes(value)
        },
        referrerpolicy: {
            type: String,
            required: false,
            validator: (value) => ['no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin', 'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'].includes(value)
        },
        ismap: {
            type: Boolean,
            required: false
        },
        class: {
            type: String,
            required: false
        },
        style: {
            type: String,
            required: false
        },
        title: {
            type: String,
            required: false
        }
    },
    computed: {
        image() {
            return this.src;
        }
    }
}
</script>
