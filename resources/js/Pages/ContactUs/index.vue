<template>
    <Default :title="$t('front.contact')">
        <div class="bg-cover bg-center w-full h-[800px] text-center pb-28" :style="{ backgroundImage: 'url(' + image + ')' }">
            <h1 class="text-white text-5xl font-serif font-[700] tracking-[4.2px] leading-tight pt-[150px]">
                {{ $t('front.contact') }}
            </h1>
            <p class="text-white text-sm font-[400] tracking-wider leading-tight pt-[20px] xl:px-[405px] lg:px-[405px] px-10">
                {{ $t('front.contact_description') }}
            </p>
        </div>
        <ContactForm/>
    </Default>
</template>

<script>
import Default from "@/Layout/Default/index.vue";
import ContactForm from "@/components/ContactForm/index.vue";
import image from '../../../../public/images/contact-us.png';

export default {
    name: "ContactUs",
    components: {Default, ContactForm},
    data() {
        return {
            image,
        }
    },
}
</script>
