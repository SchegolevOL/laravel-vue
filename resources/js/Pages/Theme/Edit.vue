<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Edit",
    layout: MainLayout,
    props:[
        'theme'
    ],
    components: {
        Link,
    },
    methods: {
        update() {
            this.$inertia.patch(`/themes/${this.theme.id}`, {title: this.title, description: this.description, branch_id: this.theme.branch_id})
        }
    },
    data() {
        return {
            title: this.theme.title,
            description: this.theme.description,
        }
    }
}
</script>

<template>
    <div class="container">
        <h3 class="text-xl mr-4">
            Add Them
        </h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Section title</label>
            <input type="text" v-model="title" class="form-control" placeholder="Enter title">
        </div>
      <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Section title</label>
            <textarea  v-model="description" class="form-control" placeholder="Enter description">
                {{description}}
            </textarea>
        </div>


        <div v-if="this.$page.props.errors.title" class="text-danger">
            {{this.$page.props.errors.title}}
        </div>
        <a @click.prevent="update" class="btn btn-primary">Add</a>
    </div>
</template>

<style scoped>

</style>
