<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-20 py-20" id="about">
        <div
            class="flex items-center justify-center bg-cover bg-center lg:h-[700px] h-[500px] w-full rounded-[30px] shadow-lg transform hover:scale-105 transition duration-500 ease-in-out"
            :class="`bg-[url('https://picsum.photos/400/400')]`">
        </div>
        <div class="flex flex-col justify-center">
            <h1 class="text-secondary text-md font-serif font-bold pb-2 text-[20px]">{{ $t('front.about') }}</h1>
            <h2 class="text-primary lg:text-6xl text-5xl font-serif font-bold pb-10">{{ $t('front.about_us_title') }}</h2>
            <p class="font-semibold text-sm mb-5 leading-relaxed">{{ $t('front.about_us_description') }}</p>
            <p class="font-semibold text-sm leading-relaxed">{{ $t('front.about_us_description') }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "About"
}
</script>
