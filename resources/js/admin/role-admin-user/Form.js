import AppForm from '../app-components/Form/AppForm';

Vue.component('role-admin-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                admin_user_id:  '' ,
                role_id:  '' ,
                
            }
        }
    }

});