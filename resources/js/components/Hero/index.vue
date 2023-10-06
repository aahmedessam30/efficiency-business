<template>
    <div class="relative bg-cover bg-center w-full h-screen" :style="{ backgroundImage: 'url(' + backgroundImage + ')' }">
        <div class="absolute inset-0 bg-black opacity-70"></div>
        <div class="firefly" v-for="i in 100" :key="i"></div>
        <div class="h-screen flex items-center xs:justify-center" v-if="!withoutText">
            <div class="container lg:ml-20 mx-8 lg:px-0 lg:w-1/2 w-full z-10" :class="textPositionClass">
                <div class="flex items-center lg:mb-4 mb-2">
                    <hr class="h-1 bg-white mr-2 lg:w-[60%] w-[70%]">
                    <span class="text-secondary font-bold lg:text-5xl text-4xl">*</span>
                </div>
                <h1 class="capitalize lg:mb-[60px] mb-4 text-white font-serif xl:text-7xl lg:text-5xl text-4xl font-[700] lg:tracking-[4.2px] tracking-[1.1px] xl:leading-tight lg:leading-tight leading-[1.4]">
                    Advertising that <span class="text-secondary">sparks</span> results and
                    <span class="text-secondary">inspires</span> growth
                </h1>
                <p class="text-white lg:text-xl text-lg font-light">
                    Unlock the power of creativity and innovation with our advertising
                    solutions that grab attention, inspire, and drive exceptional results. Transform
                    your brand's potential into remarkable success.
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
    }
}
</script>

<style scoped src="./_index.scss" lang="scss"/>
