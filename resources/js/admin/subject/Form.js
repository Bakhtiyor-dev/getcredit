import AppForm from '../app-components/Form/AppForm';

Vue.component('subject-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                status:  false ,
                
            }
        }
    }

});