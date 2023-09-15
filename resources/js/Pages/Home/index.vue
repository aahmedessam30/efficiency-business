<template>
    <Layout :title="$t('front.home')">
        <Hero/>
        <About/>
    </Layout>
</template>

<script>
import Layout from "../../Layout/index.vue";
import Hero from "../../components/Hero/index.vue";
import About from "@/components/About/index.vue";

export default {
    name: "Home",
    components: {About, Hero, Layout}
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
