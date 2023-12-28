<template>
    <div class="video-container">
        <div v-if="title && titlePosition === 'before-video'" class="video-title">
            <h2>{{ title }}</h2>
        </div>
        <div v-if="subtitle && subtitlePosition === 'before-video-after-title'" class="video-subtitle">
            <h3>{{ subtitle }}</h3>
        </div>
        <div class="video-controls">
            <video
                :ref="refName"
                :id="videoId"
                :src="src"
                :poster="poster"
                :width="width"
                :height="height"
                :controls="controls"
                :autoplay="autoplay"
                :muted="muted"
                :loop="loop"
                :playsinline="playsinline"
                :crossorigin="crossorigin"
                :preload="preload"
                :class="videoClasses"
                :style="videoStyles"
                @play="play"
                @pause="pause"
                @ended="ended"
                @audioprocess="audioprocess"
                @complete="complete"
                @loadedmetadata="loadedmetadata"
                @loadeddata="loadeddata"
                @loadstart="loadstart"
                @waiting="waiting"
                @playing="playing"
                @canplay="canplay"
                @canplaythrough="canplaythrough"
                @timeupdate="timeupdate"
                @volumechange="volumechange"
                @seeking="seeking"
                @seeked="seeked"
                @ratechange="ratechange"
                @durationchange="durationchange"
                @stalled="stalled"
                @suspend="suspend"
                @emptied="emptied"
                @abort="abort"
                @error="error"
                @progress="progress"
            >
                <slot/>
            </video>
        </div>
        <div v-if="title && titlePosition === 'after-video'" class="video-title">
            <h2>{{ title }}</h2>
        </div>
        <div v-if="subtitle && subtitlePosition === 'after-video'" class="video-subtitle">
            <h3>{{ subtitle }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: "SVideo",
    props: {
        title: {
            required: false,
            type: String,
            default: null
        },
        subtitle: {
            required: false,
            type: String,
            default: null
        },
        titlePosition: {
            required: false,
            type: String,
            default: "before-video",
            validator: (value) => ["before-video", "after-video"].includes(value)
        },
        subtitlePosition: {
            required: false,
            type: String,
            default: "before-video-after-title",
            validator: (value) => ["before-video-after-title", "after-video"].includes(value)
        },
        videoId: {
            required: true,
            type: String,
            default: null
        },
        src: {
            required: false,
            type: String,
            default: null
        },
        poster: {
            required: false,
            type: String,
            default: null
        },
        width: {
            required: false,
            type: String,
            default: "100%"
        },
        height: {
            required: false,
            type: String,
            default: "auto"
        },
        controls: {
            required: false,
            type: Boolean,
            default: true
        },
        autoplay: {
            required: false,
            type: Boolean,
            default: false
        },
        muted: {
            required: false,
            type: Boolean,
            default: false
        },
        loop: {
            required: false,
            type: Boolean,
            default: false
        },
        playsinline: {
            required: false,
            type: Boolean,
            default: false
        },
        disablepictureinpicture: {
            required: false,
            type: Boolean,
            default: false
        },
        disableremoteplayback: {
            required: false,
            type: Boolean,
            default: false
        },
        controlslist: {
            required: false,
            type: String,
            default: null
        },
        crossorigin: {
            required: false,
            type: String,
            default: null
        },
        preload: {
            required: false,
            type: String,
            default: "auto"
        },
        class: {
            required: false,
            type: String,
            default: null
        },
        style: {
            required: false,
            type: String,
            default: null
        },
    },
    computed: {
        refName() {
            return `video-${this.videoId}`;
        },
        videoClasses() {
            let classes = [
                this.class,
            ];

            return classes.join(" ");
        },
        videoStyles() {
            let styles = [
                this.style,
            ];

            return styles.join(" ");
        },
    },
    methods: {
        play() {
            this.$refs[refName].play();
            this.$emit("play");
        },
        pause() {
            this.$refs[refName].pause();
            this.$emit("pause");
        },
        stop() {
            this.$refs[refName].pause();
            this.$refs[refName].currentTime = 0;
            this.$emit("stop");
        },
        ended() {
            this.$emit("ended");
        },
        audioprocess() {
            this.$emit("audioprocess")
        },
        complete() {
            this.$emit("complete")
        },
        loadedmetadata() {
            this.$emit("loadedmetadata")
        },
        loadeddata() {
            this.$emit("loadeddata")
        },
        loadstart() {
            this.$emit("loadstart")
        },
        waiting() {
            this.$emit("waiting")
        },
        playing() {
            this.$emit("playing")
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
        volumechange() {
            this.$emit("volumechange")
        },
        seeking() {
            this.$emit("seeking")
        },
        seeked() {
            this.$emit("seeked")
        },
        ratechange() {
            this.$emit("ratechange")
        },
        durationchange() {
            this.$emit("durationchange")
        },
        stalled() {
            this.$emit("stalled")
        },
        suspend() {
            this.$emit("suspend")
        },
        emptied() {
            this.$emit("emptied")
        },
        abort() {
            this.$emit("abort")
        },
        error() {
            this.$emit("error")
        },
        progress() {
            this.$emit("progress")
        },
        rewind() {
            this.$refs[refName].currentTime -= 10;
        },
        forward() {
            this.$refs[refName].currentTime += 10;
        },
        volumeUp() {
            this.$refs[refName].volume += 0.1;
        },
        volumeDown() {
            this.$refs[refName].volume -= 0.1;
        },
        toggleMute() {
            this.$refs[refName].muted = !this.$refs[refName].muted;
        },
        toggleFullscreen() {
            if (this.$refs[refName].requestFullscreen) {
                this.$refs[refName].requestFullscreen();
            } else if (this.$refs[refName].webkitRequestFullscreen) {
                this.$refs[refName].webkitRequestFullscreen();
            } else if (this.$refs[refName].msRequestFullscreen) {
                this.$refs[refName].msRequestFullscreen();
            }
        },
        togglePip() {
            this.$refs[refName] !== document.pictureInPictureElement
                ? this.$refs[refName].requestPictureInPicture()
                : document.exitPictureInPicture();
        },
        toggleControls() {
            this.$refs[refName].controls = !this.$refs[refName].controls;
        },
        toggleLoop() {
            this.$refs[refName].loop = !this.$refs[refName].loop;
        },
        toggleAutoplay() {
            this.$refs[refName].autoplay = !this.$refs[refName].autoplay;
        },
        togglePlaysinline() {
            this.$refs[refName].playsinline = !this.$refs[refName].playsinline;
        },
        toggleDisablepictureinpicture() {
            this.$refs[refName].disablepictureinpicture = !this.$refs[refName].disablepictureinpicture;
        },
        toggleDisableremoteplayback() {
            this.$refs[refName].disableremoteplayback = !this.$refs[refName].disableremoteplayback;
        },
        toggleCrossorigin() {
            this.$refs[refName].crossorigin = !this.$refs[refName].crossorigin;
        },
        togglePreload() {
            this.$refs[refName].preload = !this.$refs[refName].preload;
        },
    },
}
</script>
