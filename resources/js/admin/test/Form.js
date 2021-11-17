import AppForm from '../app-components/Form/AppForm';

Vue.component('test-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                question:  '' ,
                answers:  this.getLocalizedFormDefaults() ,
                correct_answer_id:  '' ,
                subject_id:  '' ,
                status:  false ,
                
            }
        }
    },
    methods: {
        add(){

        },
        remove(){

        }

    },

});