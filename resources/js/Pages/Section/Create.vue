<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Create",
    layout: MainLayout,
    components: {
        Link,
    },
    methods: {
        store() {
            this.$inertia.post('/sections', {title: this.title})
        }
    },
    data() {
        return {
            title: '',
        }
    }
}
</script>

<template>
    <div class="container">
        <h3 class="text-xl mr-4">
            Add Section
        </h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Section title</label>
            <input type="text" v-model="title" class="form-control" placeholder="Enter title">
        </div>
        <div v-if="this.$page.props.errors.title" class="text-danger">
            {{this.$page.props.errors.title}}
        </div>
        <a @click.prevent="store" class="btn btn-primary">Add</a>
    </div>
</template>

<style scoped>

</style>
