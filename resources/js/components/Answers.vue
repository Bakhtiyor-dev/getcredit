<template>
    <div>
        <single-answer v-for="answer in data" 
                        :key="answer.id"
                        :answer="answer"                       
                        @selected="select">
        </single-answer>

    </div>
</template>

<script>
    
    import SingleAnswer from './SingleAnswer.vue'

    export default {
        components : { SingleAnswer},
        props : ['answers'],
    
        computed : {
            data: function(){
                return  JSON.parse(this.answers)
            } 
        },

        methods:{
            select(id){
                this.$emit('chosen',id);
            }
        }
        
        
    }
</script>
