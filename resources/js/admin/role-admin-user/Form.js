import AppForm from '../app-components/Form/AppForm';

Vue.component('role-admin-user-form', {
    mixins: [AppForm],
    props:['role', 'user'],
    data: function() {
        return {
            form: {
                admin_user:  '' ,
                role:  '' ,

            }
        }
    }

});
