<template>
   <div class="container">
      <div class="row">
         <div class="col-md-8" style="margin-top:15px;">
            <question v-for="question in questions"
            :key="question.path"
            :data = question
            />
         </div>
         <div class="col-md-4">
            Sidebar
         </div>
      </div>
   </div>
</template>

<script>
import question from './Question.vue';
export default {
   data(){
      return {
         questions : {}
      }
   },
   components : {
      question
   },
   created(){
      axios.get('api/question').then( res => this.questions = res.data.data )
      .catch( error => console.log(error.response.data) )
   }
}
</script>