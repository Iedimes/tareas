import AppForm from '../app-components/Form/AppForm';

Vue.component('detail-task-form', {
    mixins: [AppForm],
    props:['state','task','user'],

    data: function() {
        return {
            form: {
                name:  '' ,
                task:  '' ,
                state:  '' ,
                date_begin:  '' ,
                date_end:  '' ,
                obs:  '' ,
                user:  '' ,
                advance:  '' ,

            }
        }
    }

});