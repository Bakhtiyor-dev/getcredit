<template>
    <div class="card mt-3">
        <div class="card-header">
            {{test.question}} 
        </div>
        
        <div class="card-body p-0">
            <div class="list-group border-0 rounded-0">

                <answers :answers="test.answers" @chosen = "choosen"></answers>

            </div>              
        </div>

    </div>
</template>

<script>
    import Answers from './Answers.vue';
    
    export default {
       props : ['test'],
       components : { Answers},
       
       data() {
            return { 
                id : this.test.id,
                answer: null      
            }
       },

       methods: {
           choosen(id){
               this.answer = id;
               this.$emit('answered',{ id:this.id, answer: this.answer})
           }
       },

    }
</script>
