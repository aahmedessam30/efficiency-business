<template>
    <Layout :title="$t('front.our_services')" :dark-header="true">
        <OurServices :with-body-only="true"/>
    </Layout>
</template>

<script>
import Layout from "@/Layout/index.vue";
import OurServices from "@/components/OurServices/index.vue";

export default {
    name: "OurServicesPage",
    components: {OurServices, Layout}
}
</script>
