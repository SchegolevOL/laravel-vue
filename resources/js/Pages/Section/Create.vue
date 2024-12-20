<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"
export default {
    name: "Create",
    layout: MainLayout,
    components:{
        Link,
    },
    methods:{
        store() {
            this.$inertia.post('/sections', {title:this.title})
        }
    },
    data(){
        return{
            title:'',
        }
    }
}
</script>

<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">
                Add Branch
            </h3>
            <div>
                <div>
                    <input type="text" v-model="title" class="border-gray-300 p-2" placeholder="Title">
                </div>
                <div class="py-1">
                    <a @click.prevent="store" href="#" class="block w-20 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">Add</a>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
