import AppForm from '../app-components/Form/AppForm';

Vue.component('detail-task-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                task_id:  '' ,
                state_id:  '' ,
                date_begin:  '' ,
                date_end:  '' ,
                obs:  '' ,
                user_id:  '' ,
                advance:  '' ,
                
            }
        }
    }

});