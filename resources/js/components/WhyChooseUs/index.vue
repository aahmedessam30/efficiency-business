<template>
    <div id="why-choose-us" class="container mx-auto px-5 xl:w-[80%] md:w-full text-center pb-40">
        <h1 class="text-6xl text-primary font-extrabold font-serif tracking-wide capitalize">
            Why choose <span class="text-secondary">EDA</span>?
        </h1>

        <!-- 3 cards -->
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 xl:gap-14 md:gap-10 gap-5 mt-32">
            <div class="bg-tertiary-light shadow-lg rounded-[40px] px-10 py-16 border-4 border-tertiary flex flex-col justify-center items-center">
                <div class="flex justify-center">
                    <img src="https://picsum.photos/400/400" alt="1" class="w-24 h-24 rounded-full">
                </div>
                <h1 class="text-2xl font-bold text-primary mt-5">Best Quality</h1>
                <p class="text-primary mt-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, adipisci aliquam
                </p>
            </div>
            <div
                class="bg-tertiary-light shadow-lg rounded-[40px] px-10 py-10 border-4 border-tertiary lg:-mt-20 flex flex-col justify-center items-center">
                <div class="flex justify-center">
                    <img src="https://picsum.photos/400/400" alt="2" class="w-24 h-24 rounded-full">
                </div>
                <h1 class="text-2xl font-bold text-primary mt-5">Best Quality</h1>
                <p class="text-primary mt-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, adipisci aliquam
                </p>
            </div>
            <div class="bg-tertiary-light shadow-lg rounded-[40px] px-10 py-10 border-4 border-tertiary flex flex-col justify-center items-center">
                <div class="flex justify-center">
                    <img src="https://picsum.photos/400/400" alt="3" class="w-24 h-24 rounded-full">
                </div>
                <h1 class="text-2xl font-bold text-primary mt-5">Best Quality</h1>
                <p class="text-primary mt-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, adipisci aliquam
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "WhyChooseUs"
}
</script>
