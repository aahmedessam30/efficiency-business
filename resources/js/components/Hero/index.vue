<template>
    <div class="bg-cover bg-center w-full h-screen"
         :style="{ backgroundImage: 'url(' + image + ')' }">
        <div class="h-screen flex items-center">
            <div class="container w-1/2 text-left ml-20">
                <hr class="w-[80%] h-1 bg-white mb-4"/>
                <h1 class="capitalize mb-[60px] text-7xl text-white font-serif font-[700] tracking-[4.2px] leading-tight">
                    Advertising that <span class="text-primary">sparks</span> results and <span class="text-primary">inspires</span> growth
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

<style scoped lang="scss" src="./_index.scss"/>
