<template>
    <div class="container mx-auto px-5 w-full text-center pb-40" id="testimonials">
        <h5 class="text-lg text-secondary font-extrabold font-serif capitalize">Testimonials</h5>
        <h1 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-primary font-extrabold font-serif capitalize mt-4">
            Happy customer say
        </h1>
        <h1 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-primary font-extrabold font-serif capitalize my-5">
            about us
        </h1>

        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="relative flex flex-col items-center justify-center h-full space-y-5 md:space-y-0 md:space-x-5 md:flex-row">
                        <div class="relative w-full h-56 md:w-1/3">
                            <img src="https://picsum.photos/400/400"
                                 class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-72 h-72 rounded-full"
                                 alt="...">
                        </div>
                        <div class="relative w-full h-56 md:w-2/3 pr-24">
                            <div class="flex flex-col items-center justify-center h-full space-y-5">
                                <div class="flex flex-col items-center justify-center">
                                    <p class="text-md text-gray-500 text-left">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="relative flex flex-col items-center justify-center h-full space-y-5 md:space-y-0 md:space-x-5 md:flex-row">
                        <div class="relative w-full h-56 md:w-1/3">
                            <img src="https://picsum.photos/400/400"
                                 class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-72 h-72 rounded-full"
                                 alt="...">
                        </div>
                        <div class="relative w-full h-56 md:w-2/3 pr-24">
                            <div class="flex flex-col items-center justify-center h-full space-y-5">
                                <div class="flex flex-col items-center justify-center">
                                    <p class="text-md text-gray-500 text-left">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.psum dolor sit amet, consectetur
                                        adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                                        ligula.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
        <span
            class="bg-primary inline-flex items-center justify-center w-10 h-10 rounded-full group-hover:bg-primary-light ring-2 ring-secondary group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>
            <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
        <span
            class="bg-primary inline-flex items-center justify-center w-10 h-10 rounded-full group-hover:bg-primary-light ring-2 ring-secondary group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>

    </div>
</template>

<script>
export default {
    name: "Testimonials"
}
</script>
