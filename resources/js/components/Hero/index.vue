<template>
    <div class="relative bg-cover bg-center w-full" :class="containerClass"
         :style="{ backgroundImage: !backgroundColor ? 'url(' + backgroundImage + ')' : '' }">
        <div class="absolute inset-0" :class="height" :style="backgroundColor ? { backgroundColor: backgroundColor } : ''"/>
        <div class="firefly" v-for="i in 100" :key="i" :style="{ top: 10 + '%' }"/>
        <div v-if="!withoutText" class="flex items-center xs:justify-center" :class="height">
            <div class="container lg:ml-20 mx-8 lg:px-0 lg:w-1/2 w-full z-10" :class="textPositionClass">
                <div class="flex items-center lg:mb-4 mb-2" v-if="!(title || subtitle)">
                    <hr class="h-1 bg-white mr-2 lg:w-[60%] w-[70%]">
                    <span class="text-secondary font-bold lg:text-5xl text-4xl">*</span>
                </div>
                <h1 class="capitalize lg:mb-[60px] mb-4 text-white font-serif xl:text-7xl lg:text-5xl text-4xl font-[700] lg:tracking-[4.2px] tracking-[1.1px] xl:leading-tight lg:leading-tight leading-[1.4]">
                    <span v-if="title && title.length > 0">{{ title }}</span>
                    <span v-else>
                        Advertising that <span class="text-secondary">sparks</span> results and
                        <span class="text-secondary">inspires</span> growth
                    </span>
                </h1>
                <p class="text-white lg:text-xl text-lg font-light">
                    <span v-if="subtitle && subtitle.length > 0">{{ subtitle }}</span>
                    <span v-else>
                        Unlock the power of creativity and innovation with our advertising
                        solutions that grab attention, inspire, and drive exceptional results. Transform
                        your brand's potential into remarkable success.
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import image from '../../../../public/images/hero_background.png'

export default {
    name: "Hero",
    props: {
        title: {
            required: false,
            type: String,
            default: '',
        },
        subtitle: {
            required: false,
            type: String,
            default: '',
        },
        textPosition: {
            required: false,
            type: String,
            default: 'left',
        },
        withoutText: {
            required: false,
            type: Boolean,
            default: false,
        },
        backgroundImagePath: {
            required: false,
            type: String,
            default: '',
        },
        backgroundColor: {
            required: false,
            type: String,
            default: '',
        },
        height: {
            required: false,
            type: String,
            default: 'h-screen',
        },
    },
    data() {
        return {
            image,
        }
    },
    computed: {
        textPositionClass() {
            return this.textPosition === 'left'
                ? 'text-left'
                : (this.textPosition === 'right' ? 'text-right' : 'text-center lg:w-full')
        },
        backgroundImage() {
            return this.backgroundImagePath ? this.backgroundImagePath : this.image
        },
        containerClass() {
            return `${this.height} ${this.backgroundColor ? 'bg-' + this.backgroundColor : ''}`
        },
    }
}
</script>

<style scoped src="./_index.scss" lang="scss"/>
