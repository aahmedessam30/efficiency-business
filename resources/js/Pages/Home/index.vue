<template>
    <Layout>
        <Hero />
    </Layout>
</template>

<script>
import Layout from "../../components/Layout/index.vue";
import Hero from "../../components/Hero/index.vue";

export default {
    name: "Home",
    components: {Hero, Layout},
    data() {
        return {
            //
        }
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
