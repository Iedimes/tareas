import AppForm from '../app-components/Form/AppForm';

Vue.component('task-form', {
    mixins: [AppForm],
    props:['state','user'],
    data: function() {
        return {
            form: {
                name:  '' ,
                date_begin:  '' ,
                date_end:  '' ,
                obs:  '' ,
                state:  '' ,
                advance:  '' ,
                priority: '',
                user:  '' ,



            }
        }
    }

});
