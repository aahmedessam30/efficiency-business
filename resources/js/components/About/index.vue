<template>
    <div class="about">
        <div class="container mx-auto py-40 px-5 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-20">
                <div
                    class="flex items-center justify-center bg-cover bg-center h-[700px] w-full rounded-[25px] shadow-lg transform hover:scale-105 transition duration-500 ease-in-out"
                :class="`bg-[url('https://picsum.photos/400/400')]`">
                </div>
                <div class="flex flex-col justify-center">
                    <h1 class="text-sm font-serif font-bold pb-2 text-[20px]">{{ $t('front.about') }}</h1>
                    <h2 class="text-6xl font-serif font-bold pb-10">{{ $t('front.about_us_title') }}</h2>
                    <p class="text-lg">{{ $t('front.about_us_description') }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "About"
}
</script>
