<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
  name: "Show",
    layout: MainLayout,
  props:[
      'theme',
  ]
  ,
  components: {
    Link,
  },
    data(){
      return{


    }
    },
    methods:{
      store(){

          axios.post(`/messages`, {
              content: this.$refs.editor.innerHTML,
              theme_id: this.theme.id,
          }).then(res=>{
              this.$refs.editor.innerHTML=''

          })
      },
    },
}
</script>

<template>










  <div>
      <h2>
          {{theme.title}}
      </h2>
      <hr>
      <p>
          {{theme.description}}
      </p>
      <hr>
      <div v-if="theme.messages.length">
          <div v-for="message in theme.messages">




              <div class="w-1/4">
                  <div class="w-16 h-16 ">

                  </div>
                  <div>
                      <h4>
                          {{message.user.name}}
                      </h4>
                      <p>
                          {{message.content}}
                      </p>
                      <h5>{{message.time}}</h5>
                  </div>
              </div>
              <div class="w-3/4">

              </div>
          </div>

      </div>
      <hr>
      <div>
          <div>
              <h2>Add message</h2>
          </div>

          <div>
              <div ref="editor" contenteditable="true" class="w-full border p-4">

              </div>
              <a @click.prevent="store" class="btn btn-outline-info m-2" href="#">Add</a>

          </div>
      </div>




  </div>

</template>

<style scoped>

</style>
