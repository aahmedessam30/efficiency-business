<template>
    <div class="bg-cover bg-center w-full h-screen"
         :style="{ backgroundImage: 'url(' + image + ')' }">
        <div class="h-screen flex items-center">
            <div class="container w-1/2 text-left ml-20">
                <div class="flex items-center mb-4">
                    <hr class="w-[60%] h-1 bg-white mr-2"/>
                    <span class="text-secondary text-5xl font-bold">*</span>
                </div>
                <h1 class="capitalize mb-[60px] text-7xl text-white font-serif font-[700] tracking-[4.2px] leading-tight">
                    Advertising that <span class="text-secondary">sparks</span> results and <span class="text-secondary">inspires</span> growth
                </h1>
                <p class="text-xl text-white">Unlock the power of creativity and innovation with our advertising
                    solutions that grab attention, inspire, and drive exceptional results. Transform your brand's
                    potential into remarkable success.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import image from '../../../../public/images/hero_background.png'

export default {
    name: "Hero",
    data() {
        return {
            image: image
        }
    },
}
</script>
