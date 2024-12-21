<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link, router} from "@inertiajs/vue3"
export default {
    name: "index",
    props:[
        'sections',
    ],
    methods: {
        router() {
            return router
        }
    },
    layout: MainLayout,
    components:{
        Link,
    },
}
</script>

<template>
    <div>
        <div class="">
            <h3 class="text-xl mr-4">
                Sections
            </h3>
            <Link :href="route('sections.create')" class="btn btn-success m-2">+ section</Link>
            <Link :href="route('branches.create')" class="btn btn-info">+ branch</Link>
        </div>
        <div v-if="sections">
            <div v-for="section in sections">
                <div v-if="section.branches">
                    <div class="flex items-center">
                        <h3 class="mr-4">{{section.title}}</h3>
                        <Link :href="route('sections.edit', section.id)">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>


                        </Link>
                        <Link :href="route('sections.destroy', section)" method="delete">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                                </svg>
                            </div>


                        </Link>

                    </div>
                    <div v-for="branch in section.branches" class="flex items-center">
                        <Link  :href="route('branches.show', branch.id)" class=" w-80"><h4>{{branch.title}}</h4></Link>
                        <Link :href="route('branches.edit', branch.id)">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>
                        </Link>
                        <Link :href="route('branches.destroy', branch)" method="delete">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                                </svg>
                            </div>
                        </Link>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
