<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Create",
    props: [
        'sections',
    ],
    data(){
        return{
            title:'',
            section_id:null,
        }
    },
    layout: MainLayout,
    components: {
        Link,
    },
    methods: {
        store() {
            console.log(this.section_id)
            this.$inertia.post('/branches', {section_id: this.section_id, title: this.title})
        }
    },

}
</script>

<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">
                Add Branch
            </h3>
            <div>
                <div class="mb-4" v-if="sections.length > 0">
                    <select class="border-gray-300 p-2 w-80" v-model="section_id">
                        <option value="null" selected disabled>Select section</option>
                        <option  v-for="section in sections" :value="section.id">{{section.title}}</option>
                    </select>
                </div>
                <div class="mb-4">
                    <input type="text" v-model="title" class="border-gray-300 p-2" placeholder="Title">
                </div>
                <div class="py-1">
                    <a @click.prevent="store" href="#"
                       class="block w-20 px-2 py-1 bg-sky-500 border rounded-lg text-white text-center border-sky-600">Add branch</a>
                </div>

            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
