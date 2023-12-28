<template>
    <component
        :is="tag"
        :id="id"
        :type="type"
        :class="buttonClasses"
        :style="buttonStyle"
        :disabled="disabled"
        :href="href"
        :target="target"
        :rel="rel"
        :form="form"
        :formaction="formaction"
        :formenctype="formenctype"
        :formmethod="formmethod"
        :formnovalidate="formnovalidate"
        :formtarget="formtarget"
        :autofocus="autofocus"
        :autocomplete="autocomplete"
        :aria-label="text"
        @click="click"
    >
        <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span v-else>
            <span v-if="icon && iconOnLeft" :class="buttonIcon"><i :class="icon"></i></span>
            <span v-if="text">{{ text }}</span>
            <slot></slot>
            <span v-if="icon && iconOnRight" :class="buttonIcon"><i :class="icon"></i></span>
        </span>
    </component>
</template>

<script>
export default {
    name: "SButton",
    props: {
        id: {
            required: true,
            type: String,
            default: null
        },
        type: {
            type: String,
            default: "button",
            validator: (value) => ["button", "submit", "reset"].includes(value)
        },
        tag: {
            type: String,
            default: "button",
            validator: (value) => ["button", "a"].includes(value)
        },
        text: {
            type: String,
            default: "Button"
        },
        icon: {
            type: String,
            default: null
        },
        iconPosition: {
            type: String,
            default: "left"
        },
        disabled: {
            type: Boolean,
            default: false
        },
        loading: {
            type: Boolean,
            default: false
        },
        link: {
            type: Boolean,
            default: false
        },
        href: {
            type: String,
            default: null
        },
        target: {
            type: String,
            default: "_self"
        },
        rel: {
            type: String,
            default: null
        },
        class: {
            type: String,
            default: null
        },
        style: {
            type: String,
            default: null
        },
        size: {
            type: String,
            default: "md"
        },
        variant: {
            type: String,
            default: "primary"
        },
        form: {
            type: String,
            default: null
        },
        formaction: {
            type: String,
            default: null
        },
        formenctype: {
            type: String,
            default: null,
            validator: (value) => ["application/x-www-form-urlencoded", "multipart/form-data", "text/plain"].includes(value)
        },
        formmethod: {
            type: String,
            default: null,
            validator: (value) => ["get", "post", "dialog"].includes(value)
        },
        formnovalidate: {
            type: Boolean,
            default: false
        },
        formtarget: {
            type: String,
            default: null,
            validator: (value) => ["_blank", "_self", "_parent", "_top"].includes(value)
        },
        autofocus: {
            type: Boolean,
            default: false
        },
        autocomplete: {
            type: Boolean,
            default: false
        },
        rounded: {
            type: Boolean,
            default: false
        },
        block: {
            type: Boolean,
            default: false
        },
        outline: {
            type: Boolean,
            default: false
        },
    },
    computed: {
        buttonClasses() {
            let classes = [
                "btn",
                `btn-${this.variant}`,
                `btn-${this.size}`,
                this.rounded ? "rounded-pill" : "",
                this.block ? "btn-block" : "",
                this.outline ? `btn-outline-${this.variant}` : "",
                this.link ? "btn-link" : "",
                this.class,
            ];

            return classes.join(" ");
        },
        buttonStyle() {
            let styles = [
                this.style,
            ];

            return styles.join(" ");
        },
        buttonIcon() {
            let icon = [
                this.icon,
                this.iconPosition === "right" ? "ml-2" : "mr-2",
            ];

            return icon.join(" ");
        },
        iconOnLeft() {
            return this.iconPosition === "left";
        },
        iconOnRight() {
            return this.iconPosition === "right";
        },
    },
    methods: {
        click() {
            this.$emit("click");
        },
    },
}
</script>
