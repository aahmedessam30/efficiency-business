<template>
    <Layout :app-name="appName">
        <Hero />
        <h1>Welcome, {{ appName }}</h1>
    </Layout>
</template>

<script>
import Layout from "../../components/Layout/index.vue";
import Hero from "../../components/Hero/index.vue";

export default {
    name: "Welcome",
    props: {
        appName: {
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
