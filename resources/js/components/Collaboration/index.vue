<template>
    <div class="relative    w-full text-center py-10 bg-tertiary-light">
        <div class="container mx-auto">
            <h2 class="text-5xl font-extrabold text-primary mb-5 font-serif capitalize">Have a project?</h2>
            <h2 class="text-5xl font-extrabold text-primary mb-10 font-serif capitalize">Lets collaboration</h2>
            <p class="text-lg text-primary mb-10 font-serif capitalize mx-auto w-1/2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst
                habitant viverra placerat volutpat adipi
                urna risus, a turpis. Orci, aliquam in id etiam praesent scelerisque leo Nec blandit tellus
            </p>
            <button class="bg-primary text-white px-10 py-3 rounded-2xl font-semibold"
                    @click="$inertia.visit($route('contact-us'))">
                Contact Us
            </button>
        </div>
        <!-- circle on bottom right -->
        <div class="absolute bottom-0 right-0">
            <img :src="image" alt="circle" class="w-48">
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
