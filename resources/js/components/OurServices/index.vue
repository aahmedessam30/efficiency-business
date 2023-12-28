<template>
    <div class="container mx-auto px-5 w-full text-center pb-40" id="services" data-aos="fade-up"
         data-aos-duration="1000" data-aos-delay="300">
        <div class="our-services--header" v-if="!withBodyOnly">
            <h5 class="xl:text-xl text-lg text-secondary font-extrabold font-serif capitalize">Our Services</h5>
            <div class="flex justify-end items-start xl:pr-24 lg:pr-20">
                <h1 class="xl:text-7xl lg:text-5xl md:text-4xl sm:text-4xl text-lg text-primary font-extrabold font-serif capitalize">
                    Professional And</h1>
            </div>
            <div class="flex justify-start items-start xl:pl-32 lg:pl-20">
                <h1 class="xl:text-7xl lg:text-5xl md:text-4xl sm:text-3xl text-lg text-primary font-extrabold font-serif capitalize">
                    Quality Services</h1>
            </div>
        </div>
        <div
            class="our-services--body xl:px-32 xl:text-left lg:mt-28 md:20 grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 md:mt-14 xl:gap-x-40 xl:gap-y-20 md:gap-y-10 md:gap-x-14 sm:gap-y-10 sm:gap-x-10 gap-y-10">
            <div class="lg:col-start-1 md:col-start-1 col-start-2 md:block flex flex-col-reverse" data-aos="fade-right"
                 data-aos-duration="1000" data-aos-delay="300">
                <div class="mt-10">
                    <h1 class="xl:text-4xl lg:text-4xl md:text-4xl sm:text-3xl text-2xl text-primary font-extrabold font-serif capitalize mb-5">
                        Our Services</h1>
                    <p class="text-gray-500 font-extrabold font-serif capitalize">We are committed to providing our
                        customers with exceptional service while offering our employees the best training.
                    </p>
                </div>
                <img src="https://picsum.photos/400/400" alt=""
                     class="mt-10 shadow-lg w-full rounded-tr-[40px] rounded-bl-[40px] max-h-[500px]">
            </div>
            <div class="lg:col-start-2 md:col-start-2 col-start-2" data-aos="fade-left" data-aos-duration="1000"
                 data-aos-delay="300">
                <img src="https://picsum.photos/400/400" alt=""
                     class="mb-10 shadow-lg w-full rounded-tl-[40px] rounded-br-[40px] max-h-[500px]">
                <div class="mt-10">
                    <h1 class="xl:text-4xl lg:text-4xl md:text-4xl sm:text-3xl text-2xl text-primary font-extrabold font-serif capitalize mb-5">
                        Our Services</h1>
                    <p class="text-gray-500 font-extrabold font-serif capitalize">We are committed to providing our
                        customers with exceptional service while offering our employees the best training.
                    </p>
                </div>
            </div>
            <div class="lg:col-start-1 md:col-start-1 col-start-2 lg:block flex flex-col-reverse" data-aos="fade-right"
                 data-aos-duration="1000" data-aos-delay="300">
                <div class="mt-10">
                    <h1 class="xl:text-4xl lg:text-4xl md:text-4xl sm:text-3xl text-2xl text-primary font-extrabold font-serif capitalize mb-5">
                        Our Services</h1>
                    <p class="text-gray-500 font-extrabold font-serif capitalize">We are committed to providing our
                        customers with exceptional service while offering our employees the best training.
                    </p>
                </div>
                <img src="https://picsum.photos/400/400" alt=""
                     class="mt-10 shadow-lg w-full rounded-tr-[40px] rounded-bl-[40px] max-h-[500px]">
            </div>
            <div class="lg:col-start-2 md:col-start-2 col-start-2" data-aos="fade-left" data-aos-duration="1000"
                 data-aos-delay="300">
                <img src="https://picsum.photos/400/400" alt=""
                     class="mb-10 shadow-lg w-full rounded-tl-[40px] rounded-br-[40px] max-h-[500px]">
                <div class="mt-10">
                    <h1 class="xl:text-4xl lg:text-4xl md:text-4xl sm:text-3xl text-2xl text-primary font-extrabold font-serif capitalize mb-5">
                        Our Services</h1>
                    <p class="text-gray-500 font-extrabold font-serif capitalize">We are committed to providing our
                        customers with exceptional service while offering our employees the best training.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center mt-10 our-services--button" v-if="!withBodyOnly" data-aos="fade-up"
             data-aos-duration="1000" data-aos-delay="300">
            <button @click="$inertia.visit($route('our-services'))"
                    class="bg-primary text-white font-extrabold font-serif capitalize px-10 py-3 rounded-2xl hover:bg-primary-light hover:text-white transition duration-300 ease-in-out hover:outline-none focus:outline-none">
                See More
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "OurServices",
    props: {
        withBodyOnly: {
            type: Boolean,
            default: false
        }
    }
}
</script>

