<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Edit",
    props: [
        'sections',
        'branch'
    ],
    data(){
        return{
            title:'',
            section_id:null,
            branches: [],
            parent_id:null,
        }
    },
    layout: MainLayout,
    components: {
        Link,
    },
    methods: {
        store() {
            console.log(this.parent_id)
            this.$inertia.post('/branches', {
                section_id: this.section_id,
                parent_id: this.parent_id,
                title: this.title})
        },
        getBranches(){
            this.parent_id=null
            axios.get(`/sections/${this.section_id}/branches`).then(res=>{
                console.log(res)
                this.branches=res.data
            })
        },
    },

}
</script>

<template>

    <div class="container">
        <h3 class="text-xl mr-4">
            Edit Branch
        </h3>
        <div v-if="sections.length">
            <select @change="getBranches" class="form-select" aria-label="Default select example"  v-model="section_id">
                <option value="null" selected disabled>Select section</option>
                <option  v-for="section in sections" :value="section.id">{{section.title}}</option>
            </select>
            <div v-if="this.$page.props.errors.section_id" class="text-danger">
                {{this.$page.props.errors.section_id}}
            </div>
        </div>
        <div class="py-4" v-if="branches.length">
            <select class="form-select" aria-label="Default select example"  v-model="parent_id">
                <option   value="null">New branch</option>
                <option  v-for="branch in branches" :value="branch.id">{{branch.title}}</option>

            </select>
            <div v-if="this.$page.props.errors.parent_id" class="text-danger">
                {{this.$page.props.errors.parent_id}}
            </div>
        </div>

        <div class="py-4">
            <label for="exampleInputEmail1" class="form-label">Branch title</label>
            <input type="text" v-model="title" class="form-control" placeholder="Enter title">
            <div v-if="this.$page.props.errors.title" class="text-danger">
                {{this.$page.props.errors.title}}
            </div>
        </div>
        <a @click.prevent="store" class="btn btn-primary">Update</a>
    </div>

</template>

<style scoped>

</style>
