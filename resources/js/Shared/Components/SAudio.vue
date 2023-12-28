<template>
    <div class="audio-container">
        <div v-if="title && titlePosition === 'before-audio'" class="audio-title">
            <h2>{{ title }}</h2>
        </div>
        <div v-if="subtitle && subtitlePosition === 'before-audio-after-title'" class="audio-subtitle">
            <h3>{{ subtitle }}</h3>
        </div>
        <div class="audio-component">
            <audio
                :ref="refName"
                :id="id"
                :src="src"
                :controls="controls"
                :crossorigin="crossorigin"
                :preload="preload"
                :autoplay="autoplay"
                :loop="loop"
                :muted="muted"
                :class="audioClasses"
                :style="audioStyles"
                @play="play"
                @pause="pause"
                @ended="ended"
                @audioprocess="audioprocess"
                @complete="complete"
                @canplay="canplay"
                @canplaythrough="canplaythrough"
                @timeupdate="timeupdate"
                @durationchange="durationchange"
                @volumechange="volumechange"
                @emptied="emptied"
                @error="error"
                @loadeddata="loadeddata"
                @loadedmetadata="loadedmetadata"
                @loadstart="loadstart"
                @playing="playing"
                @progress="progress"
                @ratechange="ratechange"
                @seeked="seeked"
                @seeking="seeking"
                @stalled="stalled"
                @suspend="suspend"
                @waiting="waiting"
            >
                <slot/>
            </audio>
        </div>
        <div v-if="title && titlePosition === 'after-audio'" class="audio-title">
            <h2>{{ title }}</h2>
        </div>
        <div v-if="subtitle && subtitlePosition === 'after-audio'" class="audio-subtitle">
            <h3>{{ subtitle }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: "SAudio",
    props: {
        id: {
            type: String,
            required: true
        },
        src: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        subtitle: {
            type: String,
            required: true
        },
        titlePosition: {
            type: String,
            default: 'before-audio',
            validator: (value) => ['before-audio', 'after-audio'].includes(value)
        },
        subtitlePosition: {
            type: String,
            default: 'before-audio-after-title',
            validator: (value) => ['before-audio-after-title', 'after-audio'].includes(value)
        },
        srcType: {
            type: String,
            default: 'audio/mpeg',
            validator: (value) => ['audio/mpeg', 'audio/ogg', 'audio/wav'].includes(value)
        },
        controlslist: {
            type: String,
            default: null,
            validator: (value) => ['nodownload', 'nofullscreen', 'noremoteplayback'].includes(value)
        },
        crossorigin: {
            type: String,
            default: null,
            validator: (value) => ['anonymous', 'use-credentials'].includes(value)
        },
        preload: {
            type: String,
            default: null,
            validator: (value) => ['none', 'metadata', 'auto'].includes(value)
        },
        autoplay: {
            type: Boolean,
            default: false
        },
        controls: {
            type: Boolean,
            default: true
        },
        loop: {
            type: Boolean,
            default: false
        },
        muted: {
            type: Boolean,
            default: false
        },
        playsinline: {
            type: Boolean,
            default: false
        },
        disableremoteplayback: {
            type: Boolean,
            default: false
        },
        class: {
            type: String,
            default: null
        },
        style: {
            type: String,
            default: null
        },
    },
    computed: {
        refName() {
            return `audio-${this.id}`
        },
        audioClasses() {
            let classes = [
                this.class,
            ];

            return classes.join(' ');
        },
        audioStyles() {
            let styles = [
                this.style,
            ];

            return styles.join(' ');
        },
    },
    methods: {
        play() {
            this.$refs.audio.play();
            this.$emit('play');
        },
        pause() {
            this.$refs.audio.pause();
            this.$emit('pause');
        },
        toggle() {
            this.$refs.audio.paused
                ? this.play()
                : this.pause();
            this.$emit('toggle');
        },
        stop() {
            this.$refs.audio.pause();
            this.$refs.audio.currentTime = 0;
            this.$emit('stop');
        },
        ended() {
            this.$emit('ended');
        },
        audioprocess() {
            this.$emit("audioprocess")
        },
        complete() {
            this.$emit("complete")
        },
        canplay() {
            this.$emit("canplay")
        },
        canplaythrough() {
            this.$emit("canplaythrough")
        },
        timeupdate() {
            this.$emit("timeupdate")
        },
        durationchange() {
            this.$emit("durationchange")
        },
        volumechange() {
            this.$emit("volumechange")
        },
        emptied() {
            this.$emit("emptied")
        },
        error() {
            this.$emit("error")
        },
        loadeddata() {
            this.$emit("loadeddata")
        },
        loadedmetadata() {
            this.$emit("loadedmetadata")
        },
        loadstart() {
            this.$emit("loadstart")
        },
        playing() {
            this.$emit("playing")
        },
        progress() {
            this.$emit("progress")
        },
        ratechange() {
            this.$emit("ratechange")
        },
        seeked() {
            this.$emit("seeked")
        },
        seeking() {
            this.$emit("seeking")
        },
        stalled() {
            this.$emit("stalled")
        },
        suspend() {
            this.$emit("suspend")
        },
        waiting() {
            this.$emit("waiting")
        },
    },
}
</script>
