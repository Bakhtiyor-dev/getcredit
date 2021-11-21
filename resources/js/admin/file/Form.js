import AppForm from '../app-components/Form/AppForm';

Vue.component('file-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                url:  '' ,
                subject_id:  '' ,
                imported:  false ,
                
            }
        }
    }

});