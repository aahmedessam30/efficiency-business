<template>
    <Layout :title="$t('front.home')">
        <Hero/>
        <About/>
        <WhyChooseUs/>
        <OurWork/>
        <OurServices/>
        <TrustedBy/>
        <Testimonials/>
        <Collaboration/>
    </Layout>
</template>

<script>
import Layout from "../../Layout/index.vue";
import Hero from "../../components/Hero/index.vue";
import About from "../../components/About/index.vue";
import WhyChooseUs from "../../components/WhyChooseUs/index.vue";
import OurWork from "@/components/OurWork/index.vue";
import OurServices from "@/components/ OurServices/index.vue";
import TrustedBy from "@/components/TrustedBy/index.vue";
import Testimonials from "@/components/Testimonials/index.vue";
import Collaboration from "@/components/Collaboration/index.vue";

export default {
    name: "Home",
    components: {Collaboration, Testimonials, TrustedBy, OurServices, OurWork, WhyChooseUs, About, Hero, Layout}
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
