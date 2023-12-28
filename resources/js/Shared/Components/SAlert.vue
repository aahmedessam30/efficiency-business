<template>
    <div
        v-if="show"
        :id="id"
        :class="alertClasses"
        :style="alertStyles"
        :aria-live="ariaLive"
        :aria-atomic="ariaAtomic"
        role="alert"
        @click="show = false"
        @keydown.esc="show = false"
    >
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "SAlert",
    props: {
        id: {
            type: String,
            required: false
        },
        show: {
            type: Boolean,
            required: true
        },
        classes: {
            type: String,
            required: false,
        },
        styles: {
            type: String,
            required: false
        },
        ariaLive: {
            type: String,
            required: false,
            default: 'polite'
        },
        ariaAtomic: {
            type: String || Boolean,
            required: false,
            default: true
        }
    },
    computed: {
        alertClasses() {
            let classes = [
                'alert',
                'alert-dismissible',
                'fade',
                'show',
                this.classes
            ];

            return classes.join(' ');
        },
        alertStyles() {
            let styles = [
                this.styles
            ];

            return styles.join(' ');
        },
    },
    methods: {
        close() {
            this.show = false;
        },
        fadeAlert() {
            setTimeout(() => {
                this.show = false;
            }, 5000);
        }
    },
    mounted() {
        this.fadeAlert();
    }
}
</script>
