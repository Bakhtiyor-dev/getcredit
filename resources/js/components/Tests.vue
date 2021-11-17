<template>
    <div>
        <single-test v-for="test in tests" 
                        :key="test.id"
                        :test="test" 
                        @answered="answered">
        </single-test>
    </div>
</template>

<script>
    import SingleTest from './SingleTest.vue'
    
   

    export default {

        components: { SingleTest },

        props:['answer'],
        
        data() {
            return {
                tests : null,
                checkList: []
            }
        },

        mounted () {
            axios
            .get('http://127.0.0.1:8000/tests')
            .then(response => (this.tests = response.data))
            
        },

        methods: {
            answered(obj){
                const found = this.checkList.find(el => el.id == obj.id);
                if(found == undefined)
                    this.checkList.push(obj)
                else
                    found.id = obj.id;
                
               
            }
        },

    
        
    }
</script>
