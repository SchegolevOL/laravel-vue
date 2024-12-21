<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Show",
    layout: MainLayout,
    props:[
        'branch',
    ],

}
</script>

<template>

    <div class="container">
        <h3 class="text-xl mr-4">
            {{branch.title}}
        </h3>
        <div>

        </div>
    </div>

</template>

<style scoped>

</style>
