<template>
    <div class="relative w-full text-center py-10 bg-tertiary-light">
        <div class="container mx-auto">
            <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl font-extrabold text-primary mb-5 font-serif capitalize">Have a project?</h2>
            <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl font-extrabold text-primary mb-10 font-serif capitalize">Lets collaboration</h2>
            <p class="lg:text-lg md:text-md text-md text-primary mb-10 font-serif capitalize mx-auto lg:w-1/2 md:w-1/2 w-3/4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst
                habitant viverra placerat volutpat adipi
                urna risus, a turpis. Orci, aliquam in id etiam praesent scelerisque leo Nec blandit tellus
            </p>
            <button class="bg-primary text-white px-10 py-3 rounded-2xl font-semibold"
                    @click="$inertia.visit($route('contact-us'))">
                {{ $t('front.contact') }}
            </button>
        </div>
        <div class="absolute bottom-0 right-0">
            <img :src="image" alt="circle" class="lg:w-48 md:w-40 w-20">
        </div>
    </div>
</template>

<script>
import image from "../../../../public/images/circle.png";

export default {
    name: "Collaboration",
    data() {
        return {
            image,
        }
    },
}
</script>
