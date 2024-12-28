<script>
import {Link} from "@inertiajs/vue3"
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export default {
  name: "MainLayout",
  components: {
    Link,
  },
}
</script>

<template>
  <div>
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <Link :href="route('sections.index')" class="navbar-brand">Forum</Link>
      </div>
    </nav>


<!--    <div class="bg-white border-b border-gray-300 py-4">
      <div class="w-1/2, mx-auto">

      </div>
    </div>-->
    <div class="container">
      <slot/>
    </div>
  </div>
</template>

<style scoped>

</style>
