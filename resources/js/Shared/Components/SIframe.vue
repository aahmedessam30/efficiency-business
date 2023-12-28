<template>
    <div class="iframe-component">
        <div v-if="title && titlePosition === 'before-iframe'" class="iframe-component__title">
            <h2>{{ title }}</h2>
        </div>
        <div v-if="subtitle && subtitlePosition === 'before-iframe-after-title'" class="iframe-component__subtitle">
            <h3>{{ subtitle }}</h3>
        </div>
        <div class="iframe-component__iframe">
            <iframe
                :id="id"
                :name="name"
                :title="iframeTitle"
                :src="src"
                :srcdoc="srcdoc"
                :width="width"
                :height="height"
                :allow="allow"
                :allowfullscreen="allowfullscreen"
                :loading="loading"
                :sandbox="sandbox"
                :referrerpolicy="referrerpolicy"
                :style="iframeStyles"
                :class="iframeClasses"
            >
                <slot></slot>
            </iframe>
        </div>
        <div v-if="title && titlePosition === 'after-iframe'" class="iframe-component__title">
            <h2>{{ title }}</h2>
        </div>
        <div v-if="subtitle && subtitlePosition === 'after-iframe'" class="iframe-component__subtitle">
            <h3>{{ subtitle }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: "SIframe",
    props: {
        id: {
            type: String,
            required: false
        },
        name: {
            type: String,
            required: false
        },
        title: {
            type: String,
            required: false
        },
        subtitle: {
            type: String,
            required: false
        },
        titlePosition: {
            type: String,
            default: 'before-iframe',
            validator: (value) => ['before-iframe', 'after-iframe'].includes(value)
        },
        subtitlePosition: {
            type: String,
            default: 'before-iframe-after-title',
            validator: (value) => ['before-iframe-after-title', 'after-iframe'].includes(value)
        },
        iframeTitle: {
            type: String,
            required: false
        },
        src: {
            type: String,
            required: true
        },
        srcdoc: {
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
        allow: {
            type: Boolean,
            required: false
        },
        allowfullscreen: {
            type: Boolean,
            required: false
        },
        loading: {
            type: String,
            required: false,
            validator: (value) => ['lazy', 'eager', 'auto'].includes(value)
        },
        sandbox: {
            type: String,
            required: false,
            validator: (value) => ['allow-forms', 'allow-modals', 'allow-orientation-lock', 'allow-pointer-lock', 'allow-popups', 'allow-popups-to-escape-sandbox', 'allow-presentation', 'allow-same-origin', 'allow-scripts', 'allow-top-navigation', 'allow-top-navigation-by-user-activation'].includes(value)
        },
        referrerpolicy: {
            type: String,
            required: false,
            validator: (value) => ['no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin', 'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'].includes(value)
        },
        style: {
            type: String,
            required: false
        },
        class: {
            type: String,
            required: false
        },
    },
    computed: {
        iframeStyles() {
            let styles = [
                'border: 0;',
                'overflow: hidden;',
                'margin: 0;',
                'padding: 0;',
                'width: 100%;',
                'height: 100%;',
                this.style
            ];

            return styles.join(' ');
        },
        iframeClasses() {
            let classes = [
                this.class
            ];

            return classes.join(' ');
        },
    }
}
</script>
