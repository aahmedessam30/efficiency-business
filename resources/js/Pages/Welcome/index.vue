<template>
    <Layout>
        <Hero />
        <h1>Welcome, {{ name }}</h1>
    </Layout>
</template>

<script>
import Layout from "../../components/Layout/index.vue";
import Hero from "../../components/Hero/index.vue";

export default {
    name: "Welcome",
    props: {
        name: {
            type: String,
            required: true,
        },
    },
    components: {
        Hero,
        Layout,
    },
    data() {
        return {
            //
        }
    },
    methods: {
        //
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
