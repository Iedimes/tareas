import AppForm from '../app-components/Form/AppForm';

Vue.component('rol-admin-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                user_id:  '' ,
                rol_id:  '' ,
                
            }
        }
    }

});